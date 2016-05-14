#include <stdio.h>
#include <unistd.h>

int main()
{
	pid_t pid;
	int i;

	pid = fork();

	if(pid)
	{
		for(i=0;i<26;i++)
		{

			printf("Parent : %c\n", (char)(97+i));
			sleep(1);
		}
	}	

	if(!pid)
	{
		for(i=0;i<26;i++)
		{
			printf("Child : %c\n", (char)(65+i));
			sleep(1);
		}
	}
}