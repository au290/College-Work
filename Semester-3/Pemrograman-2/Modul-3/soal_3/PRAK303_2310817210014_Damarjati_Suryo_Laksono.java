package soal_3_3;

import java.util.Scanner;
import java.util.ArrayList;

public class PRAK303_2310817210014_Damarjati_Suryo_Laksono {
	public static void main(String[] args) {
		Scanner s = new Scanner(System.in);
		ArrayList<Mahasiswa> obj_mahasigma = new ArrayList<>();
		while (true) {
			System.out.println("Menu: ");
			System.out.println("1. Tambah Mahasiswa");
			System.out.println("2. Hapus Mahasiswa Berdasar NIM");
			System.out.println("3. Cari Mahasiswa Berdasar NIM");
			System.out.println("4. Tampilkan Daftar Mahasiswa");
			System.out.println("0. Keluar");
			System.out.print("Pilihan:");
			int pilihan = s.nextInt();
			s.nextLine();
			if (pilihan == 0) {
				System.out.println("TerimaKasih!");
				break;
			} else if (pilihan == 1) {
				System.out.print("Masukan Nama Mahasiswa: ");
				String nama_mahasigma = s.nextLine();
				System.out.print("Masukan NIM Mahasiswa (harusunik): ");
				long nim_mahasigma = s.nextLong();
				s.nextLine();
				obj_mahasigma.add(new Mahasiswa(nama_mahasigma, nim_mahasigma));
				System.out.println("Mahasiswa " + nama_mahasigma + " ditambahkan");
			} else if (pilihan == 2) {
				System.out.print("Masukan NIM Mahasiswa yang akan dihapus: ");
				long nim_mahasigma = s.nextLong();
				for (int i = 0; i < obj_mahasigma.size(); i++) {

					if (obj_mahasigma.get(i).getNim() == nim_mahasigma) {
						obj_mahasigma.remove(i);
						System.out.println("Mahasiswa dengan NIM " + nim_mahasigma + " dihapus.");

						break;
					} else {
						System.out.println("Mahasiswa dengan NIM" + nim_mahasigma + " tidak ditemukan dalam database");
					}
				}
			} else if (pilihan == 3) {
				System.out.print("Masukan NIM Mahasiswa yang ingin dicari: ");
				long nim_mahasigma = s.nextLong();
				for (int i = 0; i < obj_mahasigma.size(); i++) {
					if (obj_mahasigma.get(i).getNim() == nim_mahasigma) {
						obj_mahasigma.get(i).tampilkan();
					} else {
						System.out.println("Mahasiswa dengan NIM" + nim_mahasigma + " tidak ditemukan dalam database");
					}
				}
			} else if (pilihan == 4) {
				for (int i = 0; i < obj_mahasigma.size(); i++) {
					Mahasiswa mhs = obj_mahasigma.get(i);
					mhs.tampilkan();
					System.out.println();
				}
			} else {
				System.out.println("Pilihan Tidak Valid");
			}
		}
		s.close();
	}
}