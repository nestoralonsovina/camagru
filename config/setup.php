<?php

require_once('database.php');


// Create db
try {
	$dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	echo "Connected to the database successfully" . PHP_EOL;
	try {
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = file_get_contents('struct.sql');
		$dbh->exec($sql);
		echo "Database structure created\n";
	} catch ( PDOException $e) {
		echo "Structure creation failed" . $e->getMessage() . PHP_EOL;
	}
} catch( PDOException $e ) {
    echo 'Connection failed: ' . $e->getMessage() . PHP_EOL;
}

// The following steps will be done using the db previously created
// changing the DSN in accordance

// Create db user
try {
	$dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
} catch ( PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage() . PHP_EOL;
	exit(-1);
}
