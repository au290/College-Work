#include <iostream>
using namespace std;

struct baru {
    char huruf,kata[20] ;
    int Angka;
};
int main() {
    struct baru barul;
    cout << "a. Masukan Sebuah Huruf = ";
    cin >> barul.huruf ;
    cout << "b. Masukan Sebuah Kata = ";
    cin >> barul.kata ;
    cout <<  "c. Masukan Angka = ";
    cin >> barul.Angka ;
    cout << "d. Huruf yang Anda masukan adalah : "<< barul.huruf << endl;
    cout << "e. Kata yang Anda masukan adalah : " << barul.kata << endl;
    cout << "f. Angka yang Anda masukan adalah : " << barul.Angka << endl;
    return 0;
}

