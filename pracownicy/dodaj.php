<?php

    require_once("connect.php");

    $imie = $_POST['imie'];
    $dzial = $_POST['dzial'];
    $zarobki = $_POST['zarobki'];
    $data_urodzenia = $_POST['data_urodzenia'];

    if($conn->query("INSERT INTO pracownicy (id_pracownicy, imie, dzial, zarobki, data_urodzenia) values(NULL, '$imie', '$dzial', '$zarobki', '$data_urodzenia')") === TRUE){
        echo("Rekord dodany pomyślnie");
    }else{
        echo("Error"."<br/>".$conn->error);
    }

?>