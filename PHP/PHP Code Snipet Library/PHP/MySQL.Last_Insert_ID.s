<?php
    mysql_connect("localhost", "mysql_user", "mysql_password") or
        die("Could not connect: " . mysql_error());
    mysql_select_db("mydb");

    mysql_query("INSERT INTO mytable (product) values ('kossu')");
    printf ("Last inserted record has id %dn", mysql_insert_id());
?>