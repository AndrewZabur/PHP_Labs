<?php
    require_once('configuration/dbConfig.php');
    $id = (int)$_SESSION['id'];
    $sql = 'SELECT * FROM users WHERE user_id = ' . $id .';';
    $result = $connection->query($sql);
    if ($result->num_rows > 0){
        $rows = $result->fetch_assoc();
    } else {
        header("Location: /myapp/index.php?action=notFound");   
    }
?>

<div class="container">
    <div class="row row-content">
        <div class="col-sm-10 offset-1 mt-5">
            <div class="card text-center">
                <h3 class="card-header bg-inverse text-white"><?php echo $rows["firstName"]." ".$rows["lastName"]; ?></h3>
                <div class="card-block pb-0">
                    <dl class="row mb-0">
                        <dt class="col-6">User Name</dt>
                        <dd class="col-6"><?= $rows['userName'] ?></dd>
                        <dt class="col-6">Date of Birth</dt>
                        <dd class="col-6"><?= $rows['birthDate'] ?></dd>
                        <dt class="col-6">Email</dt>
                        <dd class="col-6"><?= $rows['email'] ?></dd>
                        <dt class="col-6">Skype</dt>
                        <dd class="col-6"><?= $rows['skype'] ?></dd>
                    </dl>
                </div>
                <div class="card-footer pt-0">
                    <a href="index.php?action=editProfile" class="btn btn-info mt-4">Edit profile</a>
                </div>
            </div>
        <a href="index.php?action=main" class="btn btn-inverse mt-4"><i class="fa fa-arrow-left"></i> Back to Main Page</a>
        </div>
    </div>
</div>
