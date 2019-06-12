<?php 

$id = 0;

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  $id = $_SESSION['id'];
}

?>

<header>
  <img src="../public/img/newsbanner.jpeg" alt="header">
</header>
<br>

<?php if ($id == 1) {?>
<form action="<?php echo url_to('/news') ?>" method="post">
  <br>
  <input type="text" name="title" placeholder="Write the title here..." />
  <br><br>
  <textarea name="post_text" rows="4" cols="50" placeholder="Write the post here..."></textarea>
  <br>
  <span name="post_error"></span>
  <br>
  <div class="buttonBox">
    <button type="submit">Submit</button>
  </div>
</form>
<br>
<?php } ?>

<?php
foreach ($news as $row) {

  $time = strtotime($row['uploaded_on']);
?>

<div class="post">
  <h2><b><?php echo htmlspecialchars($row['title']) ?></b></h2>
  <h4><?php echo date('d', $time) . "/" . date('m', $time) . "/" . date('Y', $time)  ?></h4>
  <p><?php echo htmlspecialchars($row['post_text']) ?></p>
</div>
<br>
<?php
}
close_connection($connection);
?>