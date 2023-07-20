<?php
// Define database connection constants
define("DB_HOST","localhost"); // Hostname of the database server
define("DB_USER","root"); // Username for database access
define("DB_PASSWORD",""); // Password for database access
define("DB_NAME","form_submission"); //database name
// Create a new MySQLi object for database connection
$mysqli = new mysqli(DB_HOST,DB_USER, DB_PASSWORD,DB_NAME);
?>