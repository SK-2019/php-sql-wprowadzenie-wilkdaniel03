<?php

    $server = "mysql-wilkdaniel2003.alwaysdata.net";
    $user = "227825";
    $password = "Bazadanych321";
    $db = "wilkdaniel2003_phpsql";

    $conn = new mysqli($server, $user, $password, $db);
    if($conn->connect_error){
        die("Connection Failed: ".mysqli_connect_error());
    }

?>
