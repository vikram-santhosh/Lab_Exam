#include <stdio.h>
#include <sys/ipc.h>
#include <sys/types.h>
#include <sys/msg.h>
#include <string.h>

#define SIZE 128

typedef struct msgbuf
{
	long mtype; //message type
	char mtext[SIZE]; //message
};

int main()
{
	int msgid ; 
	key_t key;
	int n;

	struct msgbuf buffer;

	key = 1234;

	msgid = msgget(key,IPC_CREAT|0777);

	buffer.mtype = 1;
	scanf("%s",buffer.mtext);

	n = strlen(buffer.mtext);

	if(msgsnd(msgid,&buffer,n,IPC_NOWAIT)<0)
		printf("Error\n");

}