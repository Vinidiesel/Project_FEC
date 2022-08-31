import json
from bs4 import BeautifulSoup
import requests
from datetime import datetime

# DISCLAIMER EVERY GAME THAT WERE DISPLAYED IN THIS ARE AVAILABLE AT STEAM IN THIS SECTION: https://store.steampowered.com/genre/Free%20to%20Play/
# NON-PROFIT PROJECT JUST EDUCATIONAL PURPOSES


# cria uma classe para estrutura do jogo capturado
class Jogo:
    def __init__(self, link, nome, imagem, plataforma, tags):
        self.link = link
        self.nome = nome
        self.imagem = imagem
        self.plataforma = plataforma
        self.tags = tags
# dados do arquivo json gerado

print("Coletando dados...")
# acessa o site da Steam em busca dos jogos gratis
html = requests.get("https://store.steampowered.com/genre/Free%20to%20Play/").content

# formata o codigo html para permitir a busca dentro das tags
soup = BeautifulSoup(html, 'html.parser')

print("Gerando lista...")
# cria uma lista com os objetos Jogo
jogos = []
# busca todos os itens de jogo dentro do html
for item in soup.find_all("a", class_="tab_item"):
    # pega o link do jogo
    link_jogo = item.get('href')
    # pega o nome do jogo
    for nome in item.find_all("div", class_="tab_item_name" ):
        nome_jogo = nome.string
    # pega a imagem do jogo
    for imagem in item.find_all("img", class_="tab_item_cap_img"):
        imagem_jogo = imagem.get('src')
    # coleta todas as plataformas do jogo
    plataformas =[]
    for plataforma in item.find_all('span', class_="platform_img"):
        plataformas.append(''.join(plataforma.get('class')[1]))
    # coleta todas as categorias dos jogos
    tags = []
    for tag in item.find_all('span', class_="top_tag"):
        tags.append(''.join(tag))

    # adiciona o jogo na lista
    jogos.append(Jogo(link_jogo, nome_jogo, imagem_jogo, ', '.join(plataformas), ''.join(tags)))

print("Salvando arquivo JSON...")
# gera arquivo json com a lista com os jogos
jogo_json = []
for jogo in jogos:
    jogo_json.append(jogo.__dict__)

# salva no arquivo a lista de jogos
arquivo = open('./Site/jsons/free_to_play.json', 'w', encoding='utf-8')
json.dump(jogo_json, arquivo, indent=4)
arquivo.close()
print("Arquivo JSON gerado com sucesso!")