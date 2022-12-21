# foo = dict()
# foo['hola'] = 1
# foo['adios'] = 2
# foo['mas cosas'] = 'cosas'
foo = {"clave1": "valor1", "clave2": "valor2"}

counts = dict()
names = ['csev', 'cwen', 'csev', 'zqian', 'cwen']

for name in names:
    counts[name] = counts.get(name,0)+1

print(counts)