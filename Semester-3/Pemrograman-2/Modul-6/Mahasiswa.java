package application;
	
public class Mahasiswa {
        private final String nim;
        private final String nama;

        public Mahasiswa(String nim, String nama) {
            this.nim = nim;
            this.nama = nama;
        }

        public String getNim() {
            return nim;
        }

        public String getNama() {
            return nama;
        }
    }