<?php 

  if($profile_info->rowCount() > 0){
    while($row = $profile_info->fetch()){

        $id = $row['id'];
?>
<?php if ($id == $_SESSION['id']) {
     $user_pic = $row["user_pic"];
     $username = htmlspecialchars($row['username']);
     $bio = htmlspecialchars($row['bio']);
     $website = htmlspecialchars($row['website']); 
    
?>

<div class="header_img">
    <!-- Profiel Picture, Username and edit profile button-->
    <div class="header_info">
        <a href="#settings" id="settingsIcon"><i style='font-size:24px' class='fas'>&#xf013;</i></a>

        <img id="prof_pic" src="<?php echo url_to($user_pic) ?>" />
        <br>

        <div id="prof_info">
            <h2><b><?php echo $username ?></b></h2>
        </div>
        <h4></h4>
        <h4></h4>
        <h4></h4>
    </div>
</div>
<div id="bio">
    <h3><?php echo $bio ?></h3>
</div>

<a href="<?php echo $website ?>" target="_blank"><?php echo $website ?></a>

<?php }
}
} ?>
