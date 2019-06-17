<?php 

//Check if the user is already logged in, if yes then redirect him to welcome page
alreadyLogged();

?>

<style type="text/css">
    body{ font: 14px sans-serif; }
    .wrapper{ width: 350px; padding: 20px; }
</style>


    <div class="wrapper">
      <img id="logo" src="../public/img/logo.PNG" alt="logo" style="width: 110px;">
      <br>
      <h3 id="logoText"><b>WriterStatus</b></h3>
        <h2>Login</h2>
        <?php if (!empty($_GET['error'])) {
            echo $_GET['error'];
        } ?>
        <form action="<?php echo url_to('/login') ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register">Sign up now</a>.</p>
        </form>
    </div>


<?php 
close_connection($connection);
?>