# Run

```

docker build -t remote_llm_parser .

docker run -it --entrypoint /bin/bash -e OPENAI_API_KEY="<Your Open API Key>" -e MIN_DATE="2024-09-27" -e MAX_DATE="2024-09-27" remote_llm_parser
```
