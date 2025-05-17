#include <iostream>
#include <conio.h>
#include <stdlib.h>
#define n 10
using namespace std;

void INSERT(char item);
void DELETE();
void CETAKLAYAR();
void inisialisasi();
void RESET();

int PIL, F = -1, R = -1;
char PILIHAN[1], HURUF;
char Q[n];

int main() {
    inisialisasi();
    do {
        cout << "QUEUE" << endl;
        cout << "==============" << endl;
        cout << "1. INSERT" << endl;
        cout << "2. DELETE" << endl;
        cout << "3. CETAK QUEUE" << endl;
        cout << "4. QUIT" << endl;
        cout << "PILIHAN : ";
        cin >> PILIHAN;
        PIL = atoi(PILIHAN);
        switch (PIL) {
            case 1:
                cout << "Masukkan huruf: ";
                cin >> HURUF;
                INSERT(HURUF);
                break;
            case 2:
                DELETE();
                break;
            case 3:
                CETAKLAYAR();
                break;
            default:
                cout << "Terimakasih" << endl;
                break;
        }
        cout << "press any key to continue" << endl;
        getch();
        system("cls");
    } while (PIL < 4);
}

void INSERT(char item) {
    if (R == n - 1) {
        cout << "Antrian penuh" << endl;
        return;
    } else if (F == -1 && R == -1) {
        F = R = 0;
    } else {
        R++;
    }
    Q[R] = item;
    cout << "Item " << item << " berhasil dimasukkan ke dalam antrian" << endl;
}

void DELETE() {
    if (F == -1) {
        cout << "Antrian kosong" << endl;
        return;
    } else if (F == R) {
        cout << "Item " << Q[F] << " dihapus dari antrian" << endl;
        F = R = -1;
    } else {
        cout << "Item " << Q[F] << " dihapus dari antrian" << endl;
        F++;
    }
}

void CETAKLAYAR() {
    if (F == -1) {
        cout << "Antrian kosong" << endl;
        return;
    }
    cout << "Isi Antrian: ";
    for (int i = F; i <= R; i++) {
        cout << Q[i] << " ";
    }
    cout << endl;
}

void inisialisasi() {
    F = R = -1;
}

void RESET() {
    F = R = -1;
    cout << "Antrian berhasil direset" << endl;
}

