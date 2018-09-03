/* credit @Daniel Scocco */

/****************** SERVER CODE ****************/
#include <unistd.h>
#include <stdio.h>
#include <netinet/in.h>
#include <string.h>
#include <sys/socket.h>
#include <arpa/inet.h>
#include <unistd.h>
#include<limits.h>

int main(){
  int welcomeSocket, newSocket;
  char buffer[1024];

  char sendbuffer[1024];
  char ab[1024];
  char b[1024]="/home/aditya/";
  FILE *fp;
  struct sockaddr_in serverAddr;
  struct sockaddr_storage serverStorage;
  socklen_t addr_size;

  /*---- Create the socket. The three arguments are: ----*/
  /* 1) Internet domain 2) Stream socket 3) Default protocol (TCP in this case) */
  welcomeSocket = socket(PF_INET, SOCK_STREAM, 0);

  /*---- Configure settings of the server address struct ----*/
  /* Address family = Internet */
  serverAddr.sin_family = AF_INET;
  /* Set port number, using htons function to use proper byte order */
  serverAddr.sin_port = htons(5432);
  /* Set IP address to localhost */
  serverAddr.sin_addr.s_addr = inet_addr("127.0.0.1");
  /* Set all bits of the padding field to 0 */
  memset(serverAddr.sin_zero, '\0', sizeof serverAddr.sin_zero);
  memset(buffer, '0', sizeof(buffer));
  /*---- Bind the address struct to the socket ----*/
  bind(welcomeSocket, (struct sockaddr *) &serverAddr, sizeof(serverAddr));

  /*---- Listen on the socket, with 5 max connection requests queued ----*/
  if(listen(welcomeSocket,5)==0)
    printf("I'm listening\n");
  else
    printf("Error\n");
 
  /*---- Accept call creates a new socket for the incoming connection ----*/
  while(1) {
  	addr_size = sizeof serverStorage;
  	newSocket = accept(welcomeSocket, (struct sockaddr *) &serverStorage, &addr_size);


	if (newSocket>0) {
  		printf("accepted\n");
	}
	else {
		printf("rejected\n");
	}



	recv(newSocket, ab, 2000, 0);
	printf("%s\n",ab);

//strcat(b,ab);
//printf("%s\n",b);




    	char del[] ="and";
    	char *p[10];
	// Returns first token 
	char *token = strtok(ab, " ");

	// Keep printing tokens while one of the
	// delimiters present in str[].
	int i=0;
	int j=0;
	while (token != NULL)
	{   
	    if (i%2==1 ) {
		strcat(p[j],token); 
		i=i+1;
                j=j+1;
	    }
	   else if (i%2==0 ) {
                p[j]=token;
	        i=i+1;
           }
		token = strtok(NULL, " ");
	}
	int k=0;
	char sendbuffer[1024];
	int flag=0; //introduced flag
	char cwd[PATH_MAX];
   	if (getcwd(cwd, sizeof(cwd)) != NULL) {
      		flag=0;
   	}
       	else {
       		perror("getcwd() error");
   	}
  	while (k<j) 
	{
       	//printf("%s\n", p[k]);
       	if (p[k][1]=='d')
       	{
          char buf[100];
	  int l=p[k][0]-48;
	  if(flag==0)
          	{
			sprintf(buf,"%s/a.sh %d > c.txt",cwd,l); //corrected address to general
			flag=1;
		}
	  else
		sprintf(buf,"%s/a.sh %d >> c.txt",cwd,l);
	  system(buf);
       	}
        else if (p[k][1]=='t') {
	  char buf[100];
	  int l=p[k][0]-48;
          if(flag==0)
          	{
			sprintf(buf,"%s/b.sh %d > c.txt",cwd,l);
			flag=1;
		}
	  else
		sprintf(buf,"%s/b.sh %d >> c.txt",cwd,l);
	  system(buf);          
        }
        else if (p[k][1]=='c' && p[k][3]=='r') {
	  char buf[100];
	  int l=p[k][0]-48;
          if(flag==0)
          	{
			sprintf(buf,"%s/c.sh %d > c.txt",cwd,l);
			flag=1;
		}
	  else
		sprintf(buf,"%s/c.sh %d >> c.txt",cwd,l);
	  system(buf);          
        }
        else if (p[k][1]=='c' && p[k][3]=='t') {
	  char buf[100];
	  int l=p[k][0]-48;
          if(flag==0)
          	{
			sprintf(buf,"%s/d.sh %d > c.txt",cwd,l);
			flag=1;
		}
	  else
		sprintf(buf,"%s/d.sh %d >> c.txt",cwd,l);
	  system(buf);
        }
        k=k+1;
//	printf("ok\n");
        }
//	printf("done till here\n");
	FILE* f;
	char rebuf[40];
	bzero(rebuf,40);
	char *line=NULL;
	size_t len = 0;
    	ssize_t read;
//	sprintf(rebuf,"./read.sh");
//	system(rebuf);
	f=fopen("c.txt","r");
	int bi;
                if(f== NULL){
                        perror("File");
                        return 2;
                }
		bzero(sendbuffer,1024);
                int y=0;
                while( (bi = fread(sendbuffer, 1, sizeof(sendbuffer), f))>0 ){
                        send(newSocket,sendbuffer, bi, 0);
			bzero(sendbuffer,1024);
                }
		bzero(sendbuffer,1024);
		sleep(4);
        fclose(f);
/*	f=fopen("c.txt","r");
        
                if(f== NULL){
                        perror("File");
                        return 2;
                }
                bzero(sendbuffer,1024);
                y=0;
                while( (bi = fread(sendbuffer, 1, sizeof(sendbuffer), f))>0 ){
                        send(newSocket,sendbuffer, bi, 0);
			bzero(sendbuffer,1024);
                }
                bzero(sendbuffer,1024);
        fclose(f);

*/	f=fopen("c.txt","r");
//	f=NULL;
	if(f==NULL)
		printf("error opening file\n");
	else
	{
		while((read=getline(&line,&len,f))!=-1)
		{
			//printf("line blah %s\n",line);
			if(line[0]=='d')
			{
				bzero(rebuf,40);
				line[strlen(line)-1]='\0';
				sprintf(rebuf,"%s/dog/%s",cwd,line);
				printf("%s\n",rebuf);
			}
			if(line[0]=='t')
			{
				bzero(rebuf,40);
				line[strlen(line)-1]='\0';
                                sprintf(rebuf,"%s/truck/%s",cwd,line);
                                printf("%s\n",rebuf);
	
			}
			if(line[0]=='c' && line[2]=='t')
			{
				bzero(rebuf,40);
				line[strlen(line)-1]='\0';
                                sprintf(rebuf,"%s/cat/%s",cwd,line);
                                printf("%s\n",rebuf);

			}
			if(line[0]=='c' && line[2]=='r')
			{
				bzero(rebuf,40);
				line[strlen(line)-1]='\0';
                                sprintf(rebuf,"%s/car/%s",cwd,line);
                                printf("%s\n",rebuf);

			}
		
		FILE *fpi = fopen(rebuf, "rb");
		int bi;
//		fpi=NULL;
    		if(fpi == NULL){
			printf("error in opening file %s\n",rebuf);
        		perror("File");
        	//	return 2;
    		}
		else{
//			printf("reached 1\n");
    		int y=0;
		bzero(sendbuffer,1024);
    		while( (bi = fread(sendbuffer, 1, sizeof(sendbuffer), fpi))>0 ){
        		send(newSocket,sendbuffer, bi, 0);
//			printf("%d\n",bi);
			bzero(sendbuffer,1024);
    		}bzero(sendbuffer,1024);
		sleep(2);
    		fclose(fpi);
		}
	//	printf("reached 2\n");
		sleep(1);
		}

               // }

	fclose(f);
	printf("closing file\n");
	}
  printf("closing socket\n");
    close(newSocket);
}
printf("7\n");
  return 0;
}
