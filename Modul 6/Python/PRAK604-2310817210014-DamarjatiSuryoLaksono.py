code = input().rstrip('\n')
message = input().rstrip('\n')

if len(code) != len(message):
    print("Panjang kalimat berbeda, pesan palsu")
    exit()

star_count = 0
hash_count = 0
modified_message = ""

for i in range(len(message)):
    if message[i] == ' ' and code[i] == ' ':
        continue
    elif message[i] == code[i]:
        modified_message += '*'
        star_count += 1
    else:
        modified_message += '#'
        hash_count += 1

print(modified_message)
print("* =", star_count)
print("# =", hash_count)

if star_count >= hash_count:
    print("Pesan Asli")
else:
    print("Pesan Palsu")
