v = input ().split(" ")

if len(v) == 2 :
    a, b = map(float, v)
    i, j = map(float, input().split(" "))
    x, y = map(float, input().split(" "))
    
elif len(v) == 6 :
    a, b, i, j, x, y = map(float,v) 
    
h = round((a-b) * (i/j) - (x+y),3)
print(h)