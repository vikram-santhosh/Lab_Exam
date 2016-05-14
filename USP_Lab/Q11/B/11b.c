
/*
    compile using gcc 11b.c -lpthread

    ignore warnings
*/


#include <stdio.h>
#include <pthread.h>
#include <semaphore.h>
#include <unistd.h>

#define NUM_WRITERS 3
#define NUM_READERS 3

int item_written = 0;
int item_read = 0;

sem_t semaphore_writer;
sem_t semaphore_reader;
sem_t semaphore_item;

void writer(int count)
{
  sleep(1);
  printf("Locking Writer %d \n",count);
  sem_wait(&semaphore_writer);
  item_written ++;
  sem_post(&semaphore_item); // unlock item so it can be read if it was locked when no new item was available
  if(item_written == 1)
    sem_post(&semaphore_reader); // unlock reader locked when attempting to read NULL item
  printf("Writing to new value %d\n",item_written);
  printf("Writer %d unlocking semaphore\n",count);
  sem_post(&semaphore_writer);
}

void reader(int count)
{
  sleep(1);
  if(item_written == 0)
  {
    printf("Locking Reader %d since no item has been written yet! \n",count);
    sem_wait(&semaphore_reader); // no item has been written yet
  }
  if(item_read == item_written)
  {
    printf("No new item available to be read . Locking resource until new entry is written !\n");
    sem_wait(&semaphore_item); // wait for new item to be written
  }
  item_read++;
  printf("Reader %d read value : %d \n",count,item_read);
}

void *begin_reader(void *arg)
{
  while(1)
  {
    reader((int) arg);
  }
}

void *begin_writer(void *arg)
{
  while(1)
  {
    writer((int) arg);
  }
}

int main()
{
  int i; //loop variable
  // initializing readers and writers
  pthread_t reader_th[NUM_READERS];
  pthread_t writer_th[NUM_WRITERS];

  sem_init(&semaphore_item,0,1);
  sem_init(&semaphore_reader,0,1);
  sem_init(&semaphore_writer,0,1);

  //creating readers and writers
  for(i=0;i<NUM_WRITERS;i++)
    pthread_create(&writer_th[i],NULL,begin_writer,(void *)i);

  for(i=0;i<NUM_READERS;i++)
    pthread_create(&reader_th[i],NULL,begin_reader,(void *)i);

  //join thread
  for(i=0;i<NUM_READERS;i++)
    pthread_join(reader_th[i],NULL);

  for(i=0;i<NUM_WRITERS;i++)
    pthread_join(writer_th[i],NULL);

  return 0;
}