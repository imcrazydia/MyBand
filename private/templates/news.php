<header>
    <img src="../public/img/newsbanner.jpeg" alt="header">
</header>
<br>

<form action="../private/upload_post.php" method="POST">
<br>
<input type="text" name="title" placeholder="Write the title here..." />
<br><br>
<textarea name="post_text" rows="4" cols="50" placeholder="Write the post here..."></textarea>
<br>
<div class="buttonBox">
<button type="submit">Submit</button>
</div>
</form>
<br>

<?php
session_start();

$pdo = open_connection();

$query = "SELECT * FROM news ORDER BY uploaded_on DESC";

$statement = $pdo->query($query);

foreach ($statement as $row) {

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
?>
 