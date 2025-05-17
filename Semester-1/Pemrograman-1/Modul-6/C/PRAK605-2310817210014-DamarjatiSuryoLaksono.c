#include <stdio.h>

void perkalianMatriks(int matriksPertama[][10], int matriksKedua[][10], int hasil[][10], int n) {
    for (int i = 0; i < n; i++) {
        for (int j = 0; j < n; j++) {
            hasil[i][j] = 0;
            for (int k = 0; k < n; k++) {
                hasil[i][j] += matriksPertama[i][k] * matriksKedua[k][j];
            }
        }
    }
}

void tampilkanMatriks(int matriks[][10], int n) {
    for (int i = 0; i < n; i++) {
        for (int j = 0; j < n; j++) {
            printf("%d ", matriks[i][j]);
        }
        printf("\n");
    }
}

int main() {
    int n, matriksPertama[10][10], matriksKedua[10][10], hasil[10][10];
    scanf("%d", &n);
    printf("Matriks A\n");
    for (int i = 0; i < n; i++) {
        for (int j = 0; j < n; j++) {
            scanf("%d", &matriksPertama[i][j]);
        }
    }
    printf("Matriks B\n");
    for (int i = 0; i < n; i++) {
        for (int j = 0; j < n; j++) {
            scanf("%d", &matriksKedua[i][j]);
        }
    }
    perkalianMatriks(matriksPertama, matriksKedua, hasil, n);
    printf("Matriks AXB\n");
    tampilkanMatriks(hasil, n);

    return 0;
}
