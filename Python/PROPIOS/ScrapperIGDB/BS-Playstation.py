import requests
from bs4 import BeautifulSoup
import json

# URLEurogamerPSPLUS = "https://www.eurogamer.es/playstation-plus-extra-premium-lista-todos-videojuegos-este-mes"
# page = requests.get(URLEurogamerPSPLUS)
# soup = BeautifulSoup(page.content, "html.parser")

# PS5games_elements = soup.select("section:has(h2#section-1) li")
# PS4games_elements = soup.select("section:has(h2#section-2) li")

# for e in PS5games_elements:
#     print(e.text)
# for e in PS4games_elements:
#     print(e.text)

GamepassAllGames = "https://catalog.gamepass.com/sigls/v2?id=f6f1f99f-9b49-4ccd-b3bf-4d9767a77f5e&language=en-us&market=US"
GamepassAllGamesJSON = requests.get(GamepassAllGames)

# print(GamepassAllGamesJSON.json())
GamepassAllGamesList = []
for game in GamepassAllGamesJSON.json():
    # GamepassAllGamesList.append(game['id'])
    if 'id' in game:
        GamepassAllGamesList.append(game['id'])

# print(GamepassAllGamesList)
idsString = ",".join(GamepassAllGamesList)
GamepassAllGamesFullData = f"https://displaycatalog.mp.microsoft.com/v7.0/products?bigIds={idsString}&market=US&languages=en-us&MS-CV=DGU1mcuYo0WMMp"

# print(GamepassAllGamesFullData)
GamepassAllGamesFullDataJSON = requests.get(GamepassAllGamesFullData).json()
# print(type(GamepassAllGamesFullDataJSON))
# print(GamepassAllGamesFullDataJSON)
for game in GamepassAllGamesFullDataJSON['Products']:
    print(game['LocalizedProperties'][0]['ProductTitle'].replace('®','').replace('™',''))