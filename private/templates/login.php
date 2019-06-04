<?php 
//initialize the session
session_start();

open_connection();

//Check if the user is already logged in, if yes then redirect him to welcome page
alreadyLogged();

//Define var and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

//loggin in
login();

?>

<style type="text/css">
    body{ font: 14px sans-serif; }
    .wrapper{ width: 350px; padding: 20px; }
</style>

<body>
    <div class="wrapper">
      <img id="logo" src="../public/img/logo.png" alt="logo" style="width: 110px;">
      <br>
      <h3 id="logoText"><b>WriterStatus</b></h3>
        <h2>Login</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register">Sign up now</a>.</p>
        </form>
    </div>
</body>

<?php 
close_connection($connection);
?>