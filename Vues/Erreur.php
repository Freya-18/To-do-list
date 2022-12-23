<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Page d'erreur</title>

    <link href="https://fonts.googleapis.com/css?family=Kanit:200" rel="stylesheet">

    <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css" />

    <link type="text/css" rel="stylesheet" href="css/style.css" />

</head>

<body>

    <div id="error">
        <div class="error">
            <div class="errorTitle">
                <h1>ERREUR</h1>
            </div>
            <h2><?php
                    if(isset ($dVueEreur)) {
                        foreach($dVueEreur as $value){
                            echo $value;
                        }
                    }?>
            </h2>
            <a href=?action="">retourner à la page d'acceuil</a>
        </div>
    </div>

</body>

</html>