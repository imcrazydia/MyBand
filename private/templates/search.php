<div class="search-bar">
  <form action="<?php echo url_to('/search'); ?>" method="GET">
    <input type="hidden" name="page" value="search" />
    <input type="text" name="term" value="<?php if (isset($searchterm)): echo $searchterm; endif; ?>"
      placeholder="Vul de zoekopdracht in" />
    <button type="submit">Zoek</button>
  </form>

  <h1>Search results</h1>
  <?php if (!empty($searchterm)) { ?>
  <p>Er zijn <?php echo count($searchresults) ?> zoekresultaten voor "<?php echo $searchterm ?>"</p>
  <br>
  <div class="results">
  <div class="story_results">
      <div class="story_title">
        <h2>Stories</h2>
      </div>
      <div class="all_story_results">
        <?php foreach ($searchresults['stories'] as $result): ?>
          
        <a href="<?php echo url_to('/users/' . $result['story_user']) ?>">
          <div class="result result-<?php echo $result['type'] ?>">
            <img class="story_cover" src="<?php echo url_to("/" . $result['story_cover']) ?>" />
            <div>
              <h4><?php echo $result['story_title'] ?></h4>
              <p><b><?php echo $result['story_user'] ?></b></p>
              <textarea readonly id="description" maxlength="50" cols="16" rows="3" style="overflow: hidden"><?php echo $result['story_description'] ?></textarea>
            </div>
          </div>
        </a>
        <?php  endforeach; ?>
      </div>
    </div>
    <div class="user_results">
      <div class="user_title">
        <h2>Users</h2>
      </div>
      <div class="all_user_results">
        <?php foreach ($searchresults['users'] as $result): ?>
          
        <a href="<?php echo url_to('/users/' . $result['username']) ?>">
          <div class="result result-<?php echo $result['type'] ?>">
            <img class="user_pic" src="<?php echo url_to("/" . $result['user_pic']) ?>" />
            <div>
              <h3><?php echo $result['username'] ?></h3>
              <p><?php echo $result['works'] ?> Books - <?php echo $result['followers'] ?> Followers</p>
            </div>
          </div>
        </a>
        <?php  endforeach; ?>
      </div>
    </div>

  </div>
  <?php } ?>
    