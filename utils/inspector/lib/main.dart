import 'package:flutter/material.dart';
import 'package:provider/provider.dart';

import 'providers/file_provider.dart';
import 'pages/upload_file_page.dart' show UploadFilePage;
import 'pages/cluster_datatable_page.dart' show ClusterDatatablePage;

void main() {
  runApp(
    ChangeNotifierProvider(
      create: (context) => FileProvider(),
      child: const InspectorApp()
    )
  );
}

class InspectorApp extends StatelessWidget {
  const InspectorApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Flutter Demo',
      theme: ThemeData(
        colorScheme: ColorScheme.fromSeed(seedColor: Colors.deepPurple),
        useMaterial3: true,
      ),
      debugShowCheckedModeBanner: false,
      routes: {
        '/': (context) => const UploadFilePage(),
        '/cluster-datatable': (context) => const ClusterDatatablePage(),
      }
    );
  }
}
