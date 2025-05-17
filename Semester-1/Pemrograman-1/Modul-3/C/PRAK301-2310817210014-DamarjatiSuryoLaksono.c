#include <stdio.h>
int main() {
    int a1, a2 ;
    scanf ("%d %d",&a1,&a2);
    if(a2>a1){
        printf ("%d %d",a1 ,a2);
    }
    else {
        printf ("%d %d",a2,a1);
    }
    return 0;
}