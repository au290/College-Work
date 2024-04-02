#include <iostream>
using namespace std;

struct mobil {
    char plat[10] = "DA1234MK";
    char nama[20] = "Andika Hartanto";
    char kendaraan[10] = "RUSH";
    char alamat[20] = "Jl.Kayu Tangi 1" ;
    char kota[20] = "Banjarmasin" ;
};
int main() {
    struct mobil mobilgweh;
    cout <<" "<< endl;
    cout << "a. Plat Nomor Kendaraan : "<< mobilgweh.plat <<endl;
    cout << "b. Jenis Kendaraan : " << mobilgweh.kendaraan <<endl;
    cout << "c. Nama Pemilik : " << mobilgweh.nama <<endl;
    cout << "d. Alamat : " << mobilgweh.alamat<<endl;
    cout << "e. Kota : " << mobilgweh.kota<<endl<<endl;
    return 0;
}

