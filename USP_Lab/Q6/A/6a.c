#include <stdio.h>
#include <sys/stat.h>
#include <sys/types.h>
#include <unistd.h>
#include <time.h>
#include <fcntl.h>

int main(int argc,char* argv[]) //copying ctime and mtime of argv[2] to argv[1] 
{
	int fd;
	struct stat statbuf_1;
	struct stat statbuf_2;
	struct timespec times[2];

	fd = open(argv[1],O_RDWR|O_CREAT,0777);
	if(stat(argv[1],&statbuf_1)<0)
		printf("Error!\n");
	if(stat(argv[2],&statbuf_2)<0)
		printf("Error!\n");

	times[0] = statbuf_2.st_atim;
	times[1] = statbuf_2.st_mtim;

	if(futimens(fd,times)<0)
		printf("Error copying time \n");

}
