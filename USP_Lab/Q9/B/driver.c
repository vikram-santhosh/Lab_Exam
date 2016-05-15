#include <stdio.h>
#include <unistd.h>
#include <sys/stat.h>
#include <sys/types.h>
#include <fcntl.h>

int main()
{
	execl("interpreter","arg1","arg2","arg3",(char*)0);
	return 0;
}