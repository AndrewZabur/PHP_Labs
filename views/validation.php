<?php
    $errors = "";
    
    if($_POST['login'] == ""){
        $errors .= "emptyLogin%";
    } else if(!preg_match("/^[\d\w\-]{4,}$/u", $_POST['login'])){
        $errors .= "incorrectLogin%";
    } 

    // ?= - прогляд вперед
    // (?=.*[a-z]) - маленька буква
    // (?=.*[A-Z]) - велика буква
    // (?=.*\d) - число
    // [a-zA-Z\d] - всі інші букви і цифри
    // {7,} - від 7 і більше

    if($_POST['password'] == ""){
        $errors .= "emptyPassword%";
    } else if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{7,}$/", $_POST['password'])){
        $errors .= "incorrectPassword%";
    } 

    if($_POST['confirm'] == ""){
        $errors .= "emptyConfirm%";
    } else if(!($_POST['password'] == $_POST['confirm'])){
        $errors .= "incorrectConfirm%";
    } 

    if($_POST['emailid'] == ""){
        $errors .= "emptyEmail%";
    } else if(!preg_match("/^\w+@\w{2,}\.\w{2,}$/", $_POST['emailid'])){
        $errors .= "incorrectEmail%";
    }

    if(isset($_POST['skype']) &&  $_POST['skype'] != ""){
        if(!preg_match("/^[\d\w\-.]{5,255}$/", $_POST['skype'])){
            $errors .= "incorrectSkype";
        }
    }

    
    if($errors == ""){
        require_once("configuration/dbConfig.php");
        $login = $_POST['login']; 
        $password = password_hash( $_POST['password'], PASSWORD_BCRYPT);
        $email =  $_POST['emailid'];
        $skype = $_POST['skype'];

        $query = "INSERT INTO users (userName, cryptedPassword, email, skype) VALUES 
        ('$login', '$password', '$email', '$skype')";
        $connection->query($query);
        $connection->close();
        header("Location: /myapp/index.php?action=passedValidation");
    } else{
        header("Location: /myapp/index.php?action=registration&errors=".$errors);
    }
    
?>