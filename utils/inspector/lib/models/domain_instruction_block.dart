import 'dart:convert';

class DomainInstructionBlock{
  final String domain;
  final String instructions;
  final List<double>? vector;

  DomainInstructionBlock({
    required this.domain,
    required this.instructions,
    this.vector,
  });

  factory DomainInstructionBlock.fromJson(Map<String, dynamic> json) {
    return DomainInstructionBlock(
      domain: json['domain'],
      instructions: json['instructions'],
      vector: json['vector']?.cast<double>(),
    );
  }
}