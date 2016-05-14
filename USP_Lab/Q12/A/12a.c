#include <stdio.h>
#include <unistd.h>

void hander_1()
{
	printf("Exit Hander - I \n");
}

void hander_2()
{
	printf("Exit Hander - II \n");
}

int main()
{
	atexit(hander_1);
	atexit(hander_2);
	
	printf("Calling Implicit exit() \n");
	return 0;
}