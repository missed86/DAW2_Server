import json
import requests
import time
from datetime import datetime
# import random


url = "https://id.twitch.tv/oauth2/token"

client_id = "2fqc5bze9g05w7bt502p1d60zntyuw"
client_secret = "8xljg3o41te6ggkb0vwkehl1akkay2"


response = requests.post(url, {'client_id':client_id, 'client_secret':client_secret,'grant_type':'client_credentials'})
output = response.json()

print(output)

access_token = output['access_token']
expires_in = output['expires_in']
token_type = output['token_type']

games_url = "https://api.igdb.com/v4/games"


# https://id.twitch.tv/oauth2/token?client_id=2fqc5bze9g05w7bt502p1d60zntyuw&client_secret=8xljg3o41te6ggkb0vwkehl1akkay2&grant_type=client_credentials


# id = 5803

# response = requests.post(games_url, headers = {'Client-ID':client_id, 'Authorization':'Bearer '+access_token}, data = 'fields *; where id = '+str(id)+';')
# print(response.json())

# def download_json(games_url, id):
#     response = requests.post(games_url, headers = {'Client-ID':client_id, 'Authorization':'Bearer '+access_token}, data = 'fields *; where id = '+str(id)+';')
#     if response.status_code == 200:
#         filename = "JSON-IGDB/IGDBjson-id"+str(id)+".json"
#         data = response.json()
#         with open(filename, 'w') as f:
#             json.dump(data, f)
#             print("'"+filename+"' Creado correctamente")
#             return True
#     else:
#         print("Error: ",response.status_code)
#         print(response.json())
#         return False
    
# page = 20001
# while True:
#     if download_json(games_url, id):
#         id += 1
#         # time.sleep(random.randint(1, 5))
#     else:
#         time.sleep(30)
#     if page > 30000:
#         break