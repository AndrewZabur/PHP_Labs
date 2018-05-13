<div class="container">
    <div class="row row-content">
        <div class="col-12">
            <h3 id="registrationName">Registration</h3>
        </div>
        <?php
            $errors = [];
            if(array_key_exists('errors', $_GET)){
                $errors = explode('%', $_GET['errors']);
                echo "<div class='col-12 alert alert-danger'>"; 
                if(in_array('emptyFirstName', $errors)){
                    echo "<p>Name must contain at least 2 characters!</p>";
                } else if(in_array('incorrectFirstName', $errors)){
                    echo "<p>Name can contain only latin or cyrillic letters and - sign!</p>";
                }
                if(in_array('emptyLastName', $errors)){
                    echo "<p>Surname must contain at least 2 characters!</p>";
                } else if(in_array('incorrectFirstName', $errors)){
                    echo "<p>Surname can contain only latin or cyrillic letters and - sign!</p>";
                }
                if(in_array('emptyBirthDate', $errors)){
                    echo "<p>Date of birth is obvious field!</p>";
                } else if(in_array('incorrectBirthDate', $errors)){
                    echo "<p>Enter the date in dd.mm.yyyy format!</p>";
                }
                if(in_array('emptyLogin', $errors)){
                    echo "<p>Login must contain at least 4 characters!</p>";    
                } else if (in_array('incorrectLogin', $errors)){
                    echo "<p>Login can contain only latin or cyrillic letters, numbers, - or _ signs!!!</p>";
                }
                if(in_array('emptyPassword', $errors)){
                    echo "<p>Password must contain at least 7 characters!</p>";
                } else if(in_array('incorrectPassword', $errors)){
                    echo "<p>Password must contain at least one uppercase character, one lowercase character and one digit!!!</p>";
                }
                if(in_array('emptyConfirm', $errors)){
                    echo "<p>Confirm your password!</p>";
                } else if(in_array('incorrectConfirm', $errors)){
                    echo "<p>Your passwords must be equal!!!</p>";
                }
                if(in_array('emptyEmail', $errors)){
                    echo "<p>Email field is required!</p>";
                } else if(in_array('incorrectEmail', $errors)){
                    echo "<p>Enter the correct email address!!!</p>";
                }
                if(in_array('incorrectSkype', $errors)){
                    echo "<p>Enter correct skype username please!</p>";
                }
                echo "</div>";
            }
        ?>
        <div class="col-12 col-md-9">
            <form method="post" action="index.php?action=validation">
                <div class="form-group row">
                    <label for="firstName" class="col-md-2 col-form-label">First Name</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lastName" class="col-md-2 col-form-label">Last Name</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="birthDate" class="col-md-2 col-form-label">Date of Birth</label>
                    <div class="col-md-10">
                        <input type="date" class="form-control" id="birthDate" name="birthDate" placeholder="Date of Birth">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="login" class="col-md-2 col-form-label">Login</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="login" name="login" placeholder="Login" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-2 col-form-label">Password</label>
                    <div class="col-md-10">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="confirm" class="col-md-2 col-form-label">Confirm</label>
                    <div class="col-md-10">
                        <input type="password" class="form-control" id="confirm" name="confirm" placeholder="Confirm password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="emailid" class="col-md-2 col-form-label">Email</label>
                    <div class="col-md-10">
                        <input type="email" class="form-control" id="emailid" name="emailid" placeholder="Email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="skype" class="col-md-2 col-form-label">Skype</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="skype" name="skype" placeholder="Skype">
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
