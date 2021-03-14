###############################
#  D B  C O N N E C T
###############################

<?php

$hostname = 'localhost';
$user = 'username';
$pass = 'password';
$database = 'database_name';

$db_connection = new PDO( "mysql:host=" . $hostname . ";dbname=" . $database, $user, $pass );

$results = $db_connection->query( 'SELECT testimonial, author FROM recommendations WHERE 1 ORDER by rand() LIMIT 1' );

foreach ( $results as $row ) {
	echo '<p id="quote">' . $row['testimonial'] . '</p>';
	echo '<p id="author">&ndash;' . $row['author'] . '</p>';
}

// Close the connection
$db_connection = null;

