<div class="container">
    <div class="row row-content">
        <div class="col-12">
            <h3 id="signIn">Authorization</h3>
        </div>
        <?php
              if(array_key_exists('error', $_GET))
              {
                  echo '<div class="col-12 alert alert-danger" role="alert">Incorrect login or password!</div>';
              }
        ?>
        <div class="col-12 col-md-9">
            <form method="post" action="index.php?action=signInChecking">
                <div class="form-group row">
                    <label for="user-login" class="col-md-2 col-form-label">Login</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="user-login" name="user-login" placeholder="Login" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="user-password" class="col-md-2 col-form-label">Password</label>
                    <div class="col-md-10">
                        <input type="password" class="form-control" id="user-password" name="user-password" placeholder="Password">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-md-2 col-md-10">
                        <button type="submit" class="btn btn-success">
                            Sign In
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
