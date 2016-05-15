#include <stdio.h>
#include <unistd.h>

void zombie()
{
	pid_t pid = fork();

	if(!pid) // child
	{
		_exit(0);
	}
	else // parent
	{
		system("ps -aux | grep Z");  // search for zombies 
	}
}

void orphan()
{
	pid_t pid = fork();

	if(!pid)
	{
		sleep(10);
		printf("Adoptive Parent (init --user): %d\n", getppid());
	}
	else
	{
		printf("Original Parent : %d\n", getpid());
		_exit(0);
}
int main()
{
	int ch;
	printf("Choice ... \n");
	scanf("%d",&ch);

	if(ch == 1)
		zombie();
	else
		orphan();

	return 0;
}