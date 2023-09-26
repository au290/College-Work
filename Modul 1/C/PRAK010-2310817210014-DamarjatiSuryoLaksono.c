#include <stdio.h>

int main() {
  float alas = 5;
  float tinggi = 12;
  float sisi_a = 12;
  float sisi_b = 13 ;
  float sisi_c = 5;
  float keliling = sisi_a+sisi_b+sisi_c ;
  float luas = 0.5*alas*tinggi;
  printf("Diketahui : \n");
  printf("Alas = %.0f\n", alas);
  printf("Tinggi = %.0f\n", tinggi);
  printf("Jawab : \n");
  printf("Sisi A = ?\n");
  printf("Sisi B = ?\n");
  printf("Sisi C = ?\n");
  printf("Keliling = %.0f\n", keliling);
  printf("Luas = %.0f\n", luas);
  return 0;
}