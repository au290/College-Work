def hitung (nilai1,nilai2):
    #Lengkapi Function ini
    x = abs(nilai1 - nilai2)
    return x
def mutlak (angka):
    #Lengkapi Function ini
    y = abs(angka)
    return y

a,c,b,d = map(int,input("").split(" "))
Hasil = hitung(a,b) + hitung(c,d)
print(Hasil)