#include <unistd.h>
#include <stdio.h>

int main()
{
	pid_t pid = fork();

	if(!pid)
	{
		sleep(2);
		printf("Adoptive Parent : %d\n", getppid());
	}
	else
	{
		printf("Original Parent : %d\n", getpid());
		exit(0);
	}
	sleep(3);
}