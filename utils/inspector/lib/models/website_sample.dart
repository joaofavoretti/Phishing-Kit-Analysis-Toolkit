import 'dart:convert';
import './domain_instruction_block.dart' show DomainInstructionBlock;

class WebsiteSample {
  final String filehash;
  final String category;
  final List<DomainInstructionBlock> instruction_blocks;
  final String cluster;
  final DateTime date;
  final String closest_cluster;
  final String uniqueness;
  final String binded;

  WebsiteSample({
    required this.filehash,
    required this.category,
    required this.instruction_blocks,
    required this.cluster,
    required this.date,
    required this.closest_cluster,
    required this.uniqueness,
    required this.binded,
  });

  factory WebsiteSample.fromJson(Map<String, dynamic> json) {
    return WebsiteSample(
      filehash: json['filehash'],
      category: json['category'],
      instruction_blocks: json['instruction_blocks'].map<DomainInstructionBlock>((block) => DomainInstructionBlock.fromJson(block)).toList(),
      cluster: json['cluster'],
      date: json['date'] != null ? DateTime.parse(json['date']) : DateTime.parse('2002-03-05'),
      closest_cluster: json['closest_cluster'] ?? '0',
      uniqueness: json['uniqueness'] ?? '-1',
      binded: json['binded'] ?? '-1',
    );
  }
}