<?php
$host = 'localhost';
$dbname = 'form_submission';
$username = 'root';
$password = '';

// Create a new MySQLi object for database connection
$mysqli = new mysqli($host, $username, $password, $dbname);

// Check if connection was successful
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit;
}

// Create the form_submission table
$createTableQuery = "
    CREATE TABLE form_submission (
        id INT(11) NOT NULL,
        firstname VARCHAR(55) NOT NULL,
        lastname VARCHAR(55) NOT NULL,
        email VARCHAR(55) NOT NULL,
        message TEXT NOT NULL,
        PRIMARY KEY (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
";

if (!$mysqli->query($createTableQuery)) {
    echo "Error creating table: " . $mysqli->error;
    exit;
}

// Add primary key and auto-increment to the id column
$alterTableQuery = "
    ALTER TABLE form_submission
    ADD PRIMARY KEY (id),
    MODIFY id INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
";

if (!$mysqli->query($alterTableQuery)) {
    echo "Error adding primary key and auto-increment: " . $mysqli->error;
    exit;
}

echo "Migration completed successfully.";

// Close the database connection
$mysqli->close();
?>
