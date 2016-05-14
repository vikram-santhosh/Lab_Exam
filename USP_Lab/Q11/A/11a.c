#include <stdio.h>
#include <stdlib.h>
#include <sys/stat.h>
#include <sys/types.h>
#include <unistd.h>

void deamonize()
{
	pid_t pid = fork();

	if(pid < 0)
		fprintf(stderr, "Error Forking\n");
	else if(pid)
	{
		printf("PID of Child %d\n",pid);
		exit(0); // kill the parent process , child is orphanded :( and runs in the bg
	}

	umask(0);
	if(chdir("/") < 0)
		printf("Error changing directory \n");
	if(setsid() < 0)  //make the child process the session leader
		printf("Error creating session\n");
			
	printf("Demon Created! \n");

}
int main()
{
	deamonize();
	system("ps -axj");
	return 0;
}
