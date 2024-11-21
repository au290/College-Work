package soal_3_3;

import java.util.HashMap;

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
		System.out.println("NIM: "+getNim()+",Nama: "+getNama());	
	}
}