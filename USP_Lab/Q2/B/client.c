#include <stdio.h>
#include <unistd.h>
#include <sys/stat.h>
#include <sys/types.h>
#include <string.h>
#include <fcntl.h>

#define MAX 80

int main(int argc,char* argv[])
{
	char buffer[MAX];
	int in,out;
	int n;

	in = open("server_to_client",O_RDWR,0777);
	out = open("client_to_server",O_RDWR,0777);

	printf("Sending Message\n");
	n = strlen(argv[1]);
	write(out,argv[1],n);

	read(in,buffer,MAX);
	printf("Message Received : %s\n",buffer);
	
	close(in);
	close(out);
}