<?php
    /* Connecting, selecting database */
    $link = mysql_connect("mysql_host", "mysql_user", "mysql_password")
        or die("Could not connect");
    print "Connected successfully";
    mysql_select_db("my_database") or die("Could not select database");

    /* Performing SQL query */
    $query = "SELECT * FROM my_table";
    $result = mysql_query($query) or die("Query failed");

    /* Printing results in HTML */
    print "<table>n";
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
        print "t<tr>n";
        foreach ($line as $col_value) {
            print "tt<td>$col_value</td>n";
        }
        print "t</tr>n";
    }
    print "</table>n";

    /* Free resultset */
    mysql_free_result($result);

    /* Closing connection */
    mysql_close($link);
?>