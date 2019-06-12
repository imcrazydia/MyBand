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


?>