#include <stdio.h>
#include <sys/types.h>
#include <sys/ipc.h>
#include <sys/msg.h>

#define SIZE 128

typedef struct msgbuf
{
	long mtype ;
	char mtext[SIZE];
};

int main()
{
	int msgid ;
	key_t key;
	struct msgbuf buffer;

	key = 1234;

	msgid = msgget(key,0777);

	msgrcv(msgid,&buffer,SIZE,1,0);

	printf("%s\n",buffer.mtext);
}