package soal_2_4;

import java.util.Scanner;

public class PRAK402_2310817210014_Damarjati_Suryo_Laksono {
	public static void main(String[] args) {
		Scanner scan = new Scanner(System.in);
		System.out.print("Pilih jenis hewan yang ingin diinputkan: \n1 = Kucing\n2 = Anjing\nMasukan pilihan: ");
		int pilihan = scan.nextInt();
		scan.nextLine();
		System.out.print("Nama Hewan Peliharaan: ");
		String nama = scan.nextLine();
		System.out.print("Ras: ");
		String ras = scan.nextLine();
		System.out.print("Warna Bulu: ");
		String warna = scan.nextLine();
		if (pilihan == 1) {
			Kucing hewan = new Kucing(nama,ras,warna);
			hewan.displayDetailKucing();
		}
		else {
			System.out.print("Kemampuan: ");
			String kemampuan = scan.nextLine();
			String[] akemampuan = kemampuan.split("\\,");
			Anjing hewan = new Anjing(nama,ras,warna,akemampuan);
			hewan.displayDetailAnjing();
		}
		scan.close();
	}
}