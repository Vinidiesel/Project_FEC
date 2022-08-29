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
        $ola = 'Farmer Against Potatoes Idle';
        foreach ($parsedJson as $jogo) {
            if(in_array($ola, $jogo)){
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
        ?>
    </div>
    <footer>
        Desenvolvido por Gustavo e Vinicius - 2022 - UNIARA
    </footer>
</body>

</html>