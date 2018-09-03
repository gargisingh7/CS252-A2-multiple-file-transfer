FROM ubuntu:16.04

RUN apt-get update && apt-get install -y build-essential
ADD /Users/gargisingh/Downloads/cs252A1/client/client.c /Users/gargisingh/
ADD /Users/gargisingh/Downloads/cs252A1/client/read.sh /Users/gargisingh/
RUN gcc client.c -o client
EXPOSE 5432
