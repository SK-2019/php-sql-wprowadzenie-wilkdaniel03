<?php

    $id = $_POST['id'];
    
    require_once("connect.php");

    if($conn -> query("DELETE FROM pracownicy WHERE id_pracownicy = '$id'") === TRUE){
        echo("Pracownicy został usunięty pomyślnie");
    }

?>