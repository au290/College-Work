#include <stdio.h>

int main() {
  int a = 9;
  int b = 5;
  int x = 8;
  int y = 8;
  float sum = a%b;
  float suma = x%y;
  float sumb = sum+suma;
  printf("Harga Sepatu A adalah %d\n",a);
  printf("Harga Sepatu B adalah %d\n",b);
  printf("Harga Sepatu x adalah %d\n",x);
  printf("Harga Sepatu y adalah %d\n",y);
  printf("Total sisa bagi dari a dibagi b dan x dibagi y adalah %0.f",sumb);
  return 0;
}