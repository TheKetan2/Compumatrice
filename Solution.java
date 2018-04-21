/*
Name: Ketan D.Ramteke
Question No.2
*/
import java.util.*;

class Solution {

//Function to print out biggest sentense
public static int bigSentence(String str){
		String[] parts = str.split("\\.|\\?|\\!");
		int len=0;
		for(String a:parts){
			//System.out.println(a.trim());
			String[] s = a.trim().split(" ");
			if(s.length>len)
				len = s.length;
	}
return len;
	
}
public static void main(String args[]){
	
System.out.println(bigSentence("We test coders.You all are doing a great job! Give us a try?"));

	}
}
