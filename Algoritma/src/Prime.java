import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.util.Arrays;

/*
 * Rizqy Faishal Tanjung
 * University Of Indonesia 
 */

public class Prime {
	public static void main(String[] args) throws NumberFormatException, IOException {
		BufferedReader in = new BufferedReader(new InputStreamReader(System.in));
		BufferedWriter out = new BufferedWriter(new OutputStreamWriter(System.out));
		
		int n = Integer.parseInt(in.readLine());
		boolean[] shieves = new boolean[(int)n+1];
		Arrays.fill(shieves, true);
		shieves[0] = false;
		shieves[1] = false;
		for(int i = 2;i*i<shieves.length;i++){
			if(shieves[i]){
				for(int j = i;i*j<shieves.length;j++){
					shieves[i*j] = false;
				}
			}
		}
		
		for(int i = 0;i<shieves.length;i++){
			if(shieves[i]){
				if(i == shieves.length-1){
					out.write(i + "\n");
				} else {
					out.write(i + " ");
				}
			}
		}
		out.flush();
		
		
	}
}
