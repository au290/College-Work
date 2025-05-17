#include <stdio.h>

int main() {
    int detik;
    scanf("%d", &detik);

    int menit = detik / 60;
    int jam = menit / 60;
    int hari = jam / 24;

    if (menit >= 60) {
        menit = menit % 60;
    }

    if (detik >= 60) {
        detik = detik % 60;
    }

    if (jam >= 24) {
        jam = jam % 24;
        printf("%d hari ", hari);
    }

    printf("%.2d:%.2d:%.2d", jam, menit, detik);

    return 0;
}
