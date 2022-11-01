import json
import requests
import time
from datetime import datetime
import mysqlfunctions
import mysql.connector
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
# response = requests.post(games_url, headers = {'Client-ID':client_id, 'Authorization':'Bearer '+access_token}, data = 'fields *; where id = '+str(id)+';')
# print(response.json())

def scrape_genres():
    offset = 0
    games_url = "https://api.igdb.com/v4/genres"
    total = 0
    while True:
        query = requests.post(games_url, headers = {'Client-ID':client_id, 'Authorization':'Bearer '+access_token}, data = 'fields *; offset '+str(offset)+'; limit 500; sort id asc;')
        if query.status_code == 200:
            # filename = "JSON-IGDB/IGDBjson-id"+str(id)+".json"
            # try:
            # print(query.json())
            try:
                connection = mysql.connector.connect(host='localhost',
                                                    database='waitplaying',
                                                    user='root',
                                                    password='')
                cursor = connection.cursor()
                mySql_insert_query = """INSERT INTO Genres (id, name, slug, created_at, updated_at, url, checksum)
                                        VALUES (%s, %s, %s, %s, %s, %s, %s) """

                for data in query.json():
                #(id, alpha_channel, animated, game, height, width, image_id, url, checksum)
                    id = data['id'] if 'id' in data else None
                    name = data['name'] if 'name' in data else None
                    slug = data['slug'] if 'slug' in data else None
                    updated_at = datetime.fromtimestamp(data['updated_at']) if 'updated_at' in data else None
                    created_at = datetime.fromtimestamp(data['created_at']) if 'created_at' in data else None
                    url = data['url'] if 'url'in data else None
                    checksum = data['checksum'] if 'checksum'in data else None

                    record = (id, name, slug, created_at, updated_at, url, checksum, name, slug, created_at, updated_at, url, checksum)
                    cursor.execute(mySql_insert_query, record)
                    connection.commit()
                    # print(id, url, 'Successfully added')
                    total+=1
                    # if(mysqlfunctions.insert_into_covers(id, alpha_channel, animated, game, height, width, image_id, url, checksum)):
                    #     total+=1
                    # else: 
                    #     print("Error")
                    #     print(data)
                    #     time.sleep(10)
                if len(query.json()) < 500:
                    print("Terminado: Se han guardado " +str(total)+ " elementos.")
                    break
                else:
                    offset += 500

            except mysql.connector.Error as error:
                print("Failed to insert into MySQL table {}".format(error))
            finally:
                if connection.is_connected():
                    cursor.close()
                    connection.close()
            # print("MySQL connection is closed")
            
            # except:
            #     print("Error!")
            #     print(query.json())
        
        # return True
    else:
        print("Error: ",response.status_code)
        print(response.json())
        # return False


scrape_genres()

# while True:
#     if scrape_platforms(games_url, offset) == True:
#         offset += 500
#         # time.sleep(random.randint(1, 5))
#         # time.sleep(0.3)
#     else:
#         break
#     if id > 224000:
#         break