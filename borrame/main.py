import requests

response = requests.get('https://httpbin.org/ip')
print('Su IP en Internet es {0}'.format(response.json()['origin'].split(',')[0]))