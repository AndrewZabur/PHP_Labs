<?php
    if(isset($_SESSION['id'])){    
        require_once("configuration/dbConfig.php");
        $id = (int)$_SESSION['id'];
        $newPassword;
        $flag;
        $errors = "";
        
        if($_POST['new-firstName'] == ""){
            $errors .= "emptyFirstName%";
        } else if(!preg_match("/^[A-Z][a-z]{2,}([\-][A-Z][a-z]{2,}|)$/u", $_POST['new-firstName'])){
            $errors .= "incorrectFirstName";
        }
    
        if($_POST['new-lastName'] == ""){
            $errors .= "emptyLastName%";
        } else if(!preg_match("/^[A-Z][a-z]{2,}([\-][A-Z][a-z]{2,}|)$/u", $_POST['new-lastName'])){
            $errors .= "incorrectLastName";
        }   
    
        if($_POST['new-birthDate'] == ""){
            $errors .= "emptyBirthDate%";
        } else if(!preg_match("/^\d{4}[\-]\d{2}[\-]\d{2}$/", $_POST['new-birthDate'])){
            $errors .= "incorrectBirthDate%";
        }  
        
        if($_POST['new-login'] == ""){
            $errors .= "emptyLogin%";
        } else if(!preg_match("/^[\d\w\-]{4,}$/u", $_POST['new-login'])){
            $errors .= "incorrectLogin%";
        } 
    
        // ?= - прогляд вперед
        // (?=.*[a-z]) - маленька буква
        // (?=.*[A-Z]) - велика буква
        // (?=.*\d) - число
        // [a-zA-Z\d] - всі інші букви і цифри
        // {7,} - від 7 і більше
        if($_POST['old-password'] != ""){
            $selectQuery = "SELECT * FROM users WHERE user_id = '$id';";
            $response =  $connection->query($selectQuery);
            if ($response->num_rows > 0){
                $rows = $response->fetch_assoc();
                if(!password_verify($_POST['old-password'], $rows['cryptedPassword'])){
                    $errors .= "wrongOldPassword%";
                } else {
                    if($_POST['new-password'] != ""){
                        $newPassword = $_POST['new-password'];
                        if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{7,}$/", $newPassword)){
                            $errors .= "incorrectNewPassword%";
                        } else if($newPassword == $_POST['new-confirm']){
                            $flag = true;
                        } else{
                            $errors .= "incorrectConfirm%";
                        }
                    } 
                }
            }
        }    
    
        if($_POST['new-email'] == ""){
            $errors .= "emptyEmail%";
        } else if(!preg_match("/^\w+@\w{2,}\.\w{2,}$/", $_POST['new-email'])){
            $errors .= "incorrectEmail%";
        }
    
        if(isset($_POST['skype']) &&  $_POST['skype'] != ""){
            if(!preg_match("/^[\d\w\-.]{5,255}$/", $_POST['skype'])){
                $errors .= "incorrectSkype";
            }
        }

        if($errors == ""){
            $name = $connection->real_escape_string($_POST['new-firstName']); 
            $surname = $connection->real_escape_string($_POST['new-lastName']);
            $birthDate = $connection->real_escape_string($_POST['new-birthDate']); 
            $login = $connection->real_escape_string($_POST['new-login']);
            $email = $connection->real_escape_string($_POST['new-email']);
            $skype = $connection->real_escape_string($_POST['new-skype']);
            $updateQuery = "";
            if(($_POST['old-password'] != "") and ($newPassword != "") and $flag){
                $password = password_hash($newPassword, PASSWORD_BCRYPT);
                $updateQuery = "UPDATE users SET firstName='$name', lastName='$surname', birthDate='$birthDate',
                userName='$login', email='$email', skype='$skype', cryptedPassword='$password' WHERE user_id = '$id';" ;
            } else{
                $updateQuery = "UPDATE users SET firstName='$name', lastName='$surname', birthDate='$birthDate',
                userName='$login', email='$email', skype='$skype' WHERE user_id = '$id';" ;
            }
            $connection->query($updateQuery);
            $connection->close();
            header("Location: index.php?action=editedSuccessProfile");
        } else{
            header("Location: /myapp/index.php?action=editProfile&errors=".$errors);
        }
    } else{
        header("Location: /myapp/index.php?action=notRegistered");
    }
?>