<script src="<?php echo url_to('/js/add-story.js')?>"></script>

<br>
<form action="<?php echo url_to('/add-story') ?>" method="post" enctype="multipart/form-data">
<input type="file" accept="image/*" id="button2" name="file" onchange="preview_image(event)">
     <br>
     <img id="output_image" />
  <br><br>

    <div class="story_title">
      <label>Title:</label><br>
      <input type="text" name="story_title" value="" maxlength="150">
    </div>
    <br>
    <div class="story_description">
      <label>description:</label><br>
      <textarea type="text" rows="3" name="story_description" value=""></textarea>
    </div>
    <br>
    <input class="button" type="submit" name="submit" value="Add story">
  </form>