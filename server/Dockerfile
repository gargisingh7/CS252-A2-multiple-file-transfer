FROM ubuntu:16.04

RUN apt-get update && apt-get install -y build-essential
ADD ./car /server/car
ADD ./cat /server/cat
ADD ./dog /server/dog
ADD ./truck /server/truck
ADD a.sh /server
ADD b.sh /server
ADD c.sh /server
ADD d.sh /server
ADD c.txt /server
ADD images.txt /server
ADD server.c /server
WORKDIR "/server" 
RUN gcc server.c -o server
EXPOSE 5432
