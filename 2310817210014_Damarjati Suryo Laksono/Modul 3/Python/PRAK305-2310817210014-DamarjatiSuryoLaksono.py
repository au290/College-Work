detik = int(input(""))

menit = detik // 60
jam = menit // 60
hari = jam // 24

if menit >= 60:
    menit = menit % 60

if detik >= 60:
    detik = detik % 60

if jam >= 24:
    jam = jam % 24
    print(f"{hari} hari", end=" ")

print(f"{jam:02d}:{menit:02d}:{detik:02d}")
