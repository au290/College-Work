#include <stdio.h>

int main() {
    int araara;
    char symbol;
    int i = 1;

    scanf("%d %c", &araara, &symbol);

    while (i <= 50) {
        if (i % araara == 0) {
            printf("%c ", symbol);
        } else {
            printf("%d ", i);
        }
        i++;
    }

    return 0;
}
