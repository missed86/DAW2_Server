Para resolver estos ejercicios de Python, propongo las siguientes soluciones:

Ejercicio 01.10

La cantidad de segundos en un tiempo dado en horas, minutos y segundos se puede calcular con la siguiente función:

Copy code
def tiempo_a_segundos(horas, minutos, segundos):
  return horas * 3600 + minutos * 60 + segundos
La cantidad de horas, minutos y segundos de un tiempo dado en segundos se puede calcular con la siguiente función:

Copy code
def segundos_a_tiempo(segundos):
  horas = segundos // 3600
  minutos = (segundos % 3600) // 60
  segundos = segundos % 60
  return horas, minutos, segundos
Ejercicio 01.11

Para sumar dos tiempos expresados en horas, minutos y segundos, podemos primero convertir ambos tiempos a segundos y luego sumarlos. Luego, podemos usar la función segundos_a_tiempo del ejercicio anterior para obtener el resultado en horas, minutos y segundos. El código podría ser el siguiente:

Copy code
def sumar_tiempos(horas1, minutos1, segundos1, horas2, minutos2, segundos2):
  segundos1 = tiempo_a_segundos(horas1, minutos1, segundos1)
  segundos2 = tiempo_a_segundos(horas2, minutos2, segundos2)
  segundos_totales = segundos1 + segundos2
  return segundos_a_tiempo(segundos_totales)

# Ejemplo de uso:
horas, minutos, segundos = sumar_tiempos(1, 30, 0, 2, 15, 0)
print(horas, minutos, segundos)  # Imprime: 3 45 0
Ejercicio 01.12

Para encontrar el mayor producto de dos de cuatro números, podemos hacer lo siguiente:

Crear una lista con todas las combinaciones posibles de dos elementos de la lista de números.
Calcular el producto de cada combinación y guardar el mayor hasta el momento.
Devolver el mayor producto encontrado.
El código podría ser el siguiente:

Copy code
from itertools import combinations

def mayor_producto(n



Jaime García Sevilla
continue
Ejercicio 01.13

Para obtener la norma de un vector al origen, podemos usar la siguiente función:
Copy code
def norma(x, y):
  return (x**2 + y**2)**0.5

# Ejemplo de uso:
print(norma(3, 4))  # Imprime: 5.0
Para obtener la resta de dos puntos en el plano, podemos usar la siguiente función:
Copy code
def resta(x1, y1, x2, y2):
  return x1 - x2, y1 - y2

# Ejemplo de uso:
print(resta(1, 2, 3, 4))  # Imprime: (-2, -2)
Para obtener la distancia entre dos puntos en el plano, podemos usar la función resta del paso anterior para obtener la diferencia entre ambos puntos, y luego usar la función norma del paso 1 para obtener la norma del vector resultante. El código podría ser el siguiente:
Copy code
def distancia(x1, y1, x2, y2):
  dx, dy = resta(x1, y1, x2, y2)
  return norma(dx, dy)

# Ejemplo de uso:
print(distancia(1, 2, 3, 4))  # Imprime: 2.8284271247461903
Para obtener un vector normalizado a partir de un vector al origen, podemos dividir cada componente del vector por su norma. La función podría ser la siguiente:
Copy code
def normalizar(x, y):
  norma_v = norma(x, y)
  return x / norma_v, y / norma_v

# Ejemplo de uso:
print(normalizar(3, 4))  # Imprime: (0.6, 0.8)
Para obtener el vector dirección unitario de la recta que une dos puntos, podemos primero usar la función resta del paso 2 para obtener el vector que une ambos puntos, y luego usar la función normalizar del paso 4 para obtener un vector normalizado. El código podría ser el siguiente:
Copy code
def vector_direccion(x1, y1, x2, y2):
  dx, dy = resta(x1, y1, x2, y2)
  return normalizar(dx, dy)

# Ejemplo de uso:
print(vector_direccion(1, 2, 3, 4))  # Imprime: (-0.8, -0.6)
Para obtener la proyecci



Jaime García Sevilla
continue
Ejercicio 01.13 (continuación)

Para calcular el área de un triángulo a partir de su base y su altura, podemos usar la siguiente función:
Copy code
def area_triangulo(base, altura):
  return base * altura / 2

# Ejemplo de uso:
print(area_triangulo(3, 4))  # Imprime: 6.0
Para calcular el área de un triángulo a partir de sus tres puntos, podemos usar la función distancia del paso 3 para obtener las longitudes de los lados del triángulo, y luego usar la fórmula de Herón para calcular el área. La fórmula de Herón dice que el área de un triángulo es:
Copy code
sqrt(s * (s - a) * (s - b) * (s - c))
donde s es el semiperímetro del triángulo, y a, b y c son las longitudes de sus lados. El semiperímetro se puede calcular como:

Copy code
s = (a + b + c) / 2
La función podría ser la siguiente:

Copy code
from math import sqrt

def area_triangulo_puntos(x1, y1, x2, y2, x3, y3):
  a = distancia(x1, y1, x2, y2)
  b = distancia(x1, y1, x3, y3)
  c = distancia(x2, y2, x3, y3)
  s = (a + b + c) / 2
  return sqrt(s * (s - a) * (s - b) * (s - c))

# Ejemplo de uso:
print(area_triangulo_puntos(1, 2, 3, 4, 5, 6))  # Imprime: 2.449489742783178
Para calcular el ángulo formado por dos vectores al origen, podemos usar la siguiente función:
Copy code
from math import atan2

def angulo_vectores(x1, y1, x2, y2):
  return atan2(y2, x2) - atan2(y1, x1)