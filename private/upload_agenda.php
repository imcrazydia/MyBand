<?php 
include "includes/functions.php";

$pdo = open_connection();

$query = "SELECT * FROM events";

//Hier slaan we alle fouten in op
$errors = array();
 
// Eerst de data opschonen 
$title = filter_var($_POST['title'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
$details = filter_var($_POST['details'], FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
$datum = filter_var($_POST['datum'], FILTER_SANITIZE_STRING);
 
if(empty($title)){
    // title is leeg
    $errors['title'] = 'You cant upload an event without a title.';
}

if(empty($details)){
    // post_text is leeg
    $errors['details'] = 'You cant upload an event without details.';
}

if(empty($datum)){
    // post_text is leeg
    $errors['datum'] = 'You cant upload an event without a date.';
}

$sql = 'INSERT INTO events (title, details, datum) VALUES (?, ?, ?)';
 
//prepared statement
$statement = $pdo->prepare($sql);
 
$data = array(
  $title, 
  $details,
  $datum 
);


$statement->execute($data);

if($statement){
    sleep(1);
    header("location: ../public/agenda");
} else {
$statusMsg = "There was a problem uploading this event.";
}
?>