#include <stdio.h> 

int main() {
  double a, b , i , j , x , y;
  scanf("%lf %lf %lf %lf %lf %lf", &a, &b , &i , &j , &x , &y);
  float z = (a-b)*i/j-(x+y) ;
  printf("%.3f", z );
return 0;
}
