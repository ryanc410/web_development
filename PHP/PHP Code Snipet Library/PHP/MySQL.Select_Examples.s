// Returning Numeric Array Indexes with MYSQL_NUM

<?php
    mysql_connect("localhost", "mysql_user", "mysql_password") or
        die("Could not connect: " . mysql_error());
    mysql_select_db("mydb");

    $result = mysql_query("SELECT id, name FROM mytable");

    while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
        printf ("ID: %s  Name: %s", $row[0], $row[1]);  
    }

    mysql_free_result($result);
?>
 
 
// Returning Associative Array Indexes with MYSQL_ASSOC

<?php
    mysql_connect("localhost", "mysql_user", "mysql_password") or
        die("Could not connect: " . mysql_error());
    mysql_select_db("mydb");

    $result = mysql_query("SELECT id, name FROM mytable");

    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        printf ("ID: %s  Name: %s", $row["id"], $row["name"]);
    }

    mysql_free_result($result);
?>
 
 
// Returning both Numeric and Associative Array Indexes with MYSQL_BOTH

<?php
    mysql_connect("localhost", "mysql_user", "mysql_password") or
        die("Could not connect: " . mysql_error());
    mysql_select_db("mydb");

    $result = mysql_query("SELECT id, name FROM mytable");

    while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
        printf ("ID: %s  Name: %s", $row[0], $row["name"]);
    }

    mysql_free_result($result);
?>