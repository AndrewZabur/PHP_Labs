<?php 
    function formProduct($id, $size, $model, $price, $producer)
    {
?>
    <div class="col col-sm-4 mt-5">
        <div class="card">
            <h3 class="card-header bg-inverse text-white"><?= $model ?></h3>
            <div class="card-block pb-0">
                <dl class="row">
                    <dt class="col-6">Size</dt>
                    <dd class="col-6"><?= $size ?></dd>
                    <dt class="col-6">Firm</dt>
                    <dd class="col-6"><?= $producer ?></dd>
                    <dt class="col-6">Price</dt>
                    <dd class="col-6"><?= $price ?><i class="fa fa-dollar"></i></dd>
                </dl>
            </div>
            <div class="card-footer">
                <?php
                    if (isset($_SESSION["id"]) and $_SESSION['isAdmin'])
                    {
                        echo '<a href="index.php?action=editProduct&id='.$id.'" class="btn btn-success mr-3">Update</a>';
                        echo '<a href="javascript: isSure('.$id.')" class="btn btn-danger ml-1 mr-3">Delete</a>';
                    }
                ?>   
                <a href="index.php?action=viewProduct&id=<?= $id ?>" class="btn btn-primary">More</a>
            </div>
        </div>
    </div>      
<?php
    }
?>