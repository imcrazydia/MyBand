<?php 
include "includes/functions.php";

$pdo = open_connection();

$query = "SELECT * FROM news";

//Hier slaan we alle fouten in op
$errors = array();
 
// Eerst de data opschonen 
$title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
$post_text = filter_var($_POST['post_text'], FILTER_SANITIZE_STRING);
 
if(empty($title)){
    // title is leeg
    $errors['title'] = 'You cant upload without a title.';
}

if(empty($post_text)){
    // post_text is leeg
    $errors['post_text'] = 'You cant upload a post without text.';
}

$sql = 'INSERT INTO news (title, post_text, uploaded_on) VALUES (?, ?, NOW())';
 
//prepared statement
$statement = $pdo->prepare($sql);
 
$data = array(
  $title, 
  $post_text 
);


$statement->execute($data);

if($statement){
    sleep(1);
    header("location: ../public/news");
} else {
$statusMsg = "There was a problem uploading this post.";
}
?>