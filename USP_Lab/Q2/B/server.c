#include <stdio.h>
#include <unistd.h>
#include <sys/stat.h>
#include <sys/types.h>
#include <fcntl.h>
#include <string.h>

#define MAX 80

int main()
{
	char buffer[MAX];
	int in,out,n;
	mkfifo("server_to_client",0777);
	mkfifo("client_to_server",0777);

	while(1)
	{
		in = open("client_to_server",O_RDWR,0777);
		out = open("server_to_client",O_RDWR,0777);

		memset(buffer,0,MAX);
		printf("Waiting for Message\n");
		n = read(in,buffer,MAX);
		printf("Message : %s\n",buffer);
		buffer[0] = toupper(buffer[0]);
		printf("Sending Reply\n");
		write(out,buffer,n);

		close(in);
		close(out);
	}

	return 0;
}