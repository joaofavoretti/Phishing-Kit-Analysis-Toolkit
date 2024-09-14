import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

import '../providers/file_provider.dart';

class UploadFilePage extends StatefulWidget {
  const UploadFilePage({super.key});

  @override
  State<UploadFilePage> createState() => _UploadFilePageState();
}

class _UploadFilePageState extends State<UploadFilePage> {

  bool _isLoading = false;

  void chooseFile() async {
      setState(() {
        _isLoading = true;
      });

      var fileProvider = Provider.of<FileProvider>(context, listen: false);
      await fileProvider.pickFile();

      Navigator.pushReplacementNamed(context, '/cluster-datatable');

      setState(() {
        _isLoading = false;
      });
  }

  @override
  Widget build(BuildContext context) {
    var selectedFilePath = Provider.of<FileProvider>(context).fileResult?.files.single.path;

    return Scaffold(
      appBar: AppBar(
        backgroundColor: Theme.of(context).colorScheme.inversePrimary,
        title: Text("Inspector"),
      ),
      body: _isLoading == true ?
        Center(
          child: CircularProgressIndicator(),
        ) : Center(
        child: FloatingActionButton.extended(
          onPressed: chooseFile,
          tooltip: 'Pick a file',
          label: Text('Pick a file'),
          icon: Icon(Icons.upload_file),
        )
      ),
    );
  }
}