#include <stdio.h>
#include <sys/types.h>
#include <sys/ipc.h>
#include <sys/msg.h>
#include <string.h>
#define SIZE 128

typedef struct msgbuf
{
	long mtype ;
	char mtext[SIZE];
}msgbuf;

int main(int argc,char* argv[])
{
	int msgid ;
	key_t key;
	struct msgbuf buffer;

	key = 1234;

	msgid = msgget(key,0777);

	buffer.mtype = 1;
	strcpy(buffer.mtext,argv[1]);

	msgsnd(msgid,&buffer,strlen(argv[1]),IPC_NOWAIT);

}
