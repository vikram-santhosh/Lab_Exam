#include <stdio.h>
#include <unistd.h>
#include <signal.h>

void callback()
{
	printf("Intrrupt Received !\n");
	(void)signal(SIGINT,SIG_DFL);
}
int main()
{
	int ch,i=0;
	printf("Enter choice\n");
	scanf("%d",&ch);

	switch(ch)
	{
		case 1 :	(void)signal(SIGINT,callback);
					break;

		case 2 :	(void)signal(SIGINT,SIG_IGN);
					break;

	}
	while(1)
	{
		sleep(1);
		printf("Press CTRL+C ...\n");
		i++;
		if(i == 10 && ch == 2)
			(void) signal(SIGINT,SIG_DFL);
	}
	return 0;
}