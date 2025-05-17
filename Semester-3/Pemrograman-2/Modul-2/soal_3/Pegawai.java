//pada baris ini terdapat perbedaan nama class dan nama object yang di panggil seharusnya Pegawai
// class Employee {

package soal_3 ;
public class Pegawai {
    public String nama;
    //disini terdapat kesalahan dimana, char hanya bisa menampung 1 huruf, sedangkan asal biasanya terdiri lebih dari 1 huruf, seharusnya String
    //public char asal;
    public String asal;
    public String jabatan;
    public int umur;
    
        public String getNama() {
        return nama;
    }
        public String getAsal() {
        return asal;
    }
    //pada baris ini juga ada kesalahan dimana setjabatan tidak memasukan String jabatan kedalamnya sehingga tidak ada yang di set
    //public void setJabatan() {
        public void setJabatan(String j) {
        this.jabatan = j;
    }
 }
