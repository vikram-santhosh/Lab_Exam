#include <stdio.h>
#include <unistd.h>

int main(int argc,char* argv[])
{
	FILE *fp;
	fp = fopen("channel","w");
	fputs(argv[1],fp);
	fclose(fp);
}