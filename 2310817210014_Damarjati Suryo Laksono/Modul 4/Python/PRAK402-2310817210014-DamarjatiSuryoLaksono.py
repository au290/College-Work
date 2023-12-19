Value = int(input(""))

ganjil = 1
while ganjil <= Value:
    if ganjil % 2 != 0:
        print(ganjil, end=" ")
    ganjil += 1

print()

genap = Value
while genap >= 2:
    if genap % 2 == 0:
        print(genap, end=" ")
    genap -= 1
