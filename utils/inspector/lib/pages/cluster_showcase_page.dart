import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

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
        DataCell(Text(websiteSample.category)),
        DataCell(Text(websiteSample.instruction_blocks.length.toString())),
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

  const ClusterShowcasePage({super.key, required this.cluster});

  @override
  State<ClusterShowcasePage> createState() => _ClusterShowcasePageState();
}

class _ClusterShowcasePageState extends State<ClusterShowcasePage> {
  late List<WebsiteSample> clusterWebsiteSamples;

  @override
  void initState() {
    super.initState();
    fetchClusterWebsiteSamples();
  }

  void fetchClusterWebsiteSamples() {
    var websiteSamples = Provider.of<FileProvider>(context, listen: false).websiteSamples!;
    clusterWebsiteSamples = websiteSamples.where((sample) => sample.cluster == widget.cluster).toList();
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
                FloatingActionButton.extended(
                  onPressed: () {
                    Navigator.push(
                      context,
                      MaterialPageRoute(
                        builder: (context) => FileShowcasePage(websiteSamples: clusterWebsiteSamples),
                      ),
                    );
                  },
                  label: Text('Expand'),
                  icon: Icon(Icons.open_in_new),
                ),
              ],
            ),
            SizedBox(height: 16),
            PaginatedDataTable(
              header: Text('Samples'),
              columns: [
                DataColumn(label: Text('Hash')),
                DataColumn(label: Text('Category')),
                DataColumn(label: Text('# Blocks')),
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
