#include <stdio.h>
int main() {
    int input ;
    scanf ("%d",&input);
    if (input >= 80){
        printf ("A");
    } 
    else if (input>70){
        printf ("B");
    }
    else if (input>60){
        printf ("C");
    }
    else if (input>=50){
        printf ("D");
    }else {
        printf("E");
    }
    return 0;
}

