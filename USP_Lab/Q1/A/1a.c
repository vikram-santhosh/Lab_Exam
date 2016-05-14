#include <stdio.h>
#include <unistd.h>
#include <fcntl.h>

#define SIZE 4096

int main(int argc,char* argv[])
{
	char buffer[SIZE];
	int n = 0;
	int fd1 , fd2 ;

	fd1 = open(argv[1],O_CREAT|O_RDWR,0777);
	fd2 = open(argv[2],O_CREAT|O_RDWR,0777);

	dup2(fd2,fd1);

	n = read(STDIN_FILENO,buffer,SIZE);
	if(write(fd1,buffer,n)!=n)
		fprintf(stderr,"Error Writing!\n");

	return 0;
}

