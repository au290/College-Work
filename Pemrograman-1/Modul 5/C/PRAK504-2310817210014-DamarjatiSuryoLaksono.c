#include <stdio.h>

int reverse(int num) {
    // Lengkapi Function ini
    int reversed = 0;
    for (; num > 0; num /= 10) {
        int digit = num % 10;
        reversed = reversed * 10 + digit;
    }
    return reversed;
}

int main() {
    int A, B;
    scanf("%d %d", &A, &B);
    A = reverse(A);
    B = reverse(B);
    int C = A + B;
    printf("%d", reverse(C));
    return 0;
}
