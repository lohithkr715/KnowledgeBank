import java.io.*;
class A8
{  //Factorial using Recursion
	public static void main(String args[]){
		Console c=System.console();
		int n=Integer.parseInt(c.readLine("Enter Number = "));
		System.out.print("factorial of "+n+" = "+fact(n));
	}
	static int fact(int n){
		int i,fact=n;
		for(i=n-1;i>0;i--)
		{
			fact*=i;
		}
		return fact;
	}
}
