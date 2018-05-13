<?php
    require_once('configuration/dbConfig.php');
    $id = (int)$_GET['id'];
    $sql = 'SELECT * FROM shop_goods WHERE goods_id = ' . $id .';';
    $result = $connection->query($sql);
    if ($result->num_rows > 0){
        $rows = $result->fetch_assoc();
    } else {
        header("Location: /myapp/index.php?action=notFound");   
    }
?>

<div class="container">
    <div class="row row-content">
        <div class="col-sm-6">
            <div class="card text-center">
                <h3 class="card-header bg-inverse text-white"><?= $rows['model'] ?></h3>
                <div class="card-block">
                    <dl class="row mb-0">
                        <dt class="col-6">Size</dt>
                        <dd class="col-6"><?= $rows['size'] ?></dd>
                        <dt class="col-6">Firm</dt>
                        <dd class="col-6"><?= $rows['producer_firm'] ?></dd>
                        <dt class="col-6">Price</dt>
                        <dd class="col-6"><?= $rows['price'] ?><i class="fa fa-dollar"></i></dd>
                    </dl>
                </div>
            </div>
            <a href="index.php?action=shop" class="btn btn-inverse mt-4"><i class="fa fa-arrow-left"></i> Back to Shop</a>
        </div>
    </div>
</div>
