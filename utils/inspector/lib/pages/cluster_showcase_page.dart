import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'package:intl/intl.dart';

import '../models/website_sample.dart' show WebsiteSample;
import '../providers/file_provider.dart' show FileProvider;
import 'file_showcase_page.dart' show FileShowcasePage;

class _SamplesDatabaseSource extends DataTableSource {
  final List<WebsiteSample> websiteSamples;
  final BuildContext context;

  _SamplesDatabaseSource({required this.context, required this.websiteSamples});

  @override
  DataRow? getRow(int index) {
    if (index >= websiteSamples.length) {
      return null;
    }

    var websiteSample = websiteSamples[index];

    String? firstNonEmptyDomain = null;
    for (var block in websiteSample.instruction_blocks) {
      if (block.domain != "") {
        firstNonEmptyDomain = block.domain;
        break;
      }
    }

    return DataRow.byIndex(
      index: index,
      cells: [
        DataCell(Text(websiteSample.filehash)),
        DataCell(
          Chip(
            label: Text(websiteSample.category),
            surfaceTintColor: websiteSample.category == "UNLABELED" ? Colors.red : Colors.blue,
            elevation: 10,
          ),
        ),
        DataCell(Text(DateFormat('dd/MM/yyyy').format(websiteSample.date))),
        DataCell(Text(websiteSample.instruction_blocks.length.toString())),
        DataCell(Text(websiteSample.uniqueness)),
        DataCell(Text(websiteSample.binded)),
        DataCell(Text(firstNonEmptyDomain ?? "")),
      ],
    );
  }

  @override
  bool get isRowCountApproximate => false;

  @override
  int get rowCount => websiteSamples.length;

  @override
  int get selectedRowCount => 0;
}

class ClusterShowcasePage extends StatefulWidget {
  final String cluster;
  final bool isSorted;
  final String search;

  const ClusterShowcasePage({super.key, required this.cluster, required this.isSorted, this.search = ""});

  @override
  State<ClusterShowcasePage> createState() => _ClusterShowcasePageState();
}

class _ClusterShowcasePageState extends State<ClusterShowcasePage> {
  late List<WebsiteSample> clusterWebsiteSamples;
  late String? closestCluster;
  late String? nextCluster;
  late String? previousCluster;

  @override
  void initState() {
    super.initState();
    clusterWebsiteSamples = Provider.of<FileProvider>(context, listen: false).getWebsiteSamplesByCluster(clusterId: widget.cluster, search: widget.search);
    nextCluster = Provider.of<FileProvider>(context, listen: false).getNextCluster(clusterId: widget.cluster, isSorted: widget.isSorted, search: widget.search);
    previousCluster = Provider.of<FileProvider>(context, listen: false).getPreviousCluster(clusterId: widget.cluster, isSorted: widget.isSorted, search: widget.search);
    closestCluster = Provider.of<FileProvider>(context, listen: false).getClosestCluster(widget.cluster);
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text("Cluster ${widget.cluster}"),
      ),
      body: Container(
        margin: EdgeInsets.all(16),
        child: ListView(
          children: [
            Row(
              mainAxisAlignment: MainAxisAlignment.end,
              children: <Widget>[
                ElevatedButton.icon(
                  onPressed: closestCluster == null
                      ? null
                      : () {
                    Navigator.push(
                      context,
                      PageRouteBuilder(
                        pageBuilder: (context, animation1, animation2) => ClusterShowcasePage(
                          cluster: closestCluster!,
                          isSorted: widget.isSorted,
                          search: widget.search,
                        ),
                        transitionDuration: Duration.zero,
                      ),
                    );
                  },
                  icon: Icon(Icons.near_me),
                  label: Text('Closest Cluster ($closestCluster)'),
                ),
                SizedBox(width: 16),
                ElevatedButton.icon(
                  onPressed: () {
                    Navigator.push(
                      context,
                      PageRouteBuilder(
                        pageBuilder: (context, animation1, animation2) => FileShowcasePage(
                            websiteSamples: clusterWebsiteSamples,
                            search: widget.search,
                        ),
                        transitionDuration: Duration.zero,
                      ),
                    );
                  },
                  label: Text('Expand'),
                  icon: Icon(Icons.open_in_new),
                ),
                SizedBox(width: 16),
                ElevatedButton(
                  onPressed: previousCluster == null
                      ? null
                      : () {
                    Navigator.pushReplacement(
                      context,
                      PageRouteBuilder(
                        pageBuilder: (context, animation1, animation2) => ClusterShowcasePage(
                            cluster: previousCluster!,
                            isSorted: widget.isSorted,
                            search: widget.search,
                        ),
                        transitionDuration: Duration.zero,
                      ),
                    );
                  },
                  child: Icon(Icons.arrow_back),
                ),
                SizedBox(width: 16),
                ElevatedButton(
                  onPressed: nextCluster == null
                      ? null
                      : () {
                    Navigator.pushReplacement(
                      context,
                      PageRouteBuilder(
                        pageBuilder: (context, animation1, animation2) => ClusterShowcasePage(
                            cluster: nextCluster!,
                            isSorted: widget.isSorted,
                            search: widget.search,
                        ),
                        transitionDuration: Duration.zero,
                      ),
                    );
                  },
                  child: Icon(Icons.arrow_forward),
                ),
              ],
            ),
            SizedBox(height: 16),
            PaginatedDataTable(
              header: Text('Samples'),
              columns: [
                DataColumn(label: Text('Hash')),
                DataColumn(label: Text('Category')),
                DataColumn(label: Text('Date')),
                DataColumn(label: Text('# Blocks')),
                DataColumn(label: Text('Uniqueness')),
                DataColumn(label: Text('Binded')),
                DataColumn(label: Text('1st Domain')),
              ],
              source: _SamplesDatabaseSource(
                context: context,
                websiteSamples: clusterWebsiteSamples
              ),
              rowsPerPage: 10,
            ),
          ],
        ),
      ),
    );
  }
}
