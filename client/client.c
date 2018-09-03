
/* credit @Daniel Scocco */

/****************** CLIENT CODE ****************/

#include <stdio.h>
#include <sys/socket.h>
#include <netinet/in.h>
#include <string.h>
#include <arpa/inet.h>

int main(int argc, char *argv[]){
  int clientSocket,b;
  char buffer[1024],buff[1025];
  FILE *fp;
  struct sockaddr_in serverAddr;
  socklen_t addr_size;
  /*---- Create the socket. The three arguments are: ----*/
  /* 1) Internet domain 2) Stream socket 3) Default protocol (TCP in this case) */
  clientSocket = socket(PF_INET, SOCK_STREAM, 0);

  /*---- Configure settings of the server address struct ----*/
  /* Address family = Internet */
  serverAddr.sin_family = AF_INET;
  /* Set port number, using htons function to use proper byte order */
  serverAddr.sin_port = htons(5432);
  /* Set IP address to localhost */
  serverAddr.sin_addr.s_addr = inet_addr("127.0.0.1");
  /* Set all bits of the padding field to 0 */
  memset(serverAddr.sin_zero, '\0', sizeof serverAddr.sin_zero);

  /*---- Connect the socket to the server using the address struct ----*/
  addr_size = sizeof serverAddr;
  connect(clientSocket, (struct sockaddr *) &serverAddr, addr_size);

  /*---- Read the message from the server into the buffer ----*/
  //recv(clientSocket, buffer, 1024, 0);

  /*---- Print the received message ----*/
  

  //printf("Data received: %s",buffer);

  char ab[1024];
  strcpy(ab,argv[1]);
  
  printf("%s\n",ab);
  send(clientSocket, ab, strlen(ab)+1, 0);

  int tot=0,bi,u=0;
  FILE* fpi = fopen( "k.txt", "w");
        tot=0;
//	printf("gargi\n");
	bzero(buffer,1024);
        if(fpi != NULL){
            while( (bi = recv(clientSocket, buffer, 1024,0))> 0 ) 		{       
		    tot+=bi;
                    int w=fwrite(buffer, 1, bi, fpi);
		    printf("w is %d, bi is %d\n",w,bi);

		    if(w<bi)
			    break;
		    if(bi<1024)
			    break;
		    bzero(buffer,1024);
		//	printf("gargi %d\n",u++);
            }
            printf("Received byte: %d\n",tot);
            if (bi<0)
               perror("Receiving");

            fclose(fpi);
        } else {
            perror("File");
        }
/*	fpi = fopen( "m.txt", "w");
        tot=0;
//      printf("gargi\n");
        bzero(buffer,1024);
        if(fpi != NULL){
            while( (bi = recv(clientSocket, buffer, 1024,0))> 0 )                {
                    tot+=bi;
                    int w=fwrite(buffer, 1, bi, fpi);
		    printf("w is %d, bi is %d\n",w,bi);
                    if(w<bi)
                            break;
                    if(bi<1024)
                            break;
		    bzero(buffer,1024);
                //      printf("gargi %d\n",u++);
            }
            printf("Received byte: %d\n",tot);
            if (bi<0)
               perror("Receiving");

            fclose(fpi);
        } else {
            perror("File");
        }
*/
	char *line=NULL;
        size_t len = 0;
        ssize_t read;
	FILE* f;
	f=fopen("k.txt","r");
	if(f==NULL)
		printf("error opening file\n");
	else
	{
		while((read=getline(&line,&len,f))!=-1)
		{
			int tot=0,bi,u=0,w;
			line[strlen(line)-1]='\0';
			printf("%s\n",line);
  			FILE* fpi = fopen( line, "wb");
  //			fpi=NULL;
        		tot=0;
//      printf("gargi\n");
			bzero(buffer,1024);
        		if(fpi != NULL){
            			while( (bi = recv(clientSocket, buffer, 1024,0))> 0 )               				{
                    			tot+=bi;

                    			w=fwrite(buffer, 1, bi, fpi);
					if(w<bi)
						break;
					if(bi<1024)
						break;
					bzero(buffer,1024);
        //          printf("gargi %d\n",u++);
            			}
            			printf("Received byte: %d\n",tot);
            			if (bi<0)
               				perror("Receiving");

            			fclose(fpi);
        		}
		       	else {
            			perror("File");
       			 }

		}
		fclose(f);
	}

bzero(buffer,1024);
sprintf(buffer,"./read.sh > file.htm");
system(buffer);
sprintf("firefox file.htm");
system(buffer);

  return 0;
}
