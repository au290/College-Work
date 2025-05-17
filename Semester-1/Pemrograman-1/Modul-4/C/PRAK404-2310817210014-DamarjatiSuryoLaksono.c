#include <stdio.h>

int main() {
    float nilai_pertama, nilai_kedua;
    int pilihan;
    char *nama = "Damarjati Suryo Laksono";

    printf("1. Penjumlahan\n2. Pengurangan\n3. Perkalian\n4. Pembagian\n5. Exit\n");

    do {
        printf("Masukkan Pilihan : ");
        scanf("%d", &pilihan);

        if (pilihan == 1) {
            printf("Masukkan nilai pertama : ");
            scanf("%f", &nilai_pertama);
            printf("Masukkan nilai kedua : ");
            scanf("%f", &nilai_kedua);
            float hasil = nilai_pertama + nilai_kedua;
            printf("Hasil Penjumlahan antara %.2f dengan %.2f adalah : %.2f\n", nilai_pertama, nilai_kedua, hasil);
        } else if (pilihan == 2) {
            printf("Masukkan nilai pertama : ");
            scanf("%f", &nilai_pertama);
            printf("Masukkan nilai kedua : ");
            scanf("%f", &nilai_kedua);
            float hasil = nilai_pertama - nilai_kedua;
            printf("Hasil Pengurangan antara %.2f dengan %.2f adalah : %.2f\n", nilai_pertama, nilai_kedua, hasil);
        } else if (pilihan == 3) {
            printf("Masukkan nilai pertama : ");
            scanf("%f", &nilai_pertama);
            printf("Masukkan nilai kedua : ");
            scanf("%f", &nilai_kedua);
            float hasil = nilai_pertama * nilai_kedua;
            printf("Hasil Perkalian antara %.2f dengan %.2f adalah : %.2f\n", nilai_pertama, nilai_kedua, hasil);
        } else if (pilihan == 4) {
            printf("Masukkan nilai pertama : ");
            scanf("%f", &nilai_pertama);
            printf("Masukkan nilai kedua : ");
            scanf("%f", &nilai_kedua);
            if (nilai_kedua == 0) {
                printf("Tidak dapat membagi dengan nol!\n");
            } else {
                float hasil = nilai_pertama / nilai_kedua;
                printf("Hasil Pembagian antara %.2f dengan %.2f adalah : %.2f\n", nilai_pertama, nilai_kedua, hasil);
            }
        } else if (pilihan > 5 || pilihan < 1) {
            printf("Input anda salah, silahkan coba lagi\n");
        }
    } while (pilihan != 5);

    printf("Terimakasih, telah menggunakan kalkulator! %s\n", nama);

    return 0;
}
