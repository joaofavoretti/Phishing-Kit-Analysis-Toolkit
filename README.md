# Phishing Kit Analysis Toolkit

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

This repository contains the source code and methodologies for the research paper "Inside the Phishing Reel: Leveraging Browser Instrumentation to Analyse Evasive Phishing." The project introduces a novel approach to collecting and analyzing data from evasive phishing websites.

## 📜 Overview

Phishing remains a significant threat, with attackers using cloaking techniques to evade detection. This project provides a comprehensive toolkit to combat this by using a modified Chromium browser to capture detailed JavaScript execution traces. This allows for in-depth analysis of phishing samples that employ client-side evasion tactics.

The toolkit is designed to be a complete pipeline, from data collection and processing to clustering and analysis, enabling researchers to identify and track the redeployment of phishing kits.

## ✨ Features

*   **Evasion-Resistant Data Collection**: Utilizes an instrumented browser to capture JavaScript execution, bypassing common anti-analysis techniques.
*   **Scalable Collection Pipeline**: A robust pipeline for collecting and processing large volumes of phishing URLs from various feeds.
*   **Behavioral Clustering Algorithm**: Groups phishing samples based on their JavaScript execution behavior to identify reused phishing kits.
*   **Phishing Kit Deployment**: A utility to deploy phishing kits in a controlled environment for analysis.
*   **Interactive Inspector Tools**: TUI-based applications for inspecting collected samples and analyzing phishing kit characteristics.
*   **Reproducibility**: Includes scripts and data to reproduce the results presented in the research paper.

## 📂 Project Structure

The repository is organized into several key directories:

```
.
├── README.md
├── llm_parser/       # Scripts for parsing execution logs using LLMs
├── out/              # Default output directory for collected samples
├── reproduction/     # Scripts and data to reproduce paper results
├── tests/            # Automated tests for various components
└── utils/            # Core utilities and tools for the toolkit
    ├── crawler/      # Scripts to crawl and download phishing samples
    ├── deployer/     # Deploys phishing kits for analysis
    ├── inspector/    # Flutter-based UI for sample inspection
    ├── pkdeployer/   # Specialized phishing kit deployer
    ├── pkinspector/  # TUI tool for inspecting phishing kits
    ├── pksimilarity/ # Scripts for phishing kit similarity analysis
    ├── processing/   # Main data processing pipeline (parsing, embedding, clustering)
    └── remote_inspector/ # TUI tool for inspecting remote samples
```

## 💾 Database

The complete dataset of crawled phishing samples, including raw logs and processed data, is available for research purposes. You can access and download the data from the following Google Drive folder:

[**Phishing Analysis Dataset on Google Drive**](https://drive.google.com/drive/folders/1yiXbLymyVIgnbakZzfCH1i3kOngwzAvr?usp=sharing)

## 🚀 Getting Started

### Prerequisites

*   [Docker](https://www.docker.com/)
*   [Python 3.10+](https://www.python.org/)
*   [Flutter SDK](https://flutter.dev/docs/get-started/install) (for the `inspector` tool)

### Installation

1.  Clone the repository:
    ```bash
    git clone https://github.com/joaofavoretti/Phishing-Kit-Analysis-Toolkit.git
    cd Phishing-Kit-Analysis-Toolkit
    ```

2.  Install Python dependencies for a specific utility (e.g., `llm_parser`):
    ```bash
    pip install -r llm_parser/requirements.txt
    ```

## 🛠️ Usage

This toolkit is composed of several independent modules. Below are instructions for using the main components.

### 1. Data Collection (`utils/crawler`)

The crawler downloads phishing URLs, processes them using an instrumented browser, and saves the results.

To start collecting data, run the trigger script:
```bash
python3 utils/crawler/trigger.py
```

### 2. Data Processing (`utils/processing`)

This pipeline parses raw logs, generates embeddings, and clusters the samples to identify similar phishing kits.

1.  **Parse Logs**: Convert raw browser logs into structured data.
    ```bash
    python3 utils/processing/log_parser.py <path_to_log_files>
    ```

2.  **Generate Embeddings**: Create vector embeddings from the parsed data.
    ```bash
    python3 utils/processing/dataset_embedding.py <path_to_parsed_data>
    ```

3.  **Run Clustering**: Group samples based on their embeddings.
    ```bash
    python3 utils/processing/clusterizer.py <path_to_embeddings>
    ```

### 3. Phishing Kit Inspection (`utils/pkinspector`)

The Phishing Kit Inspector is a Textual TUI application for analyzing and managing a local database of phishing kits.

To run the inspector:
```bash
./utils/pkinspector/run.sh
```

### 4. Phishing Kit Similarity (`utils/pksimilarity`)

This tool calculates the similarity between different phishing kits based on their file structure and content.

Execute the similarity analysis script:
```bash
python3 utils/pksimilarity/similarity.py <path_to_kits_directory>
```

## 🔬 Methodology

Our approach consists of three main stages:

1.  **Instrumented Browser**: We modified Chromium (v124.0.6367.78) to hook into the V8 bytecode generation pipeline. This allows us to log JavaScript property accesses and function invocations, capturing detailed execution traces without being detected by anti-analysis scripts.

2.  **Clustering Algorithm**:
    *   **Instruction Block Extraction**: Raw logs are parsed into contiguous sequences of instructions ("Instruction Blocks").
    *   **SBERT Embeddings**: Each block is converted into a 1024-dimensional vector using a Sentence-BERT (SBERT) model.
    *   **Embedding Pooling**: Embeddings are pooled and clustered with DBSCAN to create unique instruction block identifiers.
    *   **Sequence Generation**: Each sample is represented as a sequence of these identifiers.
    *   **Distance Calculation**: A modified Levenshtein distance computes the similarity between sequences.
    *   **Final Clustering**: A final DBSCAN run on the distance matrix groups similar phishing samples.

3.  **The "Projector" Pipeline**: This system tracks the reuse and evolution of phishing kits over time by comparing new daily samples against a historical database.

## 📊 Research Results

*   **Data Collection**: Over an eight-month period, we collected and processed **432,237 unique phishing samples**.
*   **Ground Truth**: We created a manually verified dataset of **409 deployable phishing kits** to evaluate our clustering algorithm.
*   **Clustering Performance**: The algorithm achieved a **Normalized Mutual Information (NMI) score of 0.846** on the labeled dataset.
*   **Redeployment Rate**: Our analysis revealed that, on average, **90.29%** of phishing samples on any given day were redeployments of previously seen kits.

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a pull request or open an issue to discuss proposed changes.

## 📄 License

This project is licensed under the MIT License. See the [LICENSE](https://opensource.org/licenses/MIT) file for details.
