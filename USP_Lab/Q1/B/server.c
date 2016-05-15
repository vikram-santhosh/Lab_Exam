#include <stdio.h>
#include <unistd.h>
#include <sys/types.h>
#include <sys/stat.h>

#define MAX 128

int main()
{
	FILE *fp;
	char buffer[MAX];

	mknod("channel",S_IFIFO|0777,0);

	while(1)
	{
		fp = fopen("channel","r");
		fgets(buffer,MAX,fp);
		printf("Message Received : %s\n",buffer);
		fclose(fp);
	}
	return 0;
}