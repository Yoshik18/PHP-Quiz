<?php 
    session_start();
    if(!isset($_SESSION['user'])){
        header("Location: index.php");
     }
    if(isset($_GET['logout']))
    {
        session_destroy();
        header("Location: index.php");
    }
 
?>