Make a string's first character uppercase
<?php
$foo = 'hello world!';
$foo = ucfirst($foo);             // Hello world!

$bar = 'HELLO WORLD!';
$bar = ucfirst($bar);             // HELLO WORLD!
$bar = ucfirst(strtolower($bar)); // Hello world!
?>

Uppercase the first character of each word in a string
<?php
$foo = 'hello world!';
$foo = ucwords($foo);             // Hello World! 

$bar = 'HELLO WORLD!';
$bar = ucwords($bar);             // HELLO WORLD!
$bar = ucwords(strtolower($bar)); // Hello World!
?>

Make a string uppercase
<?php
$str = "Mary Had A Little Lamb and She LOVED It So";
$str = strtoupper($str);
print $str;                      // Prints MARY HAD A LITTLE LAMB AND SHE LOVED IT SO
?>

Make a string lowercase
<?php
$str = "Mary Had A Little Lamb and She LOVED It So";
$str = strtolower($str);
print $str;                       // Prints mary had a little lamb and she loved it so
?>