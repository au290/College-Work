#include <stdio.h>

int main() {
    float pi = 3.142857;
    double jari, tinggi;
    scanf("%lf %lf", &jari, &tinggi);
    double volume = pi * jari * jari * tinggi;
    double luas = 2 * pi * jari * (jari + tinggi);
    double keliling = 2 * pi * jari;
    printf("Volume   = %.2f\n", volume);
    printf("Luas     = %.2f\n", luas);
    printf("Keliling = %.2f\n", keliling);
    return 0;
}
