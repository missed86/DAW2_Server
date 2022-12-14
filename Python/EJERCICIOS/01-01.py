# **Ejercicio 01.01.** Ciclos definidos

# a) Escribir un ciclo definido para imprimir por pantalla todos los números entre 10 y 20.

# for n in range(10,21):
#     print(n)

# b) Escribir un ciclo definido que salude por pantalla a sus cinco mejores amigos/as.

# for name in ('jaime', 'riku', 'sora', 'perro', 'gato'):
#     print ('Hola '+ name)

# c) Escribir un programa que use un ciclo definido con rango numérico, que  pregunte 
# los nombres de sus cinco mejores amigos/as, y los salude.

# names = []
# for name in range(0,5):
#     name = input('Dame un nombre: ')
#     names.append(name)
# for name in names:
#     print ('Hola '+ name)

# d) Escribir un programa que use un ciclo definido con rango numérico, que  pregunte los 
# nombres de sus seis mejores amigos/as, y los salude.

# names = []
# for name in range(0,6):
#     name = input('Dame un nombre: ')
#     names.append(name)
# for name in names:
#     print ('Hola '+ name)

# e) Escribir un programa que use un ciclo definido con rango numérico, que  averigue a cuántos 
# amigos quieren saludar, les pregunte los nombres de  esos amigos/as, y los salude.

num_amigos = int(input('Cuantos amigos tienes? '))
amigos = []
for name in range(0,num_amigos):
    amigos.append(input("Nombre de tu amigo: "))
for name in amigos:
    print("Hola "+name)