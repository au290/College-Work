#include <stdio.h>

int main() {
  float a = 9;
  float b = 6;
  float x = 10;
  float y = 7;
  float sum = (a+b)*x/y ;
  printf("Variable a bernilai %.0f\n",a);
  printf("Variable b bernilai %.0f\n",b);
  printf("Variable x bernilai %.0f\n",x);
  printf("Variable y bernilai %.0f\n",y);
  printf("Hasil dari a ditambah b dikali x dan di bagi y adalah %.2f",sum);
  return 0;
}