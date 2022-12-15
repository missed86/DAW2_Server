# **Ejercicio 01.05.** Escribir un programa que imprima todos los números 
# pares entre dos números que se le pidan al usuario.

def pares(min,max):
    temp = int(min)
    while temp < int(max):
        if temp % 2 == 0:
            print(temp)
        temp += 1

min = input("Numero inicial: ")
max = input("Numero final: ")

pares(min,max)