#include <stdio.h>
#include <math.h>

int main() {
    double a, b ;
    scanf("%lf %lf", &a , &b);
    float c = (b*b)-(a*a) ;
    float alas = sqrt (c) ;
    float luas = 0.5*alas*a;
    float keliling = a+b+alas;
    printf("Alas     = %.0f cm \n", alas );
    printf("Tinggi   = %.0f cm \n",a);
    printf("Keliling = %.0f cm \n", keliling );
    printf("Luas     = %.0f cm^2", luas );
return 0;
}
