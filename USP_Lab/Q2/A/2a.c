#include <stdio.h>
#include <unistd.h>
#include <fcntl.h>

int main(int argc,char* argv[])
{
	int fd , n;
	int i; // loop variable
	char buffer[1];

	fd = open(argv[1],O_CREAT|O_RDWR,0777);

	n = lseek(fd,0,SEEK_END); //size of the input file

	for(i=1;i<=n;i++)
	{
		lseek(fd,-i,SEEK_END);
		read(fd,buffer,1);
		write(STDOUT_FILENO,buffer,1);
	}
	printf("\n");
	return 0;
}