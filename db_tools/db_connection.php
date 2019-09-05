<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/config/database.php");

 $options = [
     PDO::ATTR_ERRMODE   => PDO::ERRMODE_EXCEPTION
];

 
try {
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD, $options);
} catch( PDOException $e ) {
    echo 'Connection failed: ' . $e->getMessage() . PHP_EOL;
}
?>

