import 'package:flutter/material.dart';

import '../models/website_sample.dart';

class FileShowcasePage extends StatefulWidget {
  final List<WebsiteSample> websiteSamples;
  final String search;

  const FileShowcasePage({super.key, required this.websiteSamples, this.search = ''});

  @override
  State<FileShowcasePage> createState() => _FileShowcasePageState();
}

class _FileShowcasePageState extends State<FileShowcasePage> {
  late WebsiteSample selectedWebsiteSample;

  late List expanded;

  @override
  void initState() {
    super.initState();
    selectedWebsiteSample = widget.websiteSamples.first;
    expanded = List.filled(selectedWebsiteSample.instruction_blocks.length, false);
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('File ${selectedWebsiteSample.filehash}'),
      ),
      body: Row(
        children: [
          Drawer(
            child: ListView(
              children: widget.websiteSamples.map((websiteSample) {
                return ListTile(
                  title: Text(websiteSample.filehash),
                  selected: websiteSample == selectedWebsiteSample,
                  selectedTileColor: Colors.blueAccent.withOpacity(0.2), // Change this color as needed
                  onTap: () {
                    setState(() {
                      selectedWebsiteSample = websiteSample;
                      expanded = List.filled(websiteSample.instruction_blocks.length, false);
                    });
                  },
                );
              }).toList(),
            ),
          ),
          Expanded(
            child: SingleChildScrollView(
              child: ExpansionPanelList(
                expansionCallback: (int index, bool isExpanded) {
                  setState(() {
                    expanded[index] = isExpanded;
                  });
                },
                children: selectedWebsiteSample.instruction_blocks.asMap().entries.map<ExpansionPanel>((entry) {
                  int index = entry.key;
                  var instructionBlock = entry.value;
                  var hasSearchedText = widget.search.isNotEmpty && instructionBlock.instructions.contains(widget.search);
                  return ExpansionPanel(
                    headerBuilder: (BuildContext context, bool isExpanded) {
                      return ListTile(
                        title: Text((hasSearchedText ? '* ' : '') + (instructionBlock.domain.isEmpty ? '<EMPTY>' : instructionBlock.domain)),
                      );
                    },
                    body: ListTile(
                      title: SelectableText(instructionBlock.instructions),
                    ),
                    isExpanded: expanded[index],
                  );
                }).toList(),
              ),
            ),
          ),
        ],
      ),
    );
  }
}
