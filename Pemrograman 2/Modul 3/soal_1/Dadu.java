package soal_1_3;
import java.util.LinkedList ;

public class Dadu {
	final private int max = 6, min =1 ;
	
	public int acakNilai (){
		return min + (int) (Math.random() * ((max-min)+1));	
	}
	
	public String acakNilai(int berapa_kali){
		LinkedList<Integer> hasil_judi = new LinkedList<Integer>();
		int total_judi = 0 ;
		for (int i= 0; i < berapa_kali;i++) {
			int perjudian = acakNilai();
			hasil_judi.add(perjudian);
			total_judi += perjudian ;
			
		}
		for (int i = 0 ; i< hasil_judi.size() ;i++) {
			System.out.println("Dadu ke-"+(i+1)+" bernilai "+hasil_judi.get(i));
		}
		return "Total nilai dadu keseluruhan " + total_judi;
	}
}