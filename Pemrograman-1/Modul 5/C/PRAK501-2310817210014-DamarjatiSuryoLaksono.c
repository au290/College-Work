#include <stdio.h>
//Buatlah Function Disini

int MaxBilangan(int a,int b,int c, int d){
    int hasbi = a;
    
    if (b>hasbi){
        hasbi = b;
    }
    if (c>hasbi){
        hasbi = c;
    }
    if (d>hasbi){
        hasbi = d;
    }
    return hasbi ;
}
    int main() {
    int a, b, c, d;
    scanf("%d %d %d %d", &a, &b, &c, &d);
    int hasil = MaxBilangan(a, b, c, d);
    printf("%d", hasil);
return 0;
}