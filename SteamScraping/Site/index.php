<?php
// DISCLAIMER EVERY GAME THAT WERE DISPLAYED IN THIS ARE AVAILABLE AT STEAM IN THIS SECTION: https://store.steampowered.com/genre/Free%20to%20Play/
// NON-PROFIT PROJECT JUST EDUCATIONAL PURPOSES

// faz um scan no diretorio onde o main.py salvou a lista gerada, e seleciona o arquivo pela data mais recente
$json_archives = scandir('./jsons/', SCANDIR_SORT_DESCENDING);

$path = './jsons/'; // variavel para definir o caminho onde está o arquivo JSON

$json = $path . $json_archives[0]; // concatenando o caminho + o arquivo escaneado mais acima no código, para formar o caminho completo do json

$get_file_data = file_get_contents($json); // pegando os dados do arquivo

$parsedJson = json_decode($get_file_data, true); // decodificando o arquivo e gerando um array com os valores encontrados

$plataforma = $_POST['plataformas'] ?? null;

$busca = $_POST['busca'] ?? null;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- DISCLAIMER EVERY GAME THAT WERE DISPLAYED IN THIS ARE AVAILABLE AT STEAM IN THIS SECTION: https://store.steampowered.com/genre/Free%20to%20Play/
         NON-PROFIT PROJECT JUST EDUCATIONAL PURPOSES -->

</head> 
<script src="script.js" rel="text/javascript" defer></script>
<body>
<br>
<h1>Resultados da busca realizada às <?php date_default_timezone_set('America/Sao_Paulo'); echo date('H:i'); ?></h1>
<h1>Foram encontrados: <?php echo count($parsedJson); ?> jogos!</h1>
<center>
<form class="formsFilter" method="POST" action="">
    <label class="labelText" for="Plataformas"> Escolha uma plataforma</label>
    <select name="plataformas" id="plataformas">
        <option value="todas">Todas</option>
        <option value="mac">Mac</option>
        <option value="win">Win</option>
        <option value="linux">Linux</option>
    </select>
    <input class="btnSubmit" type="submit" name="submit" value="Filtrar"/>
</form>
</center>
<br>
<br>
<div class="content">
    <?php
        if ($busca == null){
            switch ($plataforma){
            case 'todas':
            foreach ($parsedJson as $jogo) {
    ?>
                <div class="card">
                    <div class="topCard">
                        <h2 class="title"><?php echo $jogo['nome']; ?></h2>
                        <span class="secondTitle"></span>
                    </div>
                    <div class="mediumCard"><img class="imgGame" src="<?php echo $jogo['imagem']; ?>" alt=""></div>
                    <div class="bottomCard">
                        <p class="bottomText"><b>Plataforma(s) suportada(s):</b> <?php echo $jogo['plataforma'] . "."; ?></p>
                        <div class="tagsGame">
                            <ul>
                                <li class="tagGame"><b>Tags:</b> <?php echo $jogo['tags'] . ","; ?></li>
                            </ul>
                        </div>
                        <span>Gostou? Então acesse a página oficial <a href="<?php echo $jogo['link']; ?>">aqui</a>!</span>
                    </div>
                </div>
            <?php
            }
            break;
            case 'mac':
                foreach ($parsedJson as $jogo) {
                    if (in_array('mac', $jogo) || in_array('win, mac', $jogo) || in_array('win, mac, linux', $jogo) || in_array('mac, linux', $jogo)){
                    ?>
                        <div class="card">
                            <div class="topCard">
                                <h2 class="title"><?php echo $jogo['nome']; ?></h2>
                                <span class="secondTitle"></span>
                            </div>
                            <div class="mediumCard"><img class="imgGame" src="<?php echo $jogo['imagem']; ?>" alt=""></div>
                            <div class="bottomCard">
                                <p class="bottomText"><b>Plataforma(s) suportada(s):</b> <?php echo $jogo['plataforma'] . "."; ?></p>
                                <div class="tagsGame">
                                    <ul>
                                        <li class="tagGame"><b>Tags:</b> <?php echo $jogo['tags'] . ","; ?></li>
                                    </ul>
                                </div>
                                <span>Gostou? Então acesse a página oficial <a href="<?php echo $jogo['link']; ?>">aqui</a>!</span>
                            </div>
                        </div>
                    <?php
                    }
                }
            break;
            case 'win':
                foreach ($parsedJson as $jogo) {
                    if (in_array('win', $jogo) || in_array('win, mac', $jogo) || in_array('win, mac, linux', $jogo)){
                    ?>
                        <div class="card">
                            <div class="topCard">
                                <h2 class="title"><?php echo $jogo['nome']; ?></h2>
                                <span class="secondTitle"></span>
                            </div>
                            <div class="mediumCard"><img class="imgGame" src="<?php echo $jogo['imagem']; ?>" alt=""></div>
                            <div class="bottomCard">
                                <p class="bottomText"><b>Plataforma(s) suportada(s):</b> <?php echo $jogo['plataforma'] . "."; ?></p>
                                <div class="tagsGame">
                                    <ul>
                                        <li class="tagGame"><b>Tags:</b> <?php echo $jogo['tags'] . ","; ?></li>
                                    </ul>
                                </div>
                                <span>Gostou? Então acesse a página oficial <a href="<?php echo $jogo['link']; ?>">aqui</a>!</span>
                            </div>
                        </div>
                    <?php
                    }
                }
            break;
            case 'linux':
                foreach ($parsedJson as $jogo) {
                    if (in_array('linux', $jogo) || in_array('win, linux', $jogo) || in_array('win, mac, linux', $jogo) || in_array('mac, linux', $jogo)){
                    ?>
                        <div class="card">
                            <div class="topCard">
                                <h2 class="title"><?php echo $jogo['nome']; ?></h2>
                                <span class="secondTitle"></span>
                            </div>
                            <div class="mediumCard"><img class="imgGame" src="<?php echo $jogo['imagem']; ?>" alt=""></div>
                            <div class="bottomCard">
                                <p class="bottomText"><b>Plataforma(s) suportada(s):</b> <?php echo $jogo['plataforma'] . "."; ?></p>
                                <div class="tagsGame">
                                    <ul>
                                        <li class="tagGame"><b>Tags:</b> <?php echo $jogo['tags'] . ","; ?></li>
                                    </ul>
                                </div>
                                <span>Gostou? Então acesse a página oficial <a href="<?php echo $jogo['link']; ?>">aqui</a>!</span>
                            </div>
                        </div>
                    <?php
                    }
                }
            break;
            default:
            foreach ($parsedJson as $jogo) {
                ?>
                    <div class="card">
                        <div class="topCard">
                            <h2 class="title"><?php echo $jogo['nome']; ?></h2>
                            <span class="secondTitle"></span>
                        </div>
                        <div class="mediumCard"><img class="imgGame" src="<?php echo $jogo['imagem']; ?>" alt=""></div>
                        <div class="bottomCard">
                            <p class="bottomText"><b>Plataforma(s) suportada(s):</b> <?php echo $jogo['plataforma'] . "."; ?></p>
                            <div class="tagsGame">
                                <ul>
                                    <li class="tagGame"><b>Tags:</b> <?php echo $jogo['tags'] . ","; ?></li>
                                </ul>
                            </div>
                            <span>Gostou? Então acesse a página oficial <a href="<?php echo $jogo['link']; ?>">aqui</a>!</span>
                        </div>
                    </div>
                <?php
            }
        }
    }else{
        foreach ($parsedJson as $jogo) {
            if (in_array($busca, $jogo)){
            ?>
                <div class="card">
                    <div class="topCard">
                        <h2 class="title"><?php echo $jogo['nome']; ?></h2>
                        <span class="secondTitle"></span>
                    </div>
                    <div class="mediumCard"><img class="imgGame" src="<?php echo $jogo['imagem']; ?>" alt=""></div>
                    <div class="bottomCard">
                        <p class="bottomText"><b>Plataforma(s) suportada(s):</b> <?php echo $jogo['plataforma'] . "."; ?></p>
                        <div class="tagsGame">
                            <ul>
                                <li class="tagGame"><b>Tags:</b> <?php echo $jogo['tags'] . ","; ?></li>
                            </ul>
                        </div>
                        <span class="linkSpan">Gostou? Então acesse a página oficial <a class="link" href="<?php echo $jogo['link']; ?>">aqui</a>!</span>
                    </div>
                </div>
            <?php
            }
        }
    }
        ?>
    </div>
    <footer class="footer">
        Desenvolvido por Gustavo, Vinicius, Artur e Filipe - 2022 - UNIARA
    </footer>
</body>

</html>