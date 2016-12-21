import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;


public class Fibbonaci {
	public static void main(String[] args) throws NumberFormatException, IOException {
		BufferedReader in = new BufferedReader(new InputStreamReader(System.in));
		BufferedWriter out = new BufferedWriter(new OutputStreamWriter(System.out));
		
		long n = Long.parseLong(in.readLine());
		long a = 0;
		long b = 1;
		if(n <= 1){
			out.write(a + "\n");
		} else if(n == 2){
			out.write(a + " ");
			out.write(b + "\n");
		} else {
			out.write(a + " ");
			out.write(b + " ");
			for(int i = 1;i<n;i++){
				long temp = b;
				b = a + b;
				a = temp;
				if(i == n -1){
					out.write(b + "\n");
				} else {
					out.write(b + " ");
				}
			}
		}
		out.flush();;
	}
}
