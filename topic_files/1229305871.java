import java.io.*;
class A3
{    //Prime
	public static void main(String args[])
	{
		Console c=System.console();
		int i;
		int n=Integer.parseInt(c.readLine("Enter no. = "));
		if(n==0 || n==1)
				System.out.print("Number is prime");	
		for(i=2;i<n;i++)
		{
			if(n%i==0)
			{
				System.out.print("Number is not prime");
				break;
			}
			
		}
		if(n==i)
			System.out.println("Number is prime");
	}
}