package soal_2;
public class PRAK202_2310817210014_Damarjati_Suryo_Laksono {
    public static void main(String[] args) {
    Kopi kopi1 = new Kopi();
    kopi1.namaKopi = "Espresso";
    kopi1.ukuran = "Medium";
    kopi1.harga = 25000;
    kopi1.info();
    kopi1.setPembeli("Alice");
    System.out.println("Pembeli Kopi: " + kopi1.getPembeli());
    System.out.println("Pajak Kopi: Rp. " + kopi1.getPajak());
 }
}
