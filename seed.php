<?php
include 'client.php';
// INSERT query
$insertQuery = "
    INSERT INTO form_submission (id, firstname, lastname, email, message) VALUES
    (1, 'sharjeel', 'khan', 'sharjeelkhhan919@gmail.com', 'sorry'),
    (2, 'John', 'Doe', 'johndoe@gmail.com', 'good'),
    (3, 'Ali', 'Nadeem', 'Ali@gmail.com', 'perfect')
";
echo "Seed data inserted successfully.";
?>
