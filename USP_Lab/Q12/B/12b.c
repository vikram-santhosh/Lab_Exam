#include <stdio.h>
#include <unistd.h>
#include <fcntl.h>
#include <string.h>

#define MAX 48
int main()
{
	int n;
	char in[MAX];
	char str_1[MAX],str_2[MAX];
	char* out;

	while(n = read(STDIN_FILENO,in,MAX))
	{
		in[n] = 0; //terminate string
		sscanf(in,"%s%s",str_1,str_2);
		out = strcat(str_1,str_2);
		out = strcat(out,"\n");
		n = strlen(out);

		write(STDOUT_FILENO,out,n);

	}

	return 0;

}