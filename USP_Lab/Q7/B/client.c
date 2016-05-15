#include <stdio.h>
#include <unistd.h>
#include <sys/types.h>
#include <sys/ipc.h>
#include <sys/shm.h>

#define SIZE 128

int main()
{
	key_t key;
	char *shm , *buffer;
	int shmid, n;

	key = 1234; // same random number used to create the shm
	shmid = shmget(key,SIZE,0777);
	shm = shmat(shmid,NULL,0);

	for(buffer = shm; *buffer != 0; buffer++)
	{
		printf("%c\n",*buffer);
	}

	*shm = '*'; // tell the server the data has been read

	return 0;

}