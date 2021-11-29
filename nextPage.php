<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
</head>
<?php include('header.php'); ?>
<?php include('koneksi.php'); ?>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">

<body>
    <?php
        //isset($_POST['name']);

        if(empty($_POST)){
            ?><h1>Access Denied...</h1><?php
        }
        else
        {
            $name           = $_POST['name'];
            $username       = $_POST['username'];
            $tanggalLahir   = $_POST['tanggalLahir'];
            $email          = $_POST['email'];
            $password       = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $level          = $_POST['level'];

            $sql = "INSERT INTO Member (name, username, email, tanggalLahir, level, password, isActive)
            VALUES ('$username', '$name', '$email', '$tanggalLahir', $level, '$password', 1)";
        
        if ($db->query($sql) === TRUE) {
            include('selamat.php');
        } else {
            $message="Error" . $db->error;
        }
            $db->close();
        }
    ?>
    <div class="row form-group">
        <div class="col-md-2 text-md-right">
    </div>
    <!-- <div class="col-md-4">
        <span class="label"><?php echo $message;?></span>
    </div> -->
    </div>
</div>
</body>
</html>