<div class="search-bar">
        <form action="<?php echo url_to('/search'); ?>" method="GET">
            <input type="hidden" name="page" value="search" />
            <input type="text" name="term" value="<?php if (isset($searchterm)): echo $searchterm; endif; ?>" placeholder="Vul de zoekopdracht in" />
            <button type="submit" >Zoek</button>
        </form>

<h1>Search results</h1>
<?php if (!empty($searchterm)) { ?>
    <p>Er zijn <?php echo count($searchresults) ?> zoekresultaten voor "<?php echo $searchterm ?>"</p>
    <br>
    <div class="results">
    <!-- <div class="movie_results">
    <h2>Movies</h2>
  <?php //foreach ($searchresults['movie'] as $result): ?>
  <div class="result result-<?php //echo $result['type'] ?>">
    <a href="index.php?page=movie&id=<?php //echo $result['ID'] ?>"><h2><?php //echo $result['title'] ?></h2></a>
    <p><?php //echo $result['description'] ?></p>
    </div>
    <?php //endforeach; ?>
    </div> -->

    <div class="user_results">
      <div class="user_title">
        <h2>Users</h2>
      </div>
      <div class="all_user_results">
    <?php foreach ($searchresults['users'] as $result): ?>
    <a href="<?php echo url_to('/users/' . $result['username']) ?>">
  <div class="result result-<?php echo $result['type'] ?>">
  <img src="<?php echo url_to($result['user_pic']) ?>" />
  <div>
    <h3><?php echo $result['username'] ?></h3>
    <p><?php echo $result['works'] ?> Books - <?php echo $result['followers'] ?> Followers</p>
  </div>
  </div>
  </a>
    <?php endforeach; ?>
    </div>
  </div>

</div>
<?php } ?>