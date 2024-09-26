import java.util.Scanner;

class Bulans{
    public String getBulan(int bulan){
        switch (bulan){
            case 1: return "Januari";
            case 2: return "Februari";
            case 3: return "Maret";
            case 4: return "April";
            case 5: return "Mei";
            case 6: return "Juni";
            case 7: return "Juli";
            case 8: return "Agustus";
            case 9: return "September";
            case 10: return "Oktober";
            case 11: return "November";
            case 12: return "Desember";
            default: return "Mau Ngapain?";
        }
    }
}


public class prak101 {
    public static void main(String[] args) {
        Scanner input = new Scanner(System.in);
        Bulans bulanObj = new Bulans();
        
        System.out.print("Masukan Nama Anda : ");
        String nama = input.nextLine();
        
        System.out.print("Masukan Tempat Lahir : ");
        String lahir = input.nextLine();
        
        System.out.print("Masukan Tanggal Lahir : ");
        int tanggal = input.nextInt();
        
        System.out.print("Masukan Bulan Lahir : ");
        int bulan = input.nextInt();
        
        System.out.print("Masukan Tahun Lahir : ");
        int tahun = input.nextInt();
        
        System.out.print("Masukan Tinggi Badan : ");
        int tinggi = input.nextInt();
        
        System.out.print("Masukan Berat Badan : ");
        float berat = input.nextFloat();
        
        String bulanNama = bulanObj.getBulan(bulan);
        
        System.out.println("Nama Lengkap " + nama + " Lahir di " + lahir + " Pada Tanggal " 
            + tanggal + " " + bulanNama + " " + tahun + ". Tinggi Badan " 
            + tinggi + " cm dan Berat Badan " + berat + " Kilogram.");
        input.close();
    }
}