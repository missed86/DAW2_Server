# **Ejercicio 01.03.** Escribir un programa que convierta un valor dado en grados Fahrenheit
# a grados Celsius. Recordar que la fórmula para la conversión es: `F = 9/5 * C + 32`.

def fahrenheit_celsius(gradosF):
    return (gradosF - 32) * 5 / 9

print(fahrenheit_celsius(100))