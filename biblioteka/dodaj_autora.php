<?php

    require_once("connect.php");

    $title = $_POST['book'];
    $author = $_POST['author'];

    if($conn->query("INSERT INTO biblioteka (id, tytul, autor) values(NULL, '$title', '$author')") === TRUE){
        echo("Książka została dodana do biblioteki.");
    }else{
        echo("Error: ".$conn->error);
    }

?>