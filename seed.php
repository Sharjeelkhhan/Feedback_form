<?php
$host = 'localhost';
$dbname = 'form_submission';
$username = 'root';
$password = '';

// Create a new MySQLi object for database connection
$mysqli = new mysqli($host, $username, $password, $dbname);
// INSERT query
$insertQuery = "
    INSERT INTO form_submission (id, firstname, lastname, email, message) VALUES
    (1, 'sharjeel', 'khan', 'sharjeelkhhan919@gmail.com', 'sorry'),
    (2, 'John', 'Doe', 'johndoe@gmail.com', 'good'),
    (3, 'Ali', 'Nadeem', 'Ali@gmail.com', 'perfect')
";
echo "Seed data inserted successfully.";

// Close the database connection
$mysqli->close();
?>
