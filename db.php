<?php
    //DB Credentials
    $db_host = "localhost";
    $db_name = "quiz";
    $db_user = "root";
    $db_pass = "";

    //Connect to db
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    //Check For Error
    if($conn -> connect_error){
        printf("Connection Failed %s", $conn -> connect_err);
        exit();
    }

?>