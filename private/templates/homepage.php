<?php 

$showButton = 1;

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    $showButton = 0;
  }

?>

<div class="pageTop">
<div class="topText">
    <h1><b>Discover the status of your favorite writer</b></h1>
    <h3>And check the latest news of Wattpad</h3>
    <?php if ($showButton == 0) {?>
  <p><?php  echo "Welcome" . ' ' . $_SESSION['username']; ?></p>
      <?php } ?>
    <?php if ($showButton == 1) {?>
      <button><a href="<?php echo url_to('/register'); ?>">Register now!</a></button>
    <?php } else if ($showButton == 0) { ?>
      <button><a href="<?php echo url_to('/logout'); ?>">Logout</a></button>
      <?php } ?>
</div>
</div>
<br>

<?php 
$query = "SELECT * FROM news ORDER BY uploaded_on DESC LIMIT 1";

$statement = $pdo->query($query);

foreach ($statement as $row) {

  $time = strtotime($row['uploaded_on']);

?>

<div class="post_title">
    <h1><b>Latest news</b></h1>
 <div class="post">
  <h2><?php echo htmlspecialchars($row['title']) ?></h2>
  <h4><?php echo date('d', $time) . "/" . date('m', $time) . "/" . date('Y', $time)  ?></h4>
  <p><?php echo htmlspecialchars($row['post_text']) ?></p>
 </div>
</div>
<?php
  }
?>

<br>


<div class="post_title">
    <h1 id="recommended"><b>Recommended Users</b></h1>
<?php 
  $query = "SELECT * FROM users ORDER BY id DESC LIMIT 2";

  $statement = $pdo->query($query);

  foreach ($statement as $row) {
?>
 <div class="post post_writers">
  <img src="<?php echo ($row['user_pic']) ?>" alt="profile picture">
  <br>
  <h2 class="writer_name"><?php echo ($row['username']) ?></h2>
 </div>
<?php
  }
?>
</div>
