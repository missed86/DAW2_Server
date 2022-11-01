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



# https://id.twitch.tv/oauth2/token?client_id=2fqc5bze9g05w7bt502p1d60zntyuw&client_secret=8xljg3o41te6ggkb0vwkehl1akkay2&grant_type=client_credentials


# id = 222851
offset = 0
# response = requests.post(games_url, headers = {'Client-ID':client_id, 'Authorization':'Bearer '+access_token}, data = 'fields *; where id = '+str(id)+';')
# print(response.json())

games_url = "https://api.igdb.com/v4/platforms"
def scrape_platforms(games_url, offset):
    total = 0
    query = requests.post(games_url, headers = {'Client-ID':client_id, 'Authorization':'Bearer '+access_token}, data = 'fields *; offset '+str(offset)+'; limit 500;')
    if query.status_code == 200:
        # filename = "JSON-IGDB/IGDBjson-id"+str(id)+".json"
        try:
            while True:
                for data in query.json():
                    #(id, abbreviation, alternative_name, platform_logo, platform_family, category, created_at, generation, name, slug, summary, updated_at, url, checksum)
                    id = data['id'] if 'id' in data else None
                    abbreviation = data['abbreviation'] if 'abbreviation' in data else None
                    alternative_name = data['alternative_name'] if 'alternative_name' in data else None
                    platform_logo = data['platform_logo'] if 'platform_logo' in data else None
                    platform_family = data['platform_family'] if 'platform_family' in data else None
                    category = data['category'] if 'category'in data else None
                    created_at = datetime.fromtimestamp(data['created_at']) if 'created_at'in data else None
                    updated_at = datetime.fromtimestamp(data['updated_at']) if 'updated_at'in data else None
                    generation = data['generation'] if 'generation'in data else None
                    name = data['name'] if 'name'in data else None
                    slug = data['slug'] if 'slug'in data else None
                    summary = data['summary'] if 'summary'in data else None
                    url = data['url'] if 'url'in data else None
                    checksum = data['checksum'] if 'checksum'in data else None

                    if(mysqlfunctions.insert_into_platforms(id, abbreviation, alternative_name, platform_logo, platform_family, category, created_at, generation, name, slug, summary, updated_at, url, checksum)):
                        total+=1
                if len(query.json()) < 500:
                    print("Terminado: Se han guardado " +str(total)+ " elementos.")
                    break
                else:
                    offset += 500

        except:
            print("Error!")
            print(query.json())
        
        # return True
    else:
        print("Error: ",response.status_code)
        print(response.json())
        # return False


scrape_platforms(games_url, offset)

# while True:
#     if scrape_platforms(games_url, offset) == True:
#         offset += 500
#         # time.sleep(random.randint(1, 5))
#         # time.sleep(0.3)
#     else:
#         break
#     if id > 224000:
#         break