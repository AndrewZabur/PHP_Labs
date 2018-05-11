<div class="container">
    <div class="row row-content">
        <div class="col-12">
            <h3 id="registrationName">New Product</h3>
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
            <form method="post" enctype="multipart/form-data" action="index.php?action=checkNewProduct">
                <div class="form-group row">
                    <label for="size" class="col-md-2 col-form-label">Size</label>
                    <div class="col-md-10">
                        <input type="number" class="form-control" id="size" name="size" placeholder="Size" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="model" class="col-md-2 col-form-label">Model</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="model" name="model" placeholder="Model">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="producer" class="col-md-2 col-form-label">Producer Firm</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="producer" name="producer" placeholder="Producer firm">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-md-2 col-form-label">Price</label>
                    <div class="col-md-10">
                        <input type="number" class="form-control" id="price" name="price" placeholder="Price">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-md-2 col-md-10">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
