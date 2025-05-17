#include <stdio.h>

int main() {
    int k, l;

    printf(" ");
    scanf("%d %d", &k, &l);
    
    int i = k;
    int j = l;
        
    if (k > l) {

        while (i > l) {
            printf("%d %d - ", i, j);
            i--;
            j++;
        }
    } else {

        while (i < l) {
            printf("%d %d - ", i, j);
            i++;
            j--;
        }
    }

    printf("%d %d", l, k);
    
 return 0;
}
