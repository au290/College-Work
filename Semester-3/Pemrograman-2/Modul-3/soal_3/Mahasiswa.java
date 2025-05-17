package soal_3_3;

public class Mahasiswa {
	private String nama ;
	private long nim; 
	
	public Mahasiswa(String nama,long nim) {
		this.nama = nama;
		this.nim = nim;
	}
	public String getNama() {
		return this.nama;
	}
	public long getNim() {
		return this.nim;
	}
	
	public void tampilkan() {
		System.out.print("NIM: "+getNim()+",Nama: "+getNama());	
	}
}