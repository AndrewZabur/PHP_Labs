<?php
    if(!$_SESSION['isAdmin']){
        header("Location: /myapp/index.php?action=notAdmin");
    }
    require_once('configuration/dbConfig.php');
    $id = (int)$_GET['id'];
    $sql = 'SELECT * FROM shop_goods WHERE goods_id = ' . $id .';';
    $result = $connection->query($sql);
    if ($result->num_rows > 0)
    {
        $rows = $result->fetch_assoc();
    } else {
        header("Location: /myapp/index.php?action=notFound");   
    }
?>
<div class="container">
    <div class="row row-content">
        <div class="col-12">
            <h3 id="editProduct">Edit Product</h3>
        </div>
         <?php
            $errors = [];
            if(array_key_exists('errors', $_GET)){
                $errors = explode('%', $_GET['errors']);
                echo "<div class='col-12 alert alert-danger'>";     
                if(in_array('emptySize', $errors)){
                    echo "<p>You must specify size to add the product!</p>";    
                } else if (in_array('incorrectSize', $errors)){
                    echo "Size must contain only numbers!";
                }
                if(in_array('emptyModel', $errors)){
                    echo "<p>You must specify model to add the product!</p>";
                } else if(in_array('incorrectModel', $errors)){
                    echo "<p>Model must contain at least 3 characters!</p>";
                }
                if(in_array('emptyProducer', $errors)){
                    echo "<p>Producer of the product must be specified!</p>";
                } else if(in_array('incorrectProducer', $errors)){
                    echo "<p>Producer`s name must contain at least 3 characters!</p>";
                }
                if(in_array('emptyPrice', $errors)){
                    echo "<p>Price must be specified!</p>";
                } else if(in_array('incorrectPrice', $errors)){
                    echo "<p>Price must contain only numbers!!</p>";
                }
                echo "</div>";
            }
        ?> 
        <div class="col-12 col-md-9">
            <form method="post" action="index.php?action=checkEditedProduct&id=<?= $id ?>">
                <div class="form-group row">
                    <label for="new-size" class="col-md-2 col-form-label">Size</label>
                    <div class="col-md-10">
                        <input type="number" class="form-control" id="new-size" name="new-size" placeholder="Size" autocomplete="off" value="<?= $rows['size'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="new-model" class="col-md-2 col-form-label">Model</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="new-model" name="new-model" placeholder="Model" value="<?= $rows['model'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="new-producer" class="col-md-2 col-form-label">Producer Firm</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="new-producer" name="new-producer" placeholder="Producer firm" value="<?= $rows['producer_firm'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="new-price" class="col-md-2 col-form-label">Price</label>
                    <div class="col-md-10">
                        <input type="number" class="form-control" id="new-price" name="new-price" placeholder="Price" value="<?= $rows['price'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="visible" class="col-md-2 col-form-label">Visible</label>
                    <div class="col-md-10">
                        <input class="mt-2" <?php if ($rows['visible']) { echo "checked"; } ?> type="checkbox" id="visible" name="visible" value="1">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="offset-md-2 col-md-10">
                        <button type="submit" class="btn btn-primary">
                            Edit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
