#include <stdio.h>
#include <unistd.h>
#include <sys/stat.h>
#include <sys/types.h>
#include <fcntl.h>

int main(int argc,char* argv[])
{
	struct stat mystat;
	stat(argv[1],&mystat);

	printf("Device ID %ld\n",mystat.st_dev);
	printf("Inode Number %ld\n",mystat.st_ino);
	printf("User ID %d\n",mystat.st_uid);
	printf("Group ID %d\n",mystat.st_gid);
	printf("File Size %ld\n",mystat.st_size);
	printf("Block Size %ld\n",mystat.st_blksize);
	printf("Protection : %o\n",mystat.st_mode);
}