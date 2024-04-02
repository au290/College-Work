#Buatlah Function Disini
def Maxbilangan (a,b,c,d) :
    max = a
    if max<b:
        max = b
    if max<c:
        max = c
    if max<d:
        max = d
    return max 

a, b, c, d = map(int,input("").split(" "))
hasil = Maxbilangan(a,b,c,d)
print(hasil)