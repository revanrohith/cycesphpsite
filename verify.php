<?php
require_once "configurator.php";
if (!isset($_SESSION['email'])){
    header('location: login.php');
}
$email = $_SESSION['email'];
$check_email = "SELECT * FROM usertable WHERE email = '$email'";
$res = mysqli_query($con, $check_email);
$fetch = mysqli_fetch_assoc($res);
$status = $fetch['status'];
if($status == 'verified'){
    $_SESSION['email'] = $email;
    header('location: dashboard.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $stringfetch['code_verif'];?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="verify.php" method="POST" autocomplete="off">
                    <h2 class="text-center">
                    <?php echo $stringfetch['code_verif'];?></h2>
<?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                        </div>
<?php
                    }
                    ?>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
<?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="number" name="otp" placeholder="<?php echo $stringfetch['enter_verif_code'];?>" required>
                    </div>
<div class="form-group">
                        <button class="form-control button" type="submit" name="check" value="Submit"><?php echo $stringfetch['submit'];?></button>
                    </div>
</form>
</div>
</div>
</div>
</body>
</html>

