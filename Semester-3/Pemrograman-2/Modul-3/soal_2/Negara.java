package soal_2_3;

import java.util.HashMap;

public class Negara {
	private String nama;
	private String jenis_kepemimpinan;
	private String nama_pemimpin;
	private int tanggal_kemerdekaan;
	private int bulan_kemerdekaan;
	private int tahun_kemerdekaan;
	private static final HashMap<Integer, String> nama_bulan = new HashMap<>();
	static {
		nama_bulan.put(1, "Januari");
		nama_bulan.put(2, "Februari");
		nama_bulan.put(3, "Maret");
		nama_bulan.put(4, "April");
		nama_bulan.put(5, "Mei");
		nama_bulan.put(6, "Juni");
		nama_bulan.put(7, "July");
		nama_bulan.put(8, "Agustus");
		nama_bulan.put(9, "September");
		nama_bulan.put(10, "Oktober");
		nama_bulan.put(11, "November");
		nama_bulan.put(12, "Desember");

	}

	public Negara(String nama, String jenis_kepemimpinan, String nama_pemimpin, int tanggal_kemerdekaan,
			int bulan_kemerdekaan, int tahun_kemerdekaan) {
		this.nama = nama;
		this.jenis_kepemimpinan = jenis_kepemimpinan;
		this.nama_pemimpin = nama_pemimpin;
		this.tanggal_kemerdekaan = tanggal_kemerdekaan;
		this.bulan_kemerdekaan = bulan_kemerdekaan;
		this.tahun_kemerdekaan = tahun_kemerdekaan;
	}

	public void info() {
		String bulan = nama_bulan.getOrDefault(bulan_kemerdekaan, "Unknown");
		if (!jenis_kepemimpinan.equalsIgnoreCase("monarki")) {
			System.out.println("Negara " + nama + " mempunyai Presiden bernama " + nama_pemimpin
					+ " \nDeklarasi Kemerdekaan pada Tanggal " + tanggal_kemerdekaan + " " + bulan + " "
					+ tahun_kemerdekaan);
		} else {
			System.out.println("Negara " + nama + " mempunyai Raja bernama " + nama_pemimpin);
		}
	}

}