Client Version

<?php
    printf ("MySQL client info: %sn", mysql_get_client_info());
?>

Host Information

<?php
    mysql_connect("localhost", "mysql_user", "mysql_password") or
        die("Could not connect: " . mysql_error());
    printf ("MySQL host info: %sn", mysql_get_host_info());
?>

Protocol Information

<?php
    mysql_connect("localhost", "mysql_user", "mysql_password") or
        die("Could not connect: " . mysql_error());
    printf ("MySQL protocol version: %sn", mysql_get_proto_info());
?>

Server Information

<?php
    mysql_connect("localhost", "mysql_user", "mysql_password") or
        die("Could not connect: " . mysql_error());
    printf ("MySQL server version: %sn", mysql_get_server_info());
?>