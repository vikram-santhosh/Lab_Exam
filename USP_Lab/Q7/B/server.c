#include <stdio.h>
#include <unistd.h>
#include <sys/types.h>
#include <sys/shm.h>
#include <sys/ipc.h>
#include <string.h>

#define SIZE 128

int main()
{
	key_t key;
	char *shm ;
	char *buffer = "abcdefghijklmnopqrstuvxyz0";
	int shmid,n;


	key = 1234; // any random number 
	shmid = shmget(key,SIZE,IPC_CREAT|0777); //create a shared memory segment
	shm = shmat(shmid,NULL,0); //attach it to the calling process

	n = strlen(buffer);
	memcpy(shm,buffer,n);

	while(*shm != '*') // wait for client to write * into shm
		sleep(1); 

	return 0;
}