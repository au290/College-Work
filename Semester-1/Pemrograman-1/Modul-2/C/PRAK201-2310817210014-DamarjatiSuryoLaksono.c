#include<stdio.h>
int main(){
    char Nama [20], Nim [20], Paralel [20],TTl [20],alamat [20],hobi [20],NoHp [20];
    printf("Nama                        :");
    gets (Nama);
    printf("Nim                         :");
    gets (Nim);
    printf("Paralel                     :");
    gets (Paralel);
    printf("Tempat Tanggal Lahir        :");
    gets (TTl);
    printf("Alamat                      :");
    gets (alamat);
    printf("Hobi                        :");
    gets (hobi);
    printf("Nomor HandPhone             :");
    gets (NoHp);
    printf("\nNama                      : %s\nNim                       : %s\nParalel                   : %s\nTempat Tanggal Lahir      : %s\nAlamat                    : %s\nHobi                      : %s\nNomor HandPhone           : %s",Nama, Nim , Paralel, TTl, alamat, hobi, NoHp);
return 0;
}