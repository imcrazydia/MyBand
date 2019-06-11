<?php 
//All controllers
function homepage_action() {
    //modal
    $currentPage = 'home';

    //view
    include "../private/templates/header.php";
    include "../private/templates/homepage.php";
    include "../private/templates/footer.php";
}

function about_us_action() {
    //modal
    $currentPage = 'about_us';

    //view
    include "../private/templates/header.php";
    include "../private/templates/about-us.php";
    include "../private/templates/footer.php";
}

function agenda_action() {
    //modal
    $currentPage = 'agenda';

    //view
    include "../private/templates/header.php";
    include "../private/templates/agenda.php";
    include "../private/templates/footer.php";
}

function news_action() {
    //modal
    $currentPage = 'news';

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

    //view
    include "../private/templates/header.php";
    include "../private/templates/register.php";
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
    //modal
    $currentPage = 'profile';

    //view
    include "../private/templates/header.php";
    include "../private/templates/profile.php";
    include "../private/templates/footer.php";
}


?>