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

games_url = "https://api.igdb.com/v4/covers"
def scrape_covers(games_url, offset):
    total = 0
    while True:
        query = requests.post(games_url, headers = {'Client-ID':client_id, 'Authorization':'Bearer '+access_token}, data = 'fields *; offset '+str(offset)+'; limit 500; sort id asc;')
        if query.status_code == 200:
            # filename = "JSON-IGDB/IGDBjson-id"+str(id)+".json"
            # try:
            # print(query.json())
            for data in query.json():
                #(id, alpha_channel, animated, game, height, width, image_id, url, checksum)
                id = data['id'] if 'id' in data else None
                alpha_channel = data['alpha_channel'] if 'alpha_channel' in data else False
                animated = data['animated'] if 'animated' in data else False
                height = data['height'] if 'height' in data else None
                width = data['width'] if 'width' in data else None
                game = data['game'] if 'game'in data else None
                image_id = data['image_id'] if 'image_id'in data else None
                url = data['url'] if 'url'in data else None
                checksum = data['checksum'] if 'checksum'in data else None

                if(mysqlfunctions.insert_into_covers(id, alpha_channel, animated, game, height, width, image_id, url, checksum)):
                    total+=1
                else: 
                    print("Error")
                    print(data)
                    time.sleep(10)
            if len(query.json()) < 500:
                print("Terminado: Se han guardado " +str(total)+ " elementos.")
                break
            else:
                offset += 500
        time.sleep(4)
            # except:
            #     print("Error!")
            #     print(query.json())
        
        # return True
    else:
        print("Error: ",response.status_code)
        print(response.json())
        # return False


scrape_covers(games_url, offset)

# while True:
#     if scrape_platforms(games_url, offset) == True:
#         offset += 500
#         # time.sleep(random.randint(1, 5))
#         # time.sleep(0.3)
#     else:
#         break
#     if id > 224000:
#         break