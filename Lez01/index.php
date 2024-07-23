<?php include("configurazione.php");#div#console>div*2 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?=TITOLO?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
        <style>
            div#console > div{
                width: 96px;
                height: 96px;
                border: 1px solid red;
                float: left;
            }
            #pulsanti {
                clear:left;
            }
        </style>
    </head>
    <body>
        
        <h1><?=TITOLO?></h1>

    
    <div id="console">
        <div>
            <img id="dado1" src="<?= $img_dado1 ?>" alt="">
        </div>
        <div>
            <img id="dado2" src="<?= $img_dado2 ?>" alt="">
        </div>
    </div>
    <div id="pulsanti">
        <a href="?" id="bottone">Gioca!</a>
    </div>

    <h2><?=$risultato?></h2>
    <h2><?=$_SESSION["vittorie"]?></h2>
    <h2><?=$_SESSION["partite"]?></h2>
    </body>
</html>