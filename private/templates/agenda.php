<?php 

$id = 0;

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  $id = $_SESSION['id'];
}

?>

<header>
  <img src="../public/img/agenda-banner.jpg" alt="header">
</header>
<br>

<?php if ($id == 1) {?>
<form action="<?php echo url_to('/agenda') ?>" method="POST">
<br>
<input type="text" name="title" placeholder="Write the title here..." />
<br><br>
<input type="text" name="datum" placeholder="Example: '11-6-19 until 12-6-19'" />
<br><br>
<textarea name="details" rows="4" cols="50" placeholder="Write the details here..."></textarea>
<br>
<div class="buttonBox">
<button type="submit">Submit</button>
</div>
</form>
<br>
<?php } ?>

<?php
foreach ($events as $row) {
?>

<div class="post">
  <h2><b><?php echo htmlspecialchars($row['title']) ?></b></h2>
  <h4><?php echo htmlspecialchars($row['datum'])  ?></h4>
  <p><?php echo htmlspecialchars($row['details']) ?></p>
</div>
<br>
<?php
}
?>