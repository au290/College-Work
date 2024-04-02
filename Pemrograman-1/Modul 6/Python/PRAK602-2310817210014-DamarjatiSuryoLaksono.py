n = int(input())
array = list(map(int, input().split()))

for i in range(n):
    print(array[i] * (i + 1), end="")
    if i < n - 1:
        print(" ", end="")
print()
