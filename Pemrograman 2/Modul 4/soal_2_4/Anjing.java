package soal_2_4;

import java.util.Arrays;

public class Anjing extends HewanPeliharaan {
	String[] Kemampuan;
	String warnaBulu;

	public Anjing(String nama, String Ras,String warnaBulu, String[] Kemampuan) {
		super(nama,Ras);
		this.warnaBulu = warnaBulu;
		this.Kemampuan = Kemampuan;
	}
	public void displayDetailAnjing() {
		super.display();
	    String cKemampuan = String.join(" ", Kemampuan);
	    System.out.println("Memiliki warna bulu : " + warnaBulu);
	    System.out.println("Memiliki kemampuan : " + cKemampuan);
	}
}
