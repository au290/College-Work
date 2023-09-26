#include <stdio.h>

int main() {
  int a = 400000;
  int b = 350000;
  float sum = a*0.87;
  float suma = b*0.79;
  printf("Harga Sepatu A adalah %d\n",a);
  printf("Harga Sepatu B adalah %d\n",b);
  printf("Sepatu A mendapatkan diskon 13%% %.0f\n",sum);
  printf("Sepatu B mendapatkan diskon 21%% %.0f",suma);
  return 0;
}