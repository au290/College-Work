#include <stdio.h>

int main() {
    int n;
    scanf("%d", &n); 
    int array[n];
    for (int i = 0; i < n; i++) {
        scanf("%d", &array[i]); 
    }

    for (int i = 0; i < n; i++) {
        printf("%d", array[i] * (i + 1));
        if (i < n - 1) printf(" ");
    }

    return 0;
}