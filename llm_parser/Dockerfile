FROM python:3.10.17-slim

# Set environment variables (optional but recommended)
ENV PYTHONDONTWRITEBYTECODE=1
ENV PYTHONUNBUFFERED=1
ENV RCLONE_CONFIG=/app/secrets/rclone.conf

# Set the working directory
WORKDIR /app

RUN apt-get update && \
    apt-get install -y --no-install-recommends curl tar unzip
    
RUN curl -L -o gdrive.tar.gz https://github.com/glotlabs/gdrive/releases/download/3.9.1/gdrive_linux-x64.tar.gz && \
    tar -xzf gdrive.tar.gz -C /usr/local/bin && \
    chmod +x /usr/local/bin/gdrive && \
    rm gdrive.tar.gz
    
RUN curl https://rclone.org/install.sh | /bin/bash

RUN apt-get clean && rm -rf /var/lib/apt/lists/*


# Copy project files into the container
COPY . .

# Authenticate gdrive
RUN gdrive account import /app/secrets/gdrive_export-joao_favoretti_101609_ga_ita_br.tar

# Install Python dependencies
RUN pip install -r requirements.txt

# Define the command to run your script
CMD ["python", "trigger.py"]
