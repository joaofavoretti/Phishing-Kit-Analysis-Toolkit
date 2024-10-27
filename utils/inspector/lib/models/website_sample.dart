import 'dart:convert';
import './domain_instruction_block.dart' show DomainInstructionBlock;

class WebsiteSample {
  final String filehash;
  final String category;
  final List<DomainInstructionBlock> instruction_blocks;
  final String cluster;
  final DateTime date;
  final String closest_cluster;

  WebsiteSample({
    required this.filehash,
    required this.category,
    required this.instruction_blocks,
    required this.cluster,
    required this.date,
    required this.closest_cluster,
  });

  factory WebsiteSample.fromJson(Map<String, dynamic> json) {
    return WebsiteSample(
      filehash: json['filehash'],
      category: json['category'],
      instruction_blocks: json['instruction_blocks'].map<DomainInstructionBlock>((block) => DomainInstructionBlock.fromJson(block)).toList(),
      cluster: json['cluster'],
      date: DateTime.parse(json['date']),
      closest_cluster: json['closest_cluster'],
    );
  }
}