n, kelipatan = map(int, input("").split())

hasil = 0
i = 1

while i <= n:
    n_baris = 0
    a = i

    while a > 0:
        n_baris += a * kelipatan

        if a == i:
            print(f"({a} * {kelipatan})", end="")
        else:
            print(f" + ({a} * {kelipatan})", end="")

        a -= 1

    print(f" = {n_baris}")
    hasil += n_baris
    i += 1

print(hasil)
