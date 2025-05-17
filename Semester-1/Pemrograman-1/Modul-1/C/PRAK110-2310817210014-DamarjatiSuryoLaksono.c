#include <stdio.h>

int main() {
  float alas = 5 , tinggi = 12 ,sisi_a = 12, sisi_b = 13 ,sisi_c = 5 , keliling = sisi_a+sisi_b+sisi_c ,luas = 0.5*alas*tinggi;
  printf("Diketahui : \n");
  printf("Alas = %.0f\n", alas);
  printf("Tinggi = %.0f \n\n", tinggi);
  printf("Jawab : \n");
  printf("Sisi A = ?\n");
  printf("Sisi B = ?\n");
  printf("Sisi C = ?\n");
  printf("Keliling = %.0f\n", keliling);
  printf("Luas = %.0f\n", luas);
  return 0;
}