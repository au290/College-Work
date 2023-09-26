#include <stdio.h>

int main() {
  int sisi_1 = 4;
  int sisi_2 = 5;
  int sisi_3 = 7;
  int keliling = sisi_1+ sisi_2+ sisi_3 ;
  int htm = 85000;
  int sum = keliling* htm ;
  printf("Diketahui : \n" );
  printf("Panjang sisi segitiga berturut-turut adalah 4, 5, dan 7 \n");
  printf("Keliling Tanah Pak Dengklek adalah %d\n", keliling);
  printf("Harga tanah Per Meter adalah %d\n", htm);
  printf("Jawaban : \n");
  printf("Biaya yang diperlukan Pak Dengklek adalah %d\n",  sum);
  return 0;
}