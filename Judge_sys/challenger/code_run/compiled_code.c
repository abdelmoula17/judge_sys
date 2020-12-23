#include <stdio.h>
#include <stdlib.h>
#include <math.h>
// complete fact function recursively
int fact(int n)
{
	//code here.......
	if(n == 0)
	{
		return 1;
	}
	return n * fact(n - 1);
}
// main programm here 
int main()
{
	int n;
  for(int i = 0; i < 7; i++)
  {
	scanf("%d",&n);
	printf("%d\n",fact(n));	
  }	
    return 0;
}
