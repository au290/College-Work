def reverse (num):
    reversed = 0 
    while num !=0 :
        digit = num % 10
        reversed = reversed * 10 + digit 
        num //= 10
    return reversed 
A,B = map(int,input("").split(" "))
A = reverse(A)
B = reverse(B)
C = A + B 
print(reverse(C))