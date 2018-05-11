<?php
    require_once('configuration/dbConfig.php');
    if(isset($_SESSION['id']) and $_SESSION['isAdmin']){
        $id = (int)$_GET['id'];
        $sel = 'SELECT * FROM shop_goods WHERE goods_id = ' . $id .';';
        $result = $connection->query($sel);
        
        if ($result->num_rows == 0){
            header("Location: /myapp/index.php?action=notFound");
        } else{
            $sql = 'DELETE FROM shop_goods WHERE goods_id = ' . $id .';';
            $result = $connection->query($sql);
            header("Location: /myapp/index.php?action=successDelete");
        } 
    } else{
        header("Location: /myapp/index.php?action=notAdmin");
    }
?>