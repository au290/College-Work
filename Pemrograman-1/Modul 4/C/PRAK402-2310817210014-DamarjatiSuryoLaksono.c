#include <stdio.h>

int main() {
    int batas;
    scanf("%d", &batas);

    int i = 1;
    while (i <= batas) {
        printf("%d ", i);
        i += 2;
    }

    printf("\n"); 

    int start = (batas % 2 == 0) ? batas : batas - 1;
    while (start >= 2) {
        printf("%d ", start);
        start -= 2;
    }

    return 0;
}
