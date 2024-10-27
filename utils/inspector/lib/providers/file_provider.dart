import 'dart:io';
import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:file_picker/file_picker.dart';
import '../models/website_sample.dart' show WebsiteSample;

class FileProvider extends ChangeNotifier {
  FilePickerResult? _fileResult;
  File? _file;
  List<WebsiteSample>? _websiteSamples;

  FilePickerResult? get fileResult => _fileResult;
  File? get file => _file;
  List<WebsiteSample>? get websiteSamples => _websiteSamples;

  Future<void> pickFile() async {
    var result = await FilePicker.platform.pickFiles(
      type: FileType.custom,
      allowedExtensions: ['json'],
    );

    if (result != null) {
      _fileResult = result;
      var filePath = _fileResult!.files.single.path;

      if (filePath != null) {
        _file = File(filePath);
        String fileContent = await _file!.readAsString();
        List<dynamic> jsonData = jsonDecode(fileContent);
        _websiteSamples = jsonData.map((sample) => WebsiteSample.fromJson(sample)).toList();

        notifyListeners();
      }
    }
  }

  List<Map<String, dynamic>> getClusters({required bool isSorted, String search = ""}) {
    List<WebsiteSample> ws = getWebsiteSamplesBySearch(search);
    List<Map<String, dynamic>> clusters = [];
    if (ws != null) {
      Map<String, int> clustersMap = {};
      Map<String, bool> clustersMapUnlabeled = {};
      Map<String, List<DateTime>> clustersMapDates = {};
      Map<String, String> clustersMapClosestCluster = {};

      for (var websiteSample in ws) {
        var clusterId = websiteSample.cluster;
        clustersMap[clusterId] = (clustersMap[clusterId] ?? 0) + 1;

        if (websiteSample.category == "UNLABELED") {
          clustersMapUnlabeled[clusterId] = true;
        }

        if (!clustersMapDates.containsKey(clusterId)) {
          clustersMapDates[clusterId] = [];
        }
        clustersMapDates[clusterId]!.add(websiteSample.date);

        if (!clustersMapClosestCluster.containsKey(clusterId)) {
          clustersMapClosestCluster[clusterId] = websiteSample.closest_cluster;
        }
        clustersMapClosestCluster[clusterId] = websiteSample.closest_cluster;
      }

      clusters = clustersMap.entries.map((entry) {
        var dates = clustersMapDates[entry.key]!;
        dates.sort();
        var maxInterval = dates.length > 1
            ? dates.last.difference(dates.first).inDays
            : 0;

        return {
          'clusterId': entry.key,
          'clusterSize': entry.value,
          'hasUnlabeled': clustersMapUnlabeled[entry.key] ?? false,
          'maxInterval': '$maxInterval days',
          'closestCluster': clustersMapClosestCluster[entry.key],
        };
      }).toList();

      if (isSorted) {
        clusters.sort((a, b) => b['clusterSize'].compareTo(a['clusterSize']));
      }
    }

    return clusters;
  }

  String getClosestCluster(String clusterId) {
    return _websiteSamples!.firstWhere((sample) => sample.cluster == clusterId).closest_cluster;
  }

  List<WebsiteSample> getWebsiteSamplesByCluster({required String clusterId, String search = ""}) {
    var ws = getWebsiteSamplesBySearch(search);
    return ws!.where((sample) => sample.cluster == clusterId).toList();
  }

  List<WebsiteSample> getWebsiteSamplesByCategory({required String category, String search = ""}) {
    var ws = getWebsiteSamplesBySearch(search);
    return ws!.where((sample) => sample.category == category).toList();
  }

  List<WebsiteSample> getWebsiteSamplesBySearch(String search) {
    if (search.isEmpty) {
      return _websiteSamples!;
    }

    return _websiteSamples!.where((sample) {
      return sample.instruction_blocks.any((block) => block.instructions.contains(search));
    }).toList();
  }

  String? getNextCluster({required String clusterId, bool isSorted = false, String search = ""}) {
    List<Map<String, dynamic>> clusters = getClusters(isSorted: isSorted, search: search);
    int index = clusters.indexWhere((cluster) => cluster['clusterId'] == clusterId);
    if (index == -1 || index == clusters.length - 1) {
      return null;
    }

    return clusters[index + 1]['clusterId'];
  }

  String? getPreviousCluster({required String clusterId, bool isSorted = false, String search = ""}) {
    List<Map<String, dynamic>> clusters = getClusters(isSorted: isSorted, search: search);
    int index = clusters.indexWhere((cluster) => cluster['clusterId'] == clusterId);
    if (index == -1 || index == 0) {
      return null;
    }

    return clusters[index - 1]['clusterId'];
  }
}