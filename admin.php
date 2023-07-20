<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $adminUsername = $_POST["adminUsername"].null;
    $adminPassword = $_POST["adminPassword"].null;

    if ($adminUsername === "admin" && $adminPassword === "1") {
        
        include("data.php"); // Includes the configuration for connecting to the database

        $sql = "SELECT * FROM `form_submission`"; // Constructs the SQL query to select all records from the table
        $result = $mysqli->query($sql); // Executes the SQL query and stores the result

        if ($result->num_rows > 0) {
            echo '<html>';
            echo '<head>';
            echo '<style>';
            echo 'table {';
            echo '    width: 100%;';
            echo '    border-collapse: collapse;';
            echo '}';
            echo 'th, td {';
            echo '    padding: 8px;';
            echo '    text-align: left;';
            echo '    border-bottom: 1px solid #ddd;';
            echo '}';
            echo '</style>';
            echo '</head>';
            echo '<body>';
            echo '<table>'; // Start of the table

            // Table headers
            echo '<tr>';
            echo '<th>Serial no</th>';
            echo '<th>First Name</th>';
            echo '<th>Last Name</th>';
            echo '<th>Email</th>';
            echo '<th>Message</th>';
            echo '</tr>';
            echo '<a href="search.php" class="btn btn-primary"> Search by Email</a>';
            echo '<br>';
            echo '</br>';
            while ($row = $result->fetch_row()) {
                $serialno = $row[0]; // Retrieves the first column of the current row
                $firstName = $row[1]; // Retrieves the second column of the current row
                $lastName = $row[2]; // Retrieves the third column of the current row
                $email = $row[3]; // Retrieves the fourth column of the current row
                $message = $row[4]; // Retrieves the fifth column of the current row

                // Table row
                echo '<tr>';
                echo '<td>' . $serialno . '</td>'; // Table cell with the Serial no
                echo '<td>' . $firstName . '</td>'; // Table cell with the First Name
                echo '<td>' . $lastName . '</td>'; // Table cell with the Last Name
                echo '<td>' . $email . '</td>'; // Table cell with the Email
                echo '<td>' . $message . '</td>'; // Table cell with the Message
                echo '</tr>';
            }

            echo '</table>'; // End of the table
            echo '<br>';
            echo'</br>';
            // Logout button and form to redirect to the main page
            echo '<a href="me.php" class="btn btn-primary">Logout</a>';
            echo '</body>';
            echo '</html>';
        } else {
            echo "No records found.";
        }

        $mysqli->close(); // Close database connection
    } else {
        echo "Invalid username or password.";
    }
}
?>
