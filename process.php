<?php
function save()
{
include("data.php"); // Includes the configuration for connecting to the database
extract($_POST); //values frompost array to separate variable
$sql = "INSERT INTO `form_submission`(`firstname`, `lastname`, `email`, `message`) VALUES ('".$firstname."','".$lastname."','".$email."','".$message."')";//inserting the variables with values into database
$result = $mysqli->query($sql); // Executes the SQL query and stores the result
if(!$result){  //if condition checks if there is any problem for data migration
    echo "something went wrong, try agin later" ;
}
echo "Thank You For Contacting Us ";
$mysqli->close(); // close mysqli
}
save();
?>