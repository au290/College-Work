#include <stdio.h>

int main() {
  int a = 4;
  int b = 2;
  int x = 10;
  int y = 7;
  float sum = a+b;
  float suma = sum*x;
  float sumb = suma/y;
  printf("Variable a bernilai %d\n",a);
  printf("Variable b bernilai %d\n",b);
  printf("Variable x bernilai %d\n",x);
  printf("Variable y bernilai %d\n",y);
  printf("Hasil dari a ditambah b dikali x dan di bagi y adalah %.2f",sum);
  return 0;
}