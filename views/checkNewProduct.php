<?php
    $errors = "";
    
    if($_POST['size'] == ""){
        $errors .= "emptySize%";
    } else if(!preg_match("/^\d{2,}$/", $_POST['size'])){
        $errors .= "sizeMustBeANumber%";
    } 
 
    if($_POST['model'] == ""){
        $errors .= "emptyModel%";
    } else if(!preg_match("/^\w{3,}$/", $_POST['model'])){
        $errors .= "incorrectModel%";
    }

    if($_POST['producer'] == ""){
        $errors .= "emptyProducer%";
    } else if(!preg_match("/^\w{3,}$/", $_POST['producer'])){
        $errors .= "incorrectProducer";
    }

    if($_POST['price'] == ""){
        $errors .= "emptyPrice%";
    } else if(!preg_match("/^\d{1,}$/", $_POST['price'])){
        $errors .= "priceMustBeANumber%";
    }

    
    if($errors == ""){
        require_once("configuration/dbConfig.php");
        $isAdmin = $_SESSION['isAdmin'] == 1 ? 1 : 0; 
        $user = $_SESSION['id'];
        $size = $_POST['size']; 
        $model = $_POST['model'];
        $producer =  $_POST['producer'];
        $price = $_POST['price'];
        
        $query = "INSERT INTO shop_goods (visible, user_id, size,  model, producer_firm, price) VALUES 
        ('$isAdmin', '$user', '$size', '$model', '$producer', '$price')";
        $connection->query($query);
        $connection->close();
        header("Location: index.php?action=createdSuccessfully");
    } else{
        header("Location: /myapp/index.php?action=createProduct&errors=".$errors);
    }
    
?>