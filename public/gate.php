<?php 
session_start();

require "../private/includes/functions.php";
require "../private/includes/model.php";
require "../private/includes/controllers.php";

//Determines which controller to call
$base_uri = substr($_SERVER['SCRIPT_NAME'],0, strpos($_SERVER['SCRIPT_NAME'],'/gate.php'));
$uri_with_params = str_replace($base_uri, '',$_SERVER['REQUEST_URI']);
$uri = parse_url($uri_with_params, PHP_URL_PATH);

define('HOME_URL', $base_uri);

// Check the URI information en call the right "controller" script
if ('/' === $uri) {
    homepage_action();
} elseif ('/about-us' === $uri) {
    about_us_action();
} elseif ('/agenda' === $uri && $_SERVER["REQUEST_METHOD"] == "POST") {
    agenda_action();
} elseif ('/agenda' === $uri && $_SERVER["REQUEST_METHOD"] == "GET") {
    agenda_form_action();
} elseif ('/news' === $uri && $_SERVER["REQUEST_METHOD"] == "POST") {
    news_action();
} elseif ('/news' === $uri  && $_SERVER["REQUEST_METHOD"] == "GET") {
    news_form_action();
} else if ('/search' === $uri && $_SERVER["REQUEST_METHOD"] == "GET") {
    search_action();
} elseif ('/login' === $uri && $_SERVER["REQUEST_METHOD"] == "GET") {
    login_form_action();
} elseif ('/login' === $uri && $_SERVER["REQUEST_METHOD"] == "POST") {
    login_action();
} elseif ('/register' === $uri && $_SERVER["REQUEST_METHOD"] == "GET") {
    register_form_action();
} elseif ('/register' === $uri && $_SERVER["REQUEST_METHOD"] == "POST") {
    register_action();
} elseif ('/logout' === $uri) {
    logout_action();
} elseif ('/profile' === $uri) {
    profile_action();
} elseif (strpos($uri, '/users/') === 0) {
    $uri_parts = explode('/', substr($uri, 1));
    profile_show_action($uri_parts[1]);
} elseif ('/edit-profile' === $uri && $_SERVER["REQUEST_METHOD"] == "GET") {
    edit_profile_form_action();
} elseif ('/edit-profile' === $uri && $_SERVER["REQUEST_METHOD"] == "POST") {
    edit_profile_action();
} elseif ('/add-story' === $uri && $_SERVER["REQUEST_METHOD"] == "GET") {
    add_story_form_action();
} elseif ('/add-story' === $uri && $_SERVER["REQUEST_METHOD"] == "POST") {
    add_story_action();
} elseif ('/verify' === $uri) {
    verify_action();
} else {
    notfound_action();
}

?>