<?php
    $errors = "";
    
    if($_POST['firstName'] == ""){
        $errors .= "emptyFirstName%";
    } else if(!preg_match("/^[A-Z][a-z]{2,}([\-][A-Z][a-z]{2,}|)$/u", $_POST['firstName'])){
        $errors .= "incorrectFirstName";
    }

    if($_POST['lastName'] == ""){
        $errors .= "emptyLastName%";
    } else if(!preg_match("/^[A-Z][a-z]{2,}([\-][A-Z][a-z]{2,}|)$/u", $_POST['lastName'])){
        $errors .= "incorrectLastName";
    }   

    if($_POST['birthDate'] == ""){
        $errors .= "emptyBirthDate%";
    } else if(!preg_match("/^\d{4}[\-]\d{2}[\-]\d{2}$/", $_POST['birthDate'])){
        $errors .= "incorrectBirthDate%";
    }  
    
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
        $name = $_POST['firstName'];
        $surname = $_POST['lastName'];
        $birth = $_POST['birthDate'];
        $login = $_POST['login']; 
        $password = password_hash( $_POST['password'], PASSWORD_BCRYPT);
        $email =  $_POST['emailid'];
        $skype = $_POST['skype'];

        $query = "INSERT INTO users (firstName, lastName, birthDate, userName, cryptedPassword, email, skype) VALUES 
        ('$name', '$surname', '$birth','$login', '$password', '$email', '$skype')";
        $connection->query($query);
        $connection->close();
        header("Location: /myapp/index.php?action=passedValidation");
    } else{
        header("Location: /myapp/index.php?action=registration&errors=".$errors);
    }
    
?>