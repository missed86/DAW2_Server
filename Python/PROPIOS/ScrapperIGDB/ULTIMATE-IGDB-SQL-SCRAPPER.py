import requests
import time
# from datetime import datetime
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


def scrape_games():
    games_url = "https://api.igdb.com/v4/multiquery"
    offset = 0
    total = 0

    #SQL Connection
    connection = mysql.connector.connect(host='localhost', database='waitplaying', user='root', password='')
    cursor = connection.cursor()

    #Get update time
    update_time_query = "SELECT updated_time FROM sync_control WHERE tablename = 'games'"
    cursor.execute(update_time_query)
    cuttime = cursor.fetchone()[0]
    
    while True:
        query = requests.post(games_url, 
        headers = {'Client-ID':client_id, 'Authorization':'Bearer '+access_token}, 
        data = 'query games "Wait" { \
	            fields *, cover.*; \
                where updated_at > '+str(cuttime)+'; \
                offset '+str(offset)+'; \
                limit 500; \
                sort id asc; \
                };')
        if query.status_code == 200:
            try:
                # print(query.json())
                for data in query.json()[0]['result']:
                    id = data['id'] if 'id' in data else None
                    category = data['category'] if 'category' in data else None
                    collection = data['collection'] if 'collection' in data else None
                    cover_id = data['cover']['id'] if 'cover' in data else None
                    created_at = data['created_at'] if 'created_at' in data else None
                    first_release_date = data['first_release_date'] if 'first_release_date' in data else None
                    name = data['name'] if 'name' in data else None
                    slug = data['slug'] if 'slug' in data else None
                    summary = data['summary'] if 'summary' in data else None
                    storyline = data['storyline'] if 'storyline' in data else None
                    updated_at = data['updated_at'] if 'updated_at' in data else None
                    url = data['url'] if 'url' in data else None
                    checksum = data['checksum'] if 'checksum' in data else None

                    genres = ','.join(str(e) for e in data['genres']) if 'genres' in data else None
                    platforms = ','.join(str(e) for e in data['platforms']) if 'platforms' in data else None
                    screenshots = ','.join(str(e) for e in data['screenshots']) if 'screenshots' in data else None
                    artworks = ','.join(str(e) for e in data['artworks']) if 'artworks' in data else None

                    games_insert_query =  "INSERT INTO games (id, category, collection, cover, created_at, first_release_date, name, slug, summary, storyline, updated_at, url, checksum, genres, platforms, screenshots, artworks) \
                                           VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s) \
                                           ON DUPLICATE KEY UPDATE category=%s, collection=%s, cover=%s, created_at=%s, first_release_date=%s, name=%s, slug=%s, summary=%s, storyline=%s, updated_at=%s, url=%s, checksum=%s, genres=%s, platforms=%s, screenshots=%s, artworks=%s ; "
                    # print(data)
                    record = (id, category, collection, cover_id, created_at, first_release_date, name, slug, summary, storyline, updated_at, url, checksum, genres, platforms, screenshots, artworks, category, collection, cover_id, created_at, first_release_date, name, slug, summary, storyline, updated_at, url, checksum, genres, platforms, screenshots, artworks)
                    cursor.execute(games_insert_query, record)
                    connection.commit()

                    #Covers' Insert
                    if 'cover' in data:
                        id_cover = data['cover']['id'] if 'id' in data['cover'] else None
                        alpha_channel = data['cover']['alpha_channel'] if 'alpha_channel' in data['cover'] else False
                        animated = data['cover']['animated'] if 'animated' in data['cover'] else False
                        height = data['cover']['height'] if 'height' in data['cover'] else None
                        width = data['cover']['width'] if 'width' in data['cover'] else None
                        game = data['cover']['game'] if 'game 'in data['cover'] else None
                        image_id = data['cover']['image_id'] if 'image_id' in data['cover'] else None
                        url = data['cover']['url'] if 'url' in data['cover'] else None
                        checksum = data['cover']['checksum'] if 'checksum' in data['cover'] else None

                        covers_insert_query = "INSERT INTO covers (id, alpha_channel, animated, height, width, game, image_id, url, checksum) \
                                            VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s) \
                                            ON DUPLICATE KEY UPDATE alpha_channel=%s, animated=%s, height=%s, width=%s, game=%s, image_id=%s, url=%s, checksum=%s; "

                        record = (id_cover, alpha_channel, animated, game, height, width, image_id, url, checksum, alpha_channel, animated, game, height, width, image_id, url, checksum)
                        cursor.execute(covers_insert_query, record)
                        connection.commit()

                    print(end='\x1b[2K')
                    print("Scrapping Games: ",id, name, 'Successfully added', end = "\r")
                    total+=1
                if len(query.json()[0]['result']) < 500:
                    print(end='\x1b[2K')
                    print("Terminado Games: Se han guardado " +str(total)+ " elementos.")

                    #get last update time
                    updated_time_update = "UPDATE sync_control SET updated_time = (SELECT MAX(updated_at) FROM games) WHERE tablename = 'games';"
                    cursor.execute(updated_time_update)
                    connection.commit()

                    break

                else:
                    offset += 500

            except mysql.connector.Error as error:
                print("\nFailed to insert into MySQL table {}\n".format(error))
        else:
            print("Error: ",response.status_code)
            print(response.json())
            time.sleep(5)
    if connection.is_connected():
        cursor.close()
        connection.close()


def scrape_genres():
    games_url = "https://api.igdb.com/v4/genres"
    offset = 0
    total = 0

    #SQL Connection
    connection = mysql.connector.connect(host='localhost', database='waitplaying', user='root', password='')
    cursor = connection.cursor()

    #Get update time
    update_time_query = "SELECT updated_time FROM sync_control WHERE tablename = 'genres'"
    cursor.execute(update_time_query)
    cuttime = cursor.fetchone()[0]
    
    while True:
        query = requests.post(games_url,
            headers = {'Client-ID':client_id, 'Authorization':'Bearer '+access_token}, 
            data = 'fields *; \
                where updated_at > '+str(cuttime)+'; \
                limit 500;\
                ')
        if query.status_code == 200:
            try:
                # print(query.json())
                for data in query.json():
                    id = data['id'] if 'id' in data else None
                    name = data['name'] if 'name' in data else None
                    slug = data['slug'] if 'slug' in data else None
                    updated_at = data['updated_at'] if 'updated_at' in data else None
                    created_at = data['created_at'] if 'created_at' in data else None
                    url = data['url'] if 'url'in data else None
                    checksum = data['checksum'] if 'checksum'in data else None

                    genres_insert_query =  "INSERT INTO genres (id, name, slug, created_at, updated_at, url, checksum) \
                                           VALUES (%s, %s, %s, %s, %s, %s, %s) \
                                           ON DUPLICATE KEY UPDATE name=%s, slug=%s, created_at=%s, updated_at=%s, url=%s, checksum=%s; "
                    # print(data)
                    record = (id, name, slug, created_at, updated_at, url, checksum, name, slug, created_at, updated_at, url, checksum)
                    cursor.execute(genres_insert_query, record)
                    connection.commit()

                    print(end='\x1b[2K')
                    print("Scrapping Genres: ",id, name, 'Successfully added', end = "\r")
                    total+=1
                if len(query.json()) < 500:
                    print(end='\x1b[2K')
                    print("Terminado Genres: Se han guardado " +str(total)+ " elementos.")

                    #get last update time
                    updated_time_update = "UPDATE sync_control SET updated_time = (SELECT MAX(updated_at) FROM genres) WHERE tablename = 'genres';"
                    cursor.execute(updated_time_update)
                    connection.commit()

                    break

                else:
                    offset += 500

            except mysql.connector.Error as error:
                print("\nFailed to insert into MySQL table {}\n".format(error))
        else:
            print("Error: ",response.status_code)
            print(response.json())
            time.sleep(5)
    if connection.is_connected():
        cursor.close()
        connection.close()


scrape_games()
scrape_genres()

