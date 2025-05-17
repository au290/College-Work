#include <stdio.h>

int main() {
  float pi = 3.14;
  float jarak = 5;
  float puter = 14;
  float keliling = puter/jarak;
  float jari = keliling/ (2*pi) ;
  printf("Diketahui : \n" );
  printf("Pak Dengklek mengelilingi taman = %.0f Putaran\n", jarak);
  printf("Jarak tempuh Pak Dengklek  = %.0f Kilometer \n\n", puter);
  printf("Jawaban : \n");
  printf("Jari-jari taman yang dikelilingi Pak Dengklek adalah = %.2f Kilometer \n",jari);
  return 0;
}