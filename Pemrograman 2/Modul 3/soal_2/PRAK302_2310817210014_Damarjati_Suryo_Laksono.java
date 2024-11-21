package soal_2_3;

import java.util.Scanner;
import java.util.LinkedList;

public class PRAK302_2310817210014_Damarjati_Suryo_Laksono {
	public static void main(String[] args) {
		Scanner s = new Scanner(System.in);
		LinkedList<Negara> obj_negara = new LinkedList<>();
		System.out.print("Banyak Negara: ");
		int banyak_negara = s.nextInt();
		s.nextLine();

		for (int i = 0; i < banyak_negara; i++) {
			String nama_negara = s.nextLine();
			String jenis_negara = s.nextLine();
			String nama_pemimpin = s.nextLine();
			int tanggal_kemerdekaan = 0, bulan_kemerdekaan = 0, tahun_kemerdekaan = 0;
			if (!jenis_negara.equalsIgnoreCase("monarki")) {
				tanggal_kemerdekaan = s.nextInt();
				bulan_kemerdekaan = s.nextInt();
				tahun_kemerdekaan = s.nextInt();
				s.nextLine();
			}
			obj_negara.add(new Negara(nama_negara, jenis_negara, nama_pemimpin, tanggal_kemerdekaan, bulan_kemerdekaan,
					tahun_kemerdekaan));
		}
		for (int i = 0; i < obj_negara.size(); i++) {
			Negara negara = obj_negara.get(i);
			negara.info();
			System.out.println();
		}

	}
}