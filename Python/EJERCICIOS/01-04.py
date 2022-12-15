# **Ejercicio 01.04.** Utilice el programa anterior para generar una tabla de conversión 
# de temperaturas, desde `0º F` hasta `120º F`, de `10` en `10`.

def fahrenheit_celsius(gradosF):
    return (gradosF - 32) * 5 / 9

gradosF = 0
while gradosF <= 120:
    print(str(gradosF)+"ºF | "+ str(fahrenheit_celsius(gradosF))+"ºC")
    gradosF = gradosF + 10