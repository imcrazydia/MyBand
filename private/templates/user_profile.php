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
            $location = htmlspecialchars($row['location']); 
            $created_on = htmlspecialchars($row['created_on']); 

            $time = strtotime($created_on);

           
?>


<div class="header_img">
    <!-- Profiel Picture, Username and edit profile button-->
    <div class="header_info">

        <img id="prof_pic" src="<?php echo url_to("/" . $user_pic) ?>" />
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
        <br>
    </div>
</div>
<div id="bio_box">
<div id="bio">
    <h4><?php echo $bio ?></h4>
    <br>

    <h5><i style='font-size:15px; margin-right: 5px;' class='fas'>&#xf3c5;</i><?php echo $location ?></h5>
    <h5>Member since: <?php echo date('d', $time) . "/" . date('m', $time) . "/" . date('Y', $time)  ?></h5>
    <br>

    <?php if (empty($website)) { ?>
    <a href="<?php echo $website ?>" target="_blank"><?php echo $website ?></a>
    <?php } else { ?>
        <i style='font-size:20px; margin-right: 5px; color:#009973; ' class='fas'>&#xf0ac;</i>
        <a href="<?php echo $website ?>" target="_blank"><?php echo $website ?></a>
        <?php } ?> 
</div>
</div>
<div class="story">
    <h3>Stories of <?php echo $username ?></h3>
<?php 

        foreach ($stories as $row) {
            if ($row['story_user'] == $username){
?>
 <div class="story_content">
<img id="story_cover" src="<?php echo url_to("/" . $row['story_cover']) ?>" alt="story_cover">
<div class="content">
<h4 id="title"><?php echo $row['story_title'] ?></h4>
<textarea readonly id="description" maxlength="50" rows="3" style="overflow: hidden"><?php echo $row['story_description'] ?></textarea>
 </div>
 </div>
 <br>

  
<?php
}
  }
?>

<?php }
}
}
 ?>