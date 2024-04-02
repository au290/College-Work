k, l = map(int, input("").split())

i = k
j = l

if k > l:
    while i > l:
        print(f"{i} {j} - ", end="")
        i -= 1
        j += 1
else:
    while i < l:
        print(f"{i} {j} - ", end="")
        i += 1
        j -= 1

print(l, k)
