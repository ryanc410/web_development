<?php
include "db.php";

$con = mysqli_connect($server, $db_user, $db_pwd, $db_name) //connect to the database server
or die("Could not connect to mysql because " . mysqli_error());

mysqli_select_db($con, $db_name) //select the database
or die("Could not select to mysql because " . mysqli_error());

//prevent sql injection
$role = mysqli_real_escape_string($con, $_POST["newrole"]);
//prevent xss
$role = htmlspecialchars($role, ENT_COMPAT);

//check if user exist already
$query = "select * from " . $table_name_role . " where role_description='$role'";
$result = mysqli_query($con, $query) or die('error');
if (mysqli_num_rows($result)) {
    die('role already exists');
}

$query = "insert into " . $table_name_role . "(role_description) values ('$role')";

if (!mysqli_query($con, $query)) {
    die('Error: ' . mysqli_error());

}

echo 'Role added';
