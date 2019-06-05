<?php
/* Database credentials. */
/* if ($_SERVER['HTTP_HOST'] !== 'localhost') {
define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'c3583imcrazydia');
define('DB_PASSWORD', 'diaquino2001');
define('DB_NAME', '');
} else {
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'myband'); } */

$config = [
    'db_host' => 'localhost',
    'db_name' => 'myband',
    'db_user' => 'root',
    'db_pass' => '',
];
 
return $config;

/* Attempt to connect to database */
try {
    $dsn = "mysql:host=" . $config['db_host'] . ';dbname=' . $config['db_name'];
    $database = new PDO($dsn, $config['db_user'], $config['db_pass']);

    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    return $database;

} catch (PDOException $fout) {
        echo "Database connectie fout: " . $fout->getMessage();
        exit;
    }
?>