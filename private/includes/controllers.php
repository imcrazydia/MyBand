<?php 
//All controllers
function homepage_action() {
    $currentPage = 'home';

    //modals
    $latest_news = get_latest_news();
    $recommended_writers = get_recommended_writers();

    //view
    include "../private/templates/header.php";
    include "../private/templates/homepage.php";
    include "../private/templates/footer.php";
}

function about_us_action() {
  $currentPage = 'about_us';
  
  //modal
  

  //view
  include "../private/templates/header.php";
  include "../private/templates/about-us.php";
}

function agenda_action() {
    $currentPage = 'agenda';

    //modal
    $events = get_events();


    

    //view
    include "../private/templates/header.php";
    include "../private/templates/agenda.php";
    include "../private/templates/footer.php";
}

function news_action() {
    $currentPage = 'news';

    $news_uploaded = upload_post();

    if ($news_uploaded === true) {
      header("Location: " . url_to('/news'));
    } else {
      echo "ERROR";
    }

}

function news_form_action() {
    $currentPage = 'news';

    //modal
    $news = get_news();

    $error = isset($_GET['error']);

    //view
    include "../private/templates/header.php";
    include "../private/templates/news.php";
    include "../private/templates/footer.php";
}

function search_action() {
    //modal
    $currentPage = 'search';

    //view
    include "../private/templates/header.php";
    include "../private/templates/search.php";
    include "../private/templates/footer.php";
}

function login_action() {
    //modal
    $currentPage = 'login';

    $loggedin = login($_POST["username"], $_POST["password"]);

    if ($loggedin === true) {
        header("Location: " . url_to('/'));
    } else {
        header("Location: " . url_to('/login?error=' . urlencode($loggedin)));
    }
}

function login_form_action() {
    //modal
    $currentPage = 'login';

    $error = isset($_GET['error']);

    //view
    include "../private/templates/header.php";
    include "../private/templates/login.php";
    include "../private/templates/footer.php";
}

function register_action() {

    //modal
    $currentPage = 'register';

    $result = register($_POST["username"], $_POST["password"], $_POST["email"], $_POST["confirm_password"]);
    
    include "../private/templates/header.php";
    if ($result === true) {
        echo '<h2>Klik de link in de verificatie email om je account te bevestigen</h2>'; //andere template
        exit;
    } else {
        $errors = $result;
        include "../private/templates/register.php";

        echo "FOUT";
    }
    include "../private/templates/footer.php";
}


function register_form_action() {
    //modal
    $currentPage = 'register';

    //view
    include "../private/templates/header.php";
    include "../private/templates/register.php";
    include "../private/templates/footer.php";
}

function notfound_action() {

    header('HTTP/1.1 404 Not Found');

    include "../private/templates/header.php";
    include "../private/templates/404.php";
    include "../private/templates/footer.php";

}

function logout_action()
{
    session_start();

    // Unset all of the session variables
    $_SESSION = array();
    
    // Destroy the session.
    session_destroy();
    
    // Redirect to login page
    header("location: " . url_to('/'));
    exit;
}

function profile_action() {
    $currentPage = 'profile';
    
    //modal
    $profile_info = get_user_info();

    //view
    include "../private/templates/header.php";
    include "../private/templates/profile.php";
    include "../private/templates/footer.php";
}

function profile_show_action($username) {
    $currentPage = 'profile_show';
    
    //modal
    $profile_user_info = get_user_info($username);

    //view
    include "../private/templates/header.php";
    include "../private/templates/user_profile.php";
    include "../private/templates/footer.php";
}

function edit_profile_form_action() {
    $currentPage = 'edit-profile';
    
    //modal
    $profile_edit = get_user_info();
    $error = isset($_GET['error']);

    //view
    include "../private/templates/header.php";
    include "../private/templates/edit_profile.php";
    include "../private/templates/footer.php";
}

function edit_profile_action() {
    $currentPage = 'edit-profile';

    $prof_edit = prof_edit($_POST["bio"], $_POST["location"], $_POST["website"]);
   
    if ($prof_edit) {
        header("Location: " . url_to('/profile'));
    } else {
        header("Location: " . url_to('/edit-profile?error=' . urlencode($prof_edit)));
    }
}

?>