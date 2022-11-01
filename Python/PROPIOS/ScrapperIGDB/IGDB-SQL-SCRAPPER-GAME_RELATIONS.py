import requests
import time
from datetime import datetime
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


#declaraciones
games_url = "https://api.igdb.com/v4/games"

gamerelations = {'genres': 'games_genres', 'platforms':'games_platforms', 'screenshots': 'games_screenshots', 'artworks': 'games_artworks'}


# https://id.twitch.tv/oauth2/token?client_id=2fqc5bze9g05w7bt502p1d60zntyuw&client_secret=8xljg3o41te6ggkb0vwkehl1akkay2&grant_type=client_credentials


offset = 0

def scrape_relations(games_url, offset):
    total = 0
    while True:
        query = requests.post(games_url, headers = {'Client-ID':client_id, 'Authorization':'Bearer '+access_token}, data = 'fields *; offset '+str(offset)+'; limit 500; sort id asc;')
        if query.status_code == 200:
            try:
                connection = mysql.connector.connect(host='localhost',
                                                    database='waitplaying',
                                                    user='root',
                                                    password='')
                cursor = connection.cursor()

                for data in query.json():
                    id_game = data['id']
                    dictArrays = {} #{'genres': data['genres'], 'platforms': data['platforms'], 'screenshots': data['screenshots'], 'artworks': data['artworks']}
                    if ('genres' in data): dictArrays.update({'genres': data['genres']})
                    if ('platforms' in data): dictArrays.update({'platforms': data['platforms']})
                    if ('screenshots' in data): dictArrays.update({'screenshots': data['screenshots']})
                    if ('artworks' in data): dictArrays.update({'artworks': data['artworks']})

                    for key, value in dictArrays.items():
                        for id_relation in value:

                            mySql_insert_query = "INSERT INTO " + gamerelations[key] + " VALUES ("+ str(id_game) +", "+ str(id_relation) +");"
                            
                            cursor.execute(mySql_insert_query)
                            connection.commit()
                            
                            print(id_game, id_relation, 'Successfully added', end = "\r")
                            total+=1

                if len(query.json()) < 500:
                    print("\n", end="\r")
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
        else:
            print("Error: ",response.status_code)
            print(response.json())


scrape_relations(games_url, offset)
