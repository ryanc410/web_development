<?php
include "db.php";

$con = mysqli_connect($server, $db_user, $db_pwd, $db_name) //connect to the database server
or die("Could not connect to mysql because " . mysqli_error());

mysqli_select_db($con, $db_name) //select the database
or die("Could not select to mysql because " . mysqli_error());

//prevent sql injection
$username = mysqli_real_escape_string($con, $_POST["username"]);
$email = mysqli_real_escape_string($con, $_POST["email"]);
$source = mysqli_real_escape_string($con, $_POST["source"]);
if (isset($_POST["status"])) {
    $status = mysqli_real_escape_string($con, $_POST["status"]);
    $status = htmlspecialchars($status, ENT_COMPAT);
}
$role_description = mysqli_real_escape_string($con, $_POST["role_description"]);

//prevent xss
$username = htmlspecialchars($username, ENT_COMPAT);
$email = htmlspecialchars($email, ENT_COMPAT);
$source = htmlspecialchars($source, ENT_COMPAT);
$role_description = htmlspecialchars($role_description, ENT_COMPAT);

if ($source == "email") {
    $query = "update $table_name" . " set activ_status='$status',role='$role_description' 
 where username='$username' and email='$email'";

} else {
    $query = "update $table_name_social" . " set role='$role_description' 
 where username='$username'";
}
//echo $query;
$result = mysqli_query($con, $query) or die('error updating');
if ($result) {
    echo "User information updated";
} else {
    echo "error";
}