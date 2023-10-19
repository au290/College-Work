#include <stdio.h>

int main() {
  double nilai1,nilai2;
  printf("Masukan Nilai Pertama :");
  scanf("%lf", &nilai1);
  printf("Masukan Nilai Kedua   :");
  scanf("%lf", &nilai2);
  float hasil = (nilai1+nilai2) ;
  printf("Hasil penjumlahan nilai pertama \"%.2f\" dan nilai kedua \"%.1f\" adalah \"%.2f\" ", nilai1,nilai2,hasil );
return 0;
}
