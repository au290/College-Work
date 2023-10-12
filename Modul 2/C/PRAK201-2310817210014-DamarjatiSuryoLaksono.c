#include<stdio.h>
int main(){
    char Nama [20], Nim [20], Paralel [20],TTl [20],alamat [20],hobi [20],NoHp [20];
    printf("Nama                        :");
    scanf ("%s", &Nama);
    printf("Nim                         :");
    scanf ("%s", &Nim);
    printf("Paralel                     :");
    scanf ("%s",Paralel);
    printf("Tempat Tanggal Lahir        :");
    scanf("%s",TTl);
    printf("Alamat                      :");
    scanf ("%s",alamat);
    printf("Hobi                        :");
    scanf ("%s",hobi);
    printf("Nomor HandPhone             :");
    scanf ("%s",NoHp);
    printf("\nNama                      : %s\nNim                       : %s\nParalel                   : %s\nTempat Tanggal Lahir      : %s\nAlamat                    : %s\nHobi                      : %s\nNomor HandPhone           : %s",Nama, Nim , Paralel, TTl, alamat, hobi, NoHp);
return 0;
}