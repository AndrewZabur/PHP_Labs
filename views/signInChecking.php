<?php
    require_once("configuration/dbConfig.php");
    $login = $_POST['user-login']; 
    $password = $_POST['user-password'];
    $query = "SELECT * FROM users WHERE userName = '$login';";
    $response =  $connection->query($query);
    if ($response->num_rows > 0)
    {
        $rows = $response->fetch_assoc();
        if(password_verify($password, $rows['cryptedPassword'])){
            $_SESSION['id'] = $rows['user_id'];
            $_SESSION['userName'] = $rows['userName'];
            $_SESSION['isAdmin'] = $rows['admin'];
            header('Location: /myapp/index.php?action=main');
        } else{
            header('Location: /myapp/index.php?action=login&error');
        }       
    }
    else{
        header('Location: /myapp/index.php?action=login&error');
    } 
?>