<?php

    require_once("connect.php");

    $imie = $_POST['imie'];

    if($conn->query("DELETE FROM pracownicy WHERE id_pracownicy = '$imie' ") === TRUE){
        echo("Pracownik został usunięty");
    }else{
        echo("Error<br/>".$conn->error);
    }

?>