<?php 

  if($profile_user_info->rowCount() > 0){
    while($row = $profile_user_info->fetch()){

        if ($username == $row['username']) {
            $user_pic = $row["user_pic"];
            $username = htmlspecialchars($row['username']);
            $bio = htmlspecialchars($row['bio']);
            $website = htmlspecialchars($row['website']);
            $works = htmlspecialchars($row['works']); 
            $reading_list = htmlspecialchars($row['reading_lists']); 
            $followers = htmlspecialchars($row['followers']); 
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
        <div class="counters">
            <h4><?php echo $works ?></h4>
            <h4><?php echo $reading_list ?></h4>
            <h4><?php echo $followers ?></h4>
        </div>
        <br>

        <div class="user_counters">
            <h4>Works</h4>
            <h4>Reading list</h4>
            <h4>Followers</h4>
        </div>
    </div>
</div>
<div id="bio">
    <h3><?php echo $bio ?></h3>
</div>

<a href="<?php echo $website ?>" target="_blank"><?php echo $website ?></a>
<?php 
}
} 
}?>