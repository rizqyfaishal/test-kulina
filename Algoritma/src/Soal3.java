import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;


public class Soal3 {
	public static void main(String[] args) throws IOException {
		BufferedReader in = new BufferedReader(new InputStreamReader(System.in));
		BufferedWriter out = new BufferedWriter(new OutputStreamWriter(System.out));
		
		char[] input = in.readLine().replaceAll("\\.", "").toCharArray();
		int n = input.length;
		for(int i = 0;i<n;i++){
			out.write(input[i]);
			for(int j = i;j<n-1;j++){
				out.write("0");
			}
			out.write("\n");
		}
		out.flush();
	}
}
