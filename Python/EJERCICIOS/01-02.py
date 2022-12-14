# Escribir un programa que le pregunte al usuario una cantidad de pesos, una tasa  de interés y 
# un número de años y muestre como resultado el monto final a obtener. La fórmula a utilizar es:
# ```
# Cn = C * (1 + x/100) ^ n
# ```
# Donde `C` es el capital inicial, `x` es la tasa de interés y `n` es el número de años a calcular.

def monto(capital, interes, annos):
    return round(capital * (1 + interes / 100 )**annos, 2)

capital = float(input("Cuantos pesos tienes? "))
interes = float(input("Tasa de interés: "))
annos = int(input("A cuantos años? "))

print(monto(capital,interes,annos))
