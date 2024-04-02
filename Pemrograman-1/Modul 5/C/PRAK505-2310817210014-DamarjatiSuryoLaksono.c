#include <stdio.h>

void Biodata(int tahunLahir, char nama[], char asal[]) {
    int tahun_sekarang = 2020;
    int umur = tahun_sekarang - tahunLahir;

    printf("Perkenalkan Nama Saya: %s\n", nama);
    printf("Umur Saya: %d\n", umur);
    printf("Saya Adalah Angkatan: %d\n", tahun_sekarang);
    printf("Asal Saya dari: %s\n", asal);
}

int main() {
    int tahunLahir;
    char Namaku[20], Asal[15];
    
    scanf("%d", &tahunLahir);
    scanf(" %[^\n]s", Namaku);
    scanf(" %[^\n]s", Asal);

    Biodata(tahunLahir, Namaku, Asal);

    return 0;
}

