<?php
    mysql_connect("localhost", "mysql_user", "mysql_password");

    mysql_select_db("nonexistentdb");
    echo mysql_errno() . ": " . mysql_error(). "n";

    mysql_select_db("kossu");
    mysql_query("SELECT * FROM nonexistenttable");
    echo mysql_errno() . ": " . mysql_error() . "n";
?>