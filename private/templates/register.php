<?php

$default_pic = "/img/default.png";

?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>

<body>
    <div class="wrapper">
      <img id="logo" src="<?php echo url_to('/img/logo.png'); ?>" alt="logo" style="width: 110px;">
      <br>
      <h3 id="logoText"><b>Social Direct Messages</b></h3>
        <h2>Sign Up</h2>
        <?php if (!empty($_GET['error'])) {
            echo $_GET['error'];
        } ?>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo url_to('/register') ?>" method="post">
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="">
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="<?php echo url_to('/login') ?>">Login here</a>.</p>
        </form>
    </div>


<?php 
close_connection($connection);
?>