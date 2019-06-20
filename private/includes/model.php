<?php 
function get_latest_news()
{
  $pdo = open_connection();

  $query = "SELECT * FROM news ORDER BY uploaded_on DESC LIMIT 1";
  $statement = $pdo->query($query);
  
  return $statement;
}

function get_news()
{
  $pdo = open_connection();

  $query = "SELECT * FROM news ORDER BY uploaded_on DESC";
  $statement = $pdo->query($query);
  
  return $statement;
}

function get_recommended_writers()
{
  $pdo = open_connection();

  $query = "SELECT * FROM users ORDER BY id ASC LIMIT 4";
  $statement = $pdo->query($query);

  return $statement;
}

function get_events()
{
  $pdo = open_connection();

  $query = "SELECT * FROM events ORDER BY datum ASC";
  $statement = $pdo->query($query);

  return $statement;
}

function get_user_info()
{
  $pdo = open_connection();

  $query = "SELECT * FROM users";
  $statement = $pdo->query($query);

  return $statement;

}

function search_database($searchterm)
{
    $results = [];
    $pdo = open_connection();

    //Zoeken naar stories
    $sql = 'SELECT * FROM stories WHERE story_title LIKE :search_term OR
     story_user LIKE :search_term OR
     story_description LIKE :search_term';
    
    $statement = $pdo->prepare($sql);
    $params = [
        'search_term' => '%' . $searchterm . '%'
    ];

    $statement->execute($params);
    foreach ($statement as $movie) {
        $row = [];
        $row['type'] = 'stories';
        $row['story_cover'] = $movie['story_cover'];
        $row['story_title'] = $movie['story_title'];
        $row['story_user'] = $movie['story_user'];
        $row['story_description'] = $movie['story_description'];
        $results['stories'][] = $row;
    }

    //Zoeken naar users
    $sql = 'SELECT * FROM users WHERE username LIKE :search_term';
    
    $statement = $pdo->prepare($sql);
    $params = [
        'search_term' => '%' . $searchterm . '%'
    ];

    $statement->execute($params);
    foreach ($statement as $user) {
        $row = [];
        $row['type'] = 'users';
        $row['user_pic'] = $user['user_pic'];
        $row['username'] = $user['username'];
        $row['works'] = $user['works'];
        $row['followers'] = $user['followers'];
        $results['users'][] = $row;
    }

    return $results;
}

function get_stories()
{
  $pdo = open_connection();

  $query = "SELECT * FROM stories";
  $statement = $pdo->query($query);

  return $statement;
}

?>