#include <stdio.h>

int main() {
  float total_pasukan = 958730, jumlah_pasukan = 5 ;
  float jumlah_pasukan_per_pahlawan = total_pasukan/jumlah_pasukan;
  printf("Jumlah pasukan yang dibawa Yu Zhong = ? \n");
  printf("Jumlah pahlawan = ? \n");
  printf("Jumlah pasukan yang harus dikalahkan setiap pahlawan adalah %.0f pasukan",jumlah_pasukan_per_pahlawan);
  return 0;
}