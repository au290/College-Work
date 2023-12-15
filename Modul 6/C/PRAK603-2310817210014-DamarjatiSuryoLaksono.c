#include <stdio.h>

int main() {
    int n1, n2;
    scanf("%d %d", &n1, &n2);
    if (n1 != n2) {
        printf("Jumlah tidak sama");
        return 0;  
    }
    int set1[n1];
    for (int i = 0; i < n1; i++) {
        scanf("%d", &set1[i]);
    }
    int set2[n2];
    for (int i = 0; i < n2; i++) {
        scanf("%d", &set2[i]);
    }
    for (int i = 0; i < n1; i++) {
        printf("%d ", set1[i] * set2[i]);
    }
    printf("\n");

    return 0;  
}
