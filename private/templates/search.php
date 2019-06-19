<div class="search-bar">
        <form action="<?php echo url_to('/search'); ?>" method="GET">
            <input type="hidden" name="page" value="search" />
            <input type="text" name="term" value="<?php if (isset($searchterm)): echo $searchterm; endif; ?>" placeholder="Vul de zoekopdracht in" />
            <button type="submit" >Zoek</button>
        </form>

<h1>Search results</h1>
    <p>Er zijn <?php echo count($searchresults) ?> zoekresultaten voor "<?php echo $searchterm ?>"</p>
    <br>
    <div class="results">
    <!-- <div id="movie_results">
    <h2>Movies</h2>
  <?php //foreach ($searchresults['movie'] as $result): ?>
  <div class="result result-<?php //echo $result['type'] ?>">
    <a href="index.php?page=movie&id=<?php //echo $result['ID'] ?>"><h2><?php //echo $result['title'] ?></h2></a>
    <p><?php //echo $result['description'] ?></p>
    </div>
    <?php //endforeach; ?>
    </div> -->

    <div id="user_results">
        <h2>Users</h2>
    <?php foreach ($searchresults['users'] as $result): ?>
  <div class="result result-<?php echo $result['type'] ?>">
    <a href="<?php echo url_to('/users/' . $result['username']) ?>"><h2><?php echo $result['username'] ?></h2></a>
    <p><?php echo $result['description'] ?></p>
    </div>
    <?php endforeach; ?>
</div>

</div>