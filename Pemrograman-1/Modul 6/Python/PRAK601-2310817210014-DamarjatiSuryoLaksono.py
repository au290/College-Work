baris, kolom = map(int, input().split())
input_matriks = list(map(int, input().split()))
matriks = [[0] * kolom for _ in range(baris)]
index = 0
for i in range(baris):
    for j in range(kolom):
        matriks[i][j] = input_matriks[index]
        index += 1
for i in range(baris):
    for j in range(kolom):
        print(matriks[i][j], end=" ")
    print()
