#include <stdio.h>

int main() {
  float a = 400000;
  float b = 350000;
  float sum = a*0.87;
  float suma = b*0.79;
  printf("Harga Sepatu A adalah %.0f\n",a);
  printf("Harga Sepatu B adalah %.0f\n",b);
  printf("Sepatu A mendapatkan diskon 13%% sehingga harganya %.0f\n",sum);
  printf("Sepatu B mendapatkan diskon 21%% sehingga harganya %.0f",suma);
  return 0;
}