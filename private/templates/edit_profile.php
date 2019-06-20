<?php 
while($row = $profile_edit->fetch()){

    $id = $row['id'];

  if ($id == $_SESSION['id']) {
    $user_pic = $row["user_pic"];
    $bio = htmlspecialchars($row['bio']);
    $location = htmlspecialchars($row['location']); 
    $website = htmlspecialchars($row['website']);
?>

<body>
  <br>
  <form action="<?php echo url_to('/edit-profile') ?>" method="post" enctype="multipart/form-data">
    <img class="prof_pic" src="<?php echo url_to("/" . $user_pic) ?>" width="81" height="auto" />
    <br>
    <input type="file" accept="image/*" id="button2" name="file" >
  <br><br>

    <div class="bio">
      <label>Bio:</label><br>
      <input type="text" name="bio" value="<?php echo $bio ?>" maxlength="150">
    </div>
    <br>
    <div class="location">
      <label>Location:</label><br>
      <input type="text" name="location" value="<?php echo $location ?>">
    </div>
    <br>
    <div class="website">
      <label>Website:</label><br>
      <input type="url" name="website" value="<?php echo $website ?>">
    </div>
    <br>
    <input class="button" type="submit" name="submit" value="Save Changes">
  </form>
  <?php } 
} ?>