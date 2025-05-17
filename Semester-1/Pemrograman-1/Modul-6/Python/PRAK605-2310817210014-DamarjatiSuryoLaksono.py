def perkalian_matriks(matriks_a, matriks_b):
  if len(matriks_a[0]) != len(matriks_b):
    raise ValueError("Dimensi matriks tidak sesuai")
  matriks_hasil = [[0 for _ in range(len(matriks_b[0]))]
                  for _ in range(len(matriks_a))]
  for i in range(len(matriks_hasil)):
    for j in range(len(matriks_hasil[0])):
      for k in range(len(matriks_a[0])):
        matriks_hasil[i][j] += matriks_a[i][k] * matriks_b[k][j]

  return matriks_hasil
baris = int(input(""))

print("Matriks A")
matriks_a = []
for i in range(baris):
  matriks_a.append(list(map(int, input().split())))
print("Matriks B")
matriks_b = []
for i in range(baris):
  matriks_b.append(list(map(int, input().split())))
matriks_hasil = perkalian_matriks(matriks_a, matriks_b)
print("Matriks AXB")
for i in range(baris):
  for j in range(len(matriks_hasil[0])):
    print(matriks_hasil[i][j], end=" ")
  print()
