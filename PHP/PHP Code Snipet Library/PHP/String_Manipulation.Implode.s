<?php

$array = array('lastname', 'email', 'phone');
$comma_separated = implode(",", $array);

print $comma_separated; // lastname,email,phone

?>