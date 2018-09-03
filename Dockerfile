FROM ubuntu:16.04

RUN apt-get update && apt-get install -y build-essential
COPY /home/akshay/CS252-A1/client/client.c /client
COPY /home/akshay/CS252-A1/client/read.sh /client
RUN gcc client.c -o client
EXPOSE 5432
