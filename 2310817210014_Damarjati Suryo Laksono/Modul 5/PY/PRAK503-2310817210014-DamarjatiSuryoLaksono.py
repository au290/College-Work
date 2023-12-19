def maksimal(a, b):
    if a < b:
        return b
    else:
        return a

def minimal(a, b):
    if a > b:
        return b
    else:
        return a
batas = 0
maks = -100000
minim = 100000

bilangan = int(input(""))
nilai = list(map(int, input().split()))

while (batas < bilangan) :
    maks = maksimal(maks,nilai[batas])
    minim = minimal(minim,nilai[batas])
    batas += 1

print(maks,minim)
