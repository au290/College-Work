araara, symbol = map(str, input("").split())
araara = int(araara)

i = 1

while i <= 50:
    if i % araara == 0:
        print(f"{symbol} ", end="")
    else:
        print(f"{i} ", end="")
    i += 1
