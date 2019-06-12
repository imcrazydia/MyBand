<?php
if ($_SERVER['HTTP_HOST'] !== 'localhost') {
  $config = [
    'db_host' => '127.0.0.1',
    'db_name' => 'c3583myband',
    'db_user' => 'c3583imcrazydia',
    'db_pass' => 'diaquino2001',
  ];
} else {
  $config = [
    'db_host' => 'localhost',
    'db_name' => 'myband',
    'db_user' => 'root',
    'db_pass' => '',
  ];
}
 
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