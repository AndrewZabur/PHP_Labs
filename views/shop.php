<div class="container text-center">
    <div class="row row-content">
<?php 
    require_once('views/formShop.php');
    require_once('configuration/dbConfig.php');
    $sql = 'SELECT * FROM shop_goods ORDER BY date DESC';
    $result = $connection->query($sql);
    if ($result->num_rows > 0)
    {
        while ($rows = $result->fetch_assoc())
        {
            if ($rows['visible'])
            {
                formProduct($rows['goods_id'], $rows['size'], $rows['model'], $rows['price'], $rows['producer_firm']);
            }
        }
    }
?>
    </div>
</div>
