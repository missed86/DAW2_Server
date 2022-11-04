import requests

url = "https://id.twitch.tv/oauth2/token"

client_id = "2fqc5bze9g05w7bt502p1d60zntyuw"
client_secret = "8xljg3o41te6ggkb0vwkehl1akkay2"

response = requests.post(url, {'client_id':client_id, 'client_secret':client_secret,'grant_type':'client_credentials'})
output = response.json()

print(output)