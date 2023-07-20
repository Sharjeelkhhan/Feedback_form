<!DOCTYPE html>
<html>
<head>
    <title>Search Bar using PHP</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<?php
function find()
{
    ?>
    <form method="post">
        <label>Search</label>
        <input type="text" name="search">
        <input type="submit" name="submit">
    </form>

    <?php
    // Establish database connection
    $con = new PDO("mysql:host=localhost;dbname=form_submission", 'root', '');

    if (isset($_POST["submit"])) {
        $str = $_POST["search"];
        // Prepare SQL statement with a placeholder for search term
        $sth = $con->prepare("SELECT * FROM `form_submission` WHERE `email` LIKE :email");
        $searchTerm = '%' . $str . '%';
        // Bind the search term to the placeholder
        $sth->bindParam(':email', $searchTerm);
        // Execute the SQL statement
        $sth->execute();

        if ($sth->rowCount() > 0) {
            // Fetch all the rows from the result set as an associative array
            $results = $sth->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <br><br><br>
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Message</th>
                </tr>
                <?php foreach ($results as $row) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['firstname']; ?></td>
                        <td><?php echo $row['lastname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['message']; ?></td>
                    </tr>
                <?php } ?>
            </table>
            <?php
        } else {
            echo "No records found.";
        }
    }
    echo "<br>";
    echo "<br>";
    echo '<a href="me.php" class="btn btn-primary">GO BACK</a>';
}

// Call the function
find();
?>

</body>
</html>
