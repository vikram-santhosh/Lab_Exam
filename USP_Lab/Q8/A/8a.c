#include <stdio.h>
#include <setjmp.h>

jmp_buf jmp;

int divide(int a,int b)
{
	if (b == 0)
	{
		longjmp(jmp,1);
	}
	else
		return a/b;
}

int main(int argc,char* argv[])
{
	int ans;
	int a = atoi(argv[1]);
	int b = atoi(argv[2]);

	if(setjmp(jmp) == 0)
	{
		ans = divide(a,b);
		printf("Quotient : %d\n",ans);
	}
	else
	{
		printf("Divide by Zero Exception Caught!\n");

	}
	return 0;
}