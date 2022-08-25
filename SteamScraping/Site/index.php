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
    <title>WebScrap - PHP + Python</title>
</head>
<body>
    <br>
    <h1>Resultados da busca realizada às <?php echo date('H:i'); ?></h1>
    
    <div class="cards">
        
    </div>
</body>
</html>