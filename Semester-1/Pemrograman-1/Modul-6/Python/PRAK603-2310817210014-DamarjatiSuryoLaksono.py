n1, n2 = map(int, input().split())

if n1 != n2:
    print("Jumlah tidak sama")
    exit()

set1 = list(map(int, input().split()))
set2 = list(map(int, input().split()))

for i in range(n1):
    print(set1[i] * set2[i], end=" ")

print()
