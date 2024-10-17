package soal_3 ;
public class PRAK203_2310817210014_Damarjati_Suryo_Laksonon {
    public static void main(String[] args) {
    Pegawai p1 = new Pegawai();
    //Pada baris ini terjadi error karena kurangnya titik koma (;)
    //p1.nama = "Roi"
    p1.nama = "Roi";
    p1.asal = "Kingdom of Orvel";
    p1.setJabatan("Assasin");
    //melakukan inisiasi attribut pada class, di karenakan tidak ada sebelumnya 
    p1.umur = 17; 
    System.out.println("Nama Pegawai: " + p1.getNama());
    System.out.println("Asal: " + p1.getAsal());
    System.out.println("Jabatan: " + p1.jabatan);
    //pada system print out ini kurang di tambahkan tahun
    // System.out.println("Umur: " + p1.umur);
    System.out.println("Umur: " + p1.umur + " tahun");
 }
}