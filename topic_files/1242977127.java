import java.io.*;
class A9
{ //Palidrome
	public static void main(String args[])
	{
		Console c=System.console();
		String s=c.readLine("Enter String = ");
		int i,len=s.length();
		String s1="";
		for(i=len-1;i>=0;i--)
			s1=s1+s.charAt(i);
		System.out.println("Reverse = "+s1);
		if(s1.equals(s))
			System.out.println("String is palidrome");
		else
			System.out.println("String is not palidrome");
	}
}