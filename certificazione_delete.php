<?php
include("conn.php");

$id=$_GET['id_certificazione'];


$sql= $connessione->exec(" DELETE FROM certificazione WHERE id_certificazione=".$id);

echo"<br><br> Record: ".$id."  - Eliminato! <br> <a href='certificazione_select.php'>Back </a> " ;
?>
