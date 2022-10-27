import json
import requests
import time
import random

key = "016ff23f53b84459b69dd6cc1f671d94"
url = "https://api.rawg.io/api/games?key="+key



def download_json(url, page):
    response = requests.get(url+"&page="+str(page))
    if response.status_code == 200:
        filename = "JSON/RAWGjson"+str(page)+".json"
        data = response.json()
        with open(filename, 'w') as f:
            json.dump(data, f)
            print("'JSON/RAWGjson"+str(page)+".json' Creado correctamente")
            return True
    else:
        print("Error: ",response.status_code)
        return False
    
page = 20001
while True:
    if download_json(url, page):
        page += 1
        # time.sleep(random.randint(1, 5))
    else:
        time.sleep(30)
    if page > 30000:
        break