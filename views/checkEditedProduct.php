<?php
    if($_SESSION['isAdmin'] and isset($_SESSION['id'])){    
        $errors = "";
        
        if($_POST['new-size'] == ""){
            $errors .= "emptySize%";
        } else if(!preg_match("/^\d{2,}$/", $_POST['new-size'])){
            $errors .= "sizeMustBeANumber%";
        } 
    
        if($_POST['new-model'] == ""){
            $errors .= "emptyModel%";
        } else if(!preg_match("/^\w{3,}$/", $_POST['new-model'])){
            $errors .= "incorrectModel%";
        }

        if($_POST['new-producer'] == ""){
            $errors .= "emptyProducer%";
        } else if(!preg_match("/^\w{3,}$/", $_POST['new-producer'])){
            $errors .= "incorrectProducer";
        }

        if($_POST['new-price'] == ""){
            $errors .= "emptyPrice%";
        } else if(!preg_match("/^\d{1,}$/", $_POST['new-price'])){
            $errors .= "priceMustBeANumber%";
        }

        $id = (int)$_GET['id'];
        
        if($errors == ""){
            require_once("configuration/dbConfig.php");
            $visible = $connection->real_escape_string($_POST['visible']) ; 
            $user = $_SESSION['id'];
            $size = $connection->real_escape_string($_POST['new-size']); 
            $model = $connection->real_escape_string($_POST['new-model']);
            $producer = $connection->real_escape_string($_POST['new-producer']);
            $price = $connection->real_escape_string($_POST['new-price']);
            
            $query = "UPDATE shop_goods SET visible='$visible', user_id='$user', size='$size', model='$model', producer_firm='$producer', price='$price' 
            WHERE goods_id = '$id';" ;
            $connection->query($query);
            $connection->close();
            header("Location: index.php?action=editedSuccessfully");
        } else{
            header("Location: /myapp/index.php?action=editProduct&id=".$id."&errors=".$errors);
        }
    } else{
        header("Location: /myapp/index.php?action=notAdmin");
    }
?>