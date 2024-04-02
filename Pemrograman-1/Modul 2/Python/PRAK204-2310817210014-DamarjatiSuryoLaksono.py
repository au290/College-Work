v = input ().split(" ")

if len(v) == 1:
    jari = float(v[0])
    tinggi = float(input())
    
elif len(v) == 2:
    jari, tinggi = map(float, v)

pi = 22/7
volume = round(pi*jari*jari*tinggi,2)
luas = round(2*pi*jari*jari+tinggi,2)
keliling = round(2*pi*jari,2)
print ("Volume =",volume)
print ("Luas =" ,luas)
print ("Keliling =", keliling)