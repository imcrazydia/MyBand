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
<img class="prof_pic" src="<?php echo url_to($user_pic) ?>" width="81" height="auto" />
     <br>
     <a id="changeProfPic" href="<?php echo url_to('/edit-profile') ?>">Change profile picture</a>
     <br><br>

<form action="<?php echo url_to('/edit-profile') ?>" method="post" enctype="multipart/form-data">
       <div class="bio">
         <label>Bio:</label><br>
         <input type="text" name="bio" value="<?php echo $bio ?>" maxlength="150">
       </div>
       <div class="location">
         <label>Location:</label><br>
         <input type="text" name="location" value="<?php echo $location ?>">
       </div>
       <div class="website">
         <label>Website:</label><br>
         <input type="url" name="website" value="<?php echo $website ?>">
       </div>
       <br>
        <input class="button" type="submit" name="submit" value="Upload">
     </form>
<?php } 
} ?>