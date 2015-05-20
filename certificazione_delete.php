<?php
/**
 * Created by PhpStorm.
 * User: robertarandazzo
 * Date: 20/05/15
 * Time: 20:03
 */


/*include'conn_db.php';*/
$host = "localhost";



// nome del database
$db = "sitogelateria";
// username dell'utente in connessione
    $user = "ice"; //ice

// password dell'utente
    $password = "cream"; //cream


$connessione = new PDO("mysql:host=$host;dbname=$db", $user, $password);



$id=$_GET['id'];


$sql= $connessione->exec(" DELETE FROM certificazione WHERE id_certificazione=".$id);

echo"<br><br> Record: ".$id."  - Eliminato! <br> <a href='certificazione_select.php'>Back </a> " ;