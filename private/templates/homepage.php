<div class="pageTop">
<div class="topText">
    <h1><b>Discover the status of your favorite writer</b></h1>
    <h3>And check the latest news of Wattpad</h3>
    <button><a href="register">Register now!</a></button>
</div>
</div>

<?php 
session_start();

$pdo = open_connection();

$query = "SELECT * FROM users";

$statement = $pdo->query($query);

foreach ($statement as $row) {
    //Nu kunnen we per rij de voor en achternaam op het scherm printen met echo
    echo $row['id'] . ' ' . $row['username'] . '<br />';
}



?>