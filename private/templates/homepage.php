<div class="pageTop">
<div class="topText">
    <h1><b>Discover the status of your favorite writer</b></h1>
    <h3>And check the latest news of Wattpad</h3>
    <button><a href="register">Register now!</a></button>
</div>
</div>

<?php 
session_start();

open_connection();

$query = $pdo->query("SELECT * FROM users");

?>