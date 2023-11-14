#include <stdio.h>

int main() {
    int n, kelipatan;

    printf("Masukkan nilai n dan kelipatan : ");
    scanf("%d %d", &n, &kelipatan);

    int hasil = 0;
    int i = 1;

    while (i <= n) {
        int n_baris = 0;
        int a = i;

        while (a > 0) {
            n_baris += a * kelipatan;

            if (a == i) {
                printf("(%d * %d)", a, kelipatan);
            } else {
                printf(" + (%d * %d)", a, kelipatan);
            }

            a--;
        }

        printf(" = %d\n", n_baris);
        hasil += n_baris;
        i++;
    }

    printf("%d\n", hasil);

    return 0;
}
