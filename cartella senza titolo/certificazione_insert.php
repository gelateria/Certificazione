<?php
//http://localhost:8888/sito/gelateria/certificazione.php

// nome di host
$host = "localhost"; //localhost

// nome del database
$db = "sitogelateria";

// username dell'utente in connessione
    $user = "ice"; //ice

// password dell'utente
    $password = "cream"; //cream


$connessione = new PDO("mysql:host=$host; dbname=$db", $user, $password);


if(isset($_POST['submit'])) {


    $cert = (isset($_POST['certificazione'])) ? $_POST['certificazione'] : '';
    $data_cert = (isset($_POST['data'])) ? $_POST['data'] : '';
   // $query_data = "INSERT INTO certificazione VALUES('" . STR_TO_DATE($data_cert, '%d/%m/%Y' )."')";

    $descr = (isset($_POST['description'])) ? $_POST['description'] : '';
    $foto=(isset($_POST['foto'])) ? $_POST['foto'] : '';

    $sql = $connessione->prepare("
                                  INSERT INTO `certificazione`( `nome_certificazione`, `data_certificazione`,`descrizione_certificazione`,`logo_certificazione`)

                        VALUES ('".$cert."','".$data_cert."','".$descr."','".$foto."')");
    if ($sql->execute()) {
        echo "Dato: ".$cert.", ".$data_cert." Correttamente Inserito";
    } else {
        die('Impossibile Salvare il Record:  .'.$cert." ,  ".$data_cert);
    }
}



?>




<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>INSERISCI Certificazione</title>
    <style type="text/css">
        body{text-align: center}
        div{
            border: 3px solid black;
            max-width: 350px;
            height: 250px;
            margin: 0 auto;
            text-align: left;
            padding-left: 50px;
            padding-top: 30px;

        }

    </style>
</head>
<body>
<h1>Aggiungi Certificazione</h1>

<div>
    <form action='#"' method='post' >

        <p>Certificazione
            <input type='text' name='certificazione' required />
        </p>

        <p>Data
            <input type="date" name="data" required> (YYYY-MM-DD)

        </p>
        <p>Descrizione
            <input type="text" name="description" maxlength="100" required>
        </p>
        <p>Logo
            <input name="foto" type="file" id="foto" >

        </p>


        <input type='submit' name="submit" value='INSERISCI' />
        or &nbsp;
       Back to <a href='certificazione_select.php'>Certificazione</a>



    </form>
</div>

</body>
</html>