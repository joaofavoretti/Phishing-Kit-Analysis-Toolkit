import 'package:flutter/material.dart';
import 'package:provider/provider.dart';
import 'package:path/path.dart' as p;
import 'package:data_table_2/data_table_2.dart';
import 'package:flutter/rendering.dart';

import '../models/website_sample.dart' show WebsiteSample;
import '../providers/file_provider.dart';
import 'cluster_showcase_page.dart';

class _ClustersDatatableSource extends DataTableSource {
  late bool isSorted;
  late String search;
  late BuildContext context;
  List<Map<String, dynamic>> _clusters = [];

  _ClustersDatatableSource({required this.context, required this.search, required this.isSorted}) {
    _clusters = Provider.of<FileProvider>(context).getClusters(search: search, isSorted: isSorted);
  }

  @override
  DataRow? getRow(int index) {
    if (index >= _clusters.length) {
      return null;
    }

    var cluster = _clusters[index];
    return DataRow.byIndex(
      index: index,
      cells: [
        DataCell(Text(cluster['clusterId'])),
        DataCell(Text(cluster['clusterSize'].toString())),
        DataCell(
          Chip(
            label: Text(
                cluster['hasUnlabeled'] ? 'Yes' : 'No',
            ),
            surfaceTintColor: cluster['hasUnlabeled'] ? Colors.red : Colors.blue,
            elevation: 10,
          )
        ),
        DataCell(IconButton(
          icon: Icon(Icons.more_horiz),
          onPressed: () {
            Navigator.push(
              context,
              PageRouteBuilder(
                pageBuilder: (context, animation1, animation2) => ClusterShowcasePage(
                  cluster: cluster['clusterId'],
                  search: search,
                  isSorted: isSorted,
                ),
                transitionDuration: Duration.zero,
              ),
            );
          },
        )),
      ],
    );
  }

  @override
  int get rowCount => _clusters.length;

  @override
  bool get isRowCountApproximate => false;

  @override
  int get selectedRowCount => 0;
}

class ClusterDatatablePage extends StatefulWidget {
  const ClusterDatatablePage({super.key});

  @override
  State<ClusterDatatablePage> createState() => _ClusterDatatablePageState();
}

class _ClusterDatatablePageState extends State<ClusterDatatablePage> {
  bool _isLoading = false;
  bool _isSorted = true;
  TextEditingController _searchController = TextEditingController();

  void chooseNewFile() async {
    bool? confirm = await showDialog<bool>(
      context: context,
      builder: (BuildContext context) {
        return AlertDialog(
          title: Text('Confirm'),
          content: Text('Do you really want to pick another file?'),
          actions: <Widget>[
            TextButton(
              onPressed: () {
                Navigator.of(context).pop(false);
              },
              child: Text('Cancel'),
            ),
            TextButton(
              onPressed: () {
                Navigator.of(context).pop(true);
              },
              child: Text('Confirm'),
            ),
          ],
        );
      },
    );

    if (confirm == true) {
      setState(() {
        _isLoading = true;
      });

      var fileProvider = Provider.of<FileProvider>(context, listen: false);
      await fileProvider.pickFile();

      setState(() {
        _isLoading = false;
      });
    }
  }

  @override
  Widget build(BuildContext context) {
    var selectedFilePath =
        Provider.of<FileProvider>(context).fileResult?.files.single.path;
    var selectedFileName = p.basename(selectedFilePath ?? '');

    return Scaffold(
      appBar: AppBar(
        backgroundColor: Theme.of(context).colorScheme.inversePrimary,
        title: Text("Inspector ${'(' + selectedFileName + ')'}"),
        actions: [
          IconButton(
            icon: Icon(Icons.upload_file),
            onPressed: chooseNewFile,
            tooltip: 'Pick a new file',
          ),
        ],
      ),
      body: Container(
        margin: EdgeInsets.all(16),
        child: ListView(
          children: <Widget>[
            Row(
              mainAxisAlignment: MainAxisAlignment.end,
              children: <Widget>[
                Expanded(
                  child: TextField(
                    controller: _searchController,
                    decoration: InputDecoration(
                      labelText: 'Search',
                      border: OutlineInputBorder(),
                    ),
                    onSubmitted: (value) {
                      setState(() {});
                    },
                  ),
                ),
                SizedBox(width: 16),
                ElevatedButton.icon(
                  onPressed: () {
                    setState(() {
                      _isSorted = !_isSorted;
                    });
                  },
                  label: Text(_isSorted ? 'Sort by Id' : 'Sort by Size'),
                  icon: Icon(Icons.sort),
                ),
              ],
            ),
            SizedBox(height: 16),
            PaginatedDataTable(
              header: Text('Clusters'),
              columns: [
                DataColumn(label: Text('Cluster Id')),
                DataColumn(label: Text('Cluster Size')),
                DataColumn(label: Text('Has Unlabeled')),
                DataColumn(label: Text('More'), numeric: true),
              ],
              source: _ClustersDatatableSource(
                  context: context,
                  search: _searchController.text,
                  isSorted: _isSorted,
              ),
              rowsPerPage: 10,
            ),
          ],
        ),
      ),
    );
  }
}
