#include <stdio.h>
int main() {
    int input ;
    scanf ("%d",&input);
    if (input == 0){
            printf ("Nol");
    } 
                else if (input <10){ 
            printf ("Satuan");
                }
                   else if (input <20){
            printf ("Belasan");
                   }
                else if (input<99){
            printf ("Puluhan");
                }
        else {
    printf("Anda Menginput Melebihi Limit Bilangan");
    }
    return 0;
}

