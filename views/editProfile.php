<?php
    require_once('configuration/dbConfig.php');
    $id = (int)$_SESSION['id'];
    $sql = 'SELECT * FROM users WHERE user_id = ' . $id .';';
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
            <h3>Edit Profile</h3>
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
                 if(in_array('wrongOldPassword', $errors)){
                     echo "<p>You entered current password incorrectly!</p>";
                 } else if(in_array('incorrectNewPassword', $errors)){
                     echo "<p>Password must contain at least one uppercase character, one lowercase character and one digit!!!</p>";
                 } else if(in_array('incorrectConfirm', $errors)){
                     echo "<p>New password and confirmed password are different!</p>";
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
            <form method="post" action="index.php?action=checkEditedProfile">
            <div class="form-group row">
                    <label for="new-firstName" class="col-md-2 col-form-label">First Name</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="new-firstName" placeholder="First Name" autocomplete="off" value="<?= $rows['firstName'] ?>"> 
                    </div>
                </div>
                <div class="form-group row">
                    <label for="new-lastName" class="col-md-2 col-form-label">Last Name</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="new-lastName" placeholder="Last Name" autocomplete="off" value="<?= $rows['lastName'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="new-birthDate" class="col-md-2 col-form-label">Date of Birth</label>
                    <div class="col-md-10">
                        <input type="date" class="form-control" name="new-birthDate" placeholder="Date of Birth" value="<?= $rows['birthDate'] ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="new-login" class="col-md-2 col-form-label">Login</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="new-login" placeholder="Login" autocomplete="off" value="<?= $rows['userName'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="old-password" class="col-md-2 col-form-label">Old Password</label>
                    <div class="col-md-10">
                        <input type="password" class="form-control" id="old-password" name="old-password" placeholder="Old Password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="new-password" class="col-md-2 col-form-label">New Password</label>
                    <div class="col-md-10">
                        <input type="password" class="form-control" id="new-password" name="new-password" placeholder="New password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="new-confirm" class="col-md-2 col-form-label">Confirm</label>
                    <div class="col-md-10">
                        <input type="password" class="form-control" id="new-confirm" name="new-confirm" placeholder="Confirm password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="new-email" class="col-md-2 col-form-label">Email</label>
                    <div class="col-md-10">
                        <input type="email" class="form-control" name="new-email" placeholder="Email" value="<?= $rows['email'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="new-skype" class="col-md-2 col-form-label">Skype</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="new-skype" placeholder="Skype" value="<?= $rows['skype'] ?>">
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
