#include <stdio.h>
int main() {
    int input ;
    scanf ("%d",&input);
    if (input == 0){
        printf ("Nol");
    } 
    else if (input<0){
        printf ("Negatif");
    }else {
        printf("Positif");
    }
    return 0;
}