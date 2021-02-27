<?php

    require_once("connect.php");

    $title = $_POST['title'];

    if($conn->query("DELETE FROM biblioteka WHERE id='$title'") === TRUE){
        echo("Książka została usunięta");
    }else{
        echo("Error: ".$conn->error);
    }

?>