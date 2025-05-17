package soal_1 ;

public class buah {
    double berat;
    double harga;
    double pembelian;
    String nama;
    
    public void info(){
        System.out.println("Nama Buah: " + nama);
        System.out.println("Berat: " + berat);
        System.out.println("Harga: " + harga);
        System.out.println("Jumlah Beli: " + pembelian + "kg");
        System.out.printf("Harga Sebelum Diskon: Rp%.2f\n", detect_harga());
        System.out.printf("Total Diskon: Rp%.2f\n", harga_diskon());
        System.out.printf("Harga setelah diskon: Rp%.2f\n", total_diskon());
        System.out.println("");
    }

    
    public double detect_harga(){
        return pembelian / berat * harga ;
    }
    	
    public double total_diskon(){
        return detect_harga() - harga_diskon();
    }
    
    public double harga_diskon() {
        double temp_diskon = pembelian/4;
        // disini melakukan casting
        int diskon = (int) (temp_diskon);
        return (diskon * 0.02) * harga * 4;
    }
}
