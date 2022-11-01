import json
import requests
import time
from datetime import datetime
import mysqlfunctions
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


id = 126941

# response = requests.post(games_url, headers = {'Client-ID':client_id, 'Authorization':'Bearer '+access_token}, data = 'fields *; where id = '+str(id)+';')
# print(response.json())

def scrape_game(games_url, id):
    query = requests.post(games_url, headers = {'Client-ID':client_id, 'Authorization':'Bearer '+access_token}, data = 'fields *; where id = '+str(id)+';')
    if query.status_code == 200:
        # filename = "JSON-IGDB/IGDBjson-id"+str(id)+".json"
        try:
            data = query.json()[0]

            id = data['id'] if 'id' in data else None
            category = data['category'] if 'category'in data else None
            collection = data['collection'] if 'collection'in data else None
            cover = data['cover'] if 'cover'in data else None
            created_at = datetime.fromtimestamp(data['created_at']) if 'created_at'in data else None
            first_release_date = datetime.fromtimestamp(data['first_release_date']) if 'first_release_date'in data else None
            name = data['name'] if 'name'in data else None
            slug = data['slug'] if 'slug'in data else None
            summary = data['summary'] if 'summary'in data else None
            storyline = data['storyline'] if 'storyline'in data else None
            updated_at = datetime.fromtimestamp(data['updated_at']) if 'updated_at'in data else None
            url = data['url'] if 'url'in data else None
            checksum = data['checksum'] if 'checksum'in data else None

            mysqlfunctions.insert_into_games(id, category, collection, cover, created_at, first_release_date, name, slug, summary, storyline, updated_at, url, checksum)
            
            

        except:
            print("Error, parece vacío")
            print(query.json())
        
        return True
    else:
        print("Error: ",response.status_code)
        print(response.json())
        return False
    
while True:
    if scrape_game(games_url, id):
        id += 1
        # time.sleep(random.randint(1, 5))
        # time.sleep(0.3)
    else:
        time.sleep(1)
    if id > 223000:
        break