#include <stdio.h>
#include <unistd.h>
#include <signal.h>

void handler()
{
	printf("PID calling handler : %d\n",getpid());
}

int main()
{
	pid_t pid = fork();
	signal(SIGALRM,handler);
	alarm(5);

	if(pid)
	{
		printf("PID of Parent : %d\n",getpid());
		sleep(10);
	}
	else if(!pid)
	{
		printf("PID of child : %d\n", getpid());
		sleep(10);
	}
}