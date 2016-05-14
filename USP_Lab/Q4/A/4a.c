#include <stdio.h>
#include <unistd.h>
#include <string.h>

#define MAX 24

int main()
{
	int n;
	int a,b;
	char buffer[MAX];

	while(n=read(STDIN_FILENO,buffer,MAX))
	{
		buffer[n] = 0;
		sscanf(buffer,"%d%d",&a,&b);
		sprintf(buffer,"%d",a+b);
		n = strlen(buffer);
		write(STDOUT_FILENO,buffer,n);
		printf("\n");
	}
	return 0;
}