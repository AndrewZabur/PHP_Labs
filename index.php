<?php
    session_start();
    if($_SERVER['REQUEST_METHOD'] == "GET"){
        require_once('./layout/header.php');
        require_once('./layout/navbar.php');
    }
    
    
    if(array_key_exists('action', $_GET) && file_exists('./views/'.$_GET['action'].'.php')){
        require_once('./views/'.$_GET['action'].'.php');
    } else {
        require_once('./views/main.php');
    }
   

    if($_SERVER['REQUEST_METHOD'] == "GET"){
        require_once('./layout/footer.php');
    }  
?>    
