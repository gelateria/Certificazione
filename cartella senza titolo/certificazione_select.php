
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
<h1> Certificazioni Conseguite </h1>

<p> Inserisci Certificazione:   <a href="certificazione_insert.php"> INSERT </a> </p>

    <table> <!-- Nomi campi tabella  indicizzabili con GET -->
        <td><a href="certificazione_select.php?order=id" > IDcert </a></td>
        <td> <a href="certificazione_select.php?order_c=certificazione" > Certificazione </a></td >
        <td class="td"> Descrizione </td>
        <td> <a href="certificazione_select.php?order_data=data" > Data </a> </td>
        <td class="td">  Logo  </td>
        <td class="td"> ACTION </td>
    </tr>


  <?php

//http://localhost:8888/sito/gelateria/certificazione.php

// nome di host
$host = "localhost"; //localhost

// nome del database
$db = "sitogelateria"; //gelateria

  // username dell'utente in connessione
    $user = "ice"; //ice

// password dell'utente
    $password = "cream"; //cream


$connessione = new PDO("mysql:host=$host; dbname=$db", $user, $password);

       //query  per ordinare la tabella

    If(
        (isset($_GET['order']) and $sql=('SELECT * FROM certificazione ORDER BY nome_certificazione'))
        or (isset($_GET['order_c']) and  $sql=('SELECT * FROM certificazione ORDER BY id_certificazione'))
        or (isset($_GET['order_data']) and $sql=('SELECT * FROM certificazione ORDER BY data_certificazione'))
        or (empty($_GET) and $sql=('SELECT * FROM certificazione'))
    ) {

        foreach (($connessione->query($sql)) as $row) {

            //stampa tutto il DB riga per riga
            echo '<td>' . $row['id_certificazione'] . '</td><td>' . $row['nome_certificazione'] . '</td><td>' . $row['descrizione_certificazione'] . '</td><td> ' . $row['data_certificazione'] . '</td><td> ' . $row['logo_certificazione'] . '</td>';

            // LINK update_form.php
            echo '<td><a href="certificazione_update.php?id=' . $row['id_certificazione'] . '&nome_certificazione=' . $row['nome_certificazione'] . '&data_certificazione=' . $row['data_certificazione'] . '&descrizione_certificazione=' . $row['descrizione_certificazione'] .'&logo_certificazione=' . $row['logo_certificazione'] . '">UPDATE</a> or ';

            // LINK delete_form.php
            echo '<a href="certificazione_delete.php?id_certificazione=' . $row['id_certificazione'] . '"> DELETE</a></td></tr> ';
        }
    }
  ?>
    </table></body></html>