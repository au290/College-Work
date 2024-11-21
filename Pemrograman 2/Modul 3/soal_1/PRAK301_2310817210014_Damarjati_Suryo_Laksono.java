package soal_1_3 ;
import java.util.Scanner; ;
public class PRAK301_2310817210014_Damarjati_Suryo_Laksono {
    public static void main(String[] args) {
    Scanner s = new Scanner(System.in);
    System.out.print("Masukan Banyak Jumlah Dadu: ");
    int input_user = s.nextInt();
    Dadu d1 = new Dadu();
    System.out.println(d1.acakNilai(input_user));
    }
}