print("1.Penjumlahan\n2.Pengurangan\n3.Perkalian\n4.Pembagian\n5.Exit")

pilihan = input("Masukkan Pilihan : ")
Nama = "Damarjati Suryo Laksono"

while pilihan != "5":
    if pilihan == "1":
        nilai_pertama = int(input("Masukkan nilai pertama : "))
        nilai_kedua = int(input("Masukkan nilai kedua : "))
        hasil = nilai_pertama + nilai_kedua
        print(f"Hasil Penjumlahan antara {nilai_pertama:.2f} dengan {nilai_kedua:.2f} adalah : {hasil:.2f}")
    elif pilihan == "2":
        nilai_pertama = int(input("Masukkan nilai pertama : "))
        nilai_kedua = int(input("Masukkan nilai kedua : "))
        hasil = nilai_pertama - nilai_kedua
        print(f"Hasil Pengurangan antara {nilai_pertama:.2f} dengan {nilai_kedua:.2f} adalah : {hasil:.2f}")
    elif pilihan == "3":
        nilai_pertama = int(input("Masukkan nilai pertama : "))
        nilai_kedua = int(input("Masukkan nilai kedua : "))
        hasil = nilai_pertama * nilai_kedua
        print(f"Hasil Perkalian antara {nilai_pertama:.2f} dengan {nilai_kedua:.2f} adalah : {hasil:.2f}")
    elif pilihan == "4":
        nilai_pertama = int(input("Masukkan nilai pertama : "))
        nilai_kedua = int(input("Masukkan nilai kedua : "))
        if nilai_kedua == 0:
            print("Tidak dapat membagi dengan nol!")
        else:
            hasil = nilai_pertama / nilai_kedua
            print(f"Hasil Pembagian antara {nilai_pertama:.2f} dengan {nilai_kedua:.2f} adalah : {hasil:.2f}")
    else:
        print("Input anda salah, silahkan coba lagi")

    pilihan = input("Masukkan Pilihan : ")

print(f"Terimakasih, telah menggunakan kalkulator! {Nama}")
