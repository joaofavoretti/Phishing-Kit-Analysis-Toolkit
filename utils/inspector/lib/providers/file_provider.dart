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
}