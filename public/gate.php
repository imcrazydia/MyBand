<?php 
require "../private/includes/functions.php";
require "../private/controllers.php";

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
} elseif ('/agenda' === $uri) {
    agenda_action();
} elseif ('/news' === $uri) {
    news_action();
} else if ('/search' === $uri) {
    search_action();
} elseif ('/login' === $uri && $_SERVER["REQUEST_METHOD"] == "GET") {
    login_form_action();
} elseif ('/login' === $uri && $_SERVER["REQUEST_METHOD"] == "POST") {
    login_action();
} elseif ('/register' === $uri && $_SERVER["REQUEST_METHOD"] == "GET") {
    register_form_action();
} elseif ('/register' === $uri && $_SERVER["REQUEST_METHOD"] == "POST") {
    register_action();
}  elseif ('/logout' === $uri) {
    logout_action();
} elseif ('/profile' === $uri) {
    profile_action();
} else {
    notfound_action();
}

?>