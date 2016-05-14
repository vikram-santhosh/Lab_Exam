#include <pwd.h>
#include <string.h>
#include <stdio.h>
int main(int argc,char* argv[])
{
	struct passwd *pwd;
	setpwent();
	while((pwd = getpwent())!= NULL)
	{
		printf("%s\n",pwd->pw_name);
		if(strcmp(argv[1],pwd->pw_name)==0)

			printf("Found\n");
	}
	endpwent();
}