package soal_1 ;

public class PRAK201_2310817210014_Damarjati_Suryo_Laksono {
    public static void main(String[] args) {
        buah b1 = new buah();
        b1.nama = "Apel" ;
        b1.berat = 0.4 ;
        b1.harga = 7000 ;
        b1.pembelian = 40 ;
        b1.info();
        
        buah b2 = new buah();
        b2.nama = "mangga";
        b2.berat = 0.2;
        b2.harga = 3500;
        b2.pembelian = 15;
        b2.info();
        
        buah b3 = new buah();
        b3.nama = "alpukat";
        b3.berat = 0.25;
        b3.harga = 10000;
        b3.pembelian = 12;
        b3.info();
        
    }
}