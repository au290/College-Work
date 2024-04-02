#include <stdio.h>

int main() {
  int a = 4;
  int b = 8;
  int c = 3;
  float sum = a*b;
  float suma = sum/c;
  printf("Variable a bernilai %d\n",a);
  printf("Variable b bernilai %d\n",b);
  printf("Variable c bernilai %d\n",c);
  printf("Hasil dari a dikali b dibagi c adalah %.6f",suma);
  return 0;
}