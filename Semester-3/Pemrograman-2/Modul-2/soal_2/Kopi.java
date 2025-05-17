package soal_2;

public class Kopi {
    String namaKopi ;
    String ukuran ;
    String pembeli;
    double harga;

    void info(){
        System.out.println("Nama Kopi: " + namaKopi);
        System.out.println("Ukuran: " + ukuran);
        System.out.println("Harga: Rp."+ harga);
    }
    public String getPembeli (){
        return pembeli;
    }
    
    public void setPembeli (String pembeli){
        this.pembeli = pembeli ;
    }
    
    public double getPajak(){
        return harga - ((1-0.11) * harga);
    }
}