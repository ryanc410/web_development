<?php
include "db.php";

$con = mysqli_connect($server, $db_user, $db_pwd, $db_name) //connect to the database server
or die("Could not connect to mysql because " . mysqli_error());

mysqli_select_db($con, $db_name) //select the database
or die("Could not select to mysql because " . mysqli_error());

//prevent sql injection

$role_id = mysqli_real_escape_string($con, $_POST["role_id"]);
$role_description = mysqli_real_escape_string($con, $_POST["role_description"]);
if (isset($_POST["action"])) {
    $action = mysqli_real_escape_string($con, $_POST["action"]);
    $action = htmlspecialchars($action, ENT_COMPAT);
}

//prevent xss
$role_id = htmlspecialchars($role_id, ENT_COMPAT);
$role_description = htmlspecialchars($role_description, ENT_COMPAT);


if ($action == "delete") {
    $query = "Select * from $table_name_role";
    $result = mysqli_query($con, $query) or die('error');
    if (mysqli_num_rows($result) == 1) {
        die('Default role can\'t be deleted');
    } else {
        $query = "delete from $table_name_role where role_id='$role_id'";
        $result = mysqli_query($con, $query) or die('error updating');
        if ($result) {
            echo "Role deleted";
        } else {
            echo "error";
        }
    }

} else {
    $query = "update $table_name_role" . " set role_description='$role_description' 
 where role_id='$role_id'";

    //echo $query;
    $result = mysqli_query($con, $query) or die('error updating');
    if ($result) {
        echo "Role information updated";
    } else {
        echo "error";
    }
}

