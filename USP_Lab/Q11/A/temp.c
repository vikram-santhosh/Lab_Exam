#include<stdio.h>
#include<stdlib.h>
#include<sys/stat.h>
#include<sys/types.h>
#include<unistd.h>
int deamon_init()
{
pid_t pid;
if((pid=fork())<0)
return -1;
else if(pid!=0)
exit(0);
setsid();
chdir("\\");
umask(0);
return (0);
}


void main()
{
int x=deamon_init();
system("ps -axj");
}
