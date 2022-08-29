<?php

$json_archives = scandir('./jsons/', SCANDIR_SORT_DESCENDING);

$path = './jsons/';

$json = $path . $json_archives[0];

$get_file_data = file_get_contents($json);

$parsedJson = json_decode($get_file_data, true);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<form method="post" action="">
<label for="Plataformas"> Escolha uma plataforma</label>
<select name="plataformas" id="plataformas">
  <option value="todas">Todas</option>
  <option value="mac">Mac</option>
  <option value="win">Win</option>
  <option value="linux">Linux</option>
</select>
<input type="submit" name="submit" value="Enviar"/>
</form>

<form method="post" action="">
<label for="site-search">Coloque o nome do jogo:</label>
<input type="search" id="site-search" name="busca">
<input type="submit" name="submit" value="Enviar"/>
</form>

<?php
$plataforma = $_POST['plataformas'] ?? null;
$busca = $_POST['busca'] ?? null;
?>

    <br>
    <h1>Resultados da busca realizada às <?php
    date_default_timezone_set('America/Sao_Paulo');
     echo date('H:i'); ?></h1>
    <h1>Foram encontrados: <?php echo count($parsedJson); ?> jogos!</h1>
    <br>
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
                    </div>
                </div>
            <?php
            }
        }
    }
        ?>
    </div>
    <footer>
        Desenvolvido por Gustavo e Vinicius - 2022 - UNIARA
    </footer>
</body>

</html>