angka = input("")
angka = int(angka)
if (angka == 0) :
    print("Nol")
elif(angka >0 and angka <10) :
    print("Satuan")
elif(angka>=10 and angka <=19):
    print("Belasan")
elif(angka >19 and angka<100):
    print("Puluhan")
else : 
    print("Anda Menginput Melebihi Limit Bilangan")