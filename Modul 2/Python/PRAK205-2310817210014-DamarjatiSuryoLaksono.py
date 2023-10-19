import math
v = input().split(" ")

if len(v) == 1:
    a = float(v[0])
    b = float(input())
    
elif len(v) == 2:
    a, b = map(float, v)

c = pow(b, 2) - pow(a, 2)
alas = math.sqrt(c)
luas = 0.5 * alas * a
keliling = a + b + alas

print(f"Alas = {alas:.0f} cm")
print(f"Tinggi = {a:.0f} cm")
print(f"Keliling = {keliling:.0f} cm")
print(f"Luas = {luas:.0f} cm ^ 2")
