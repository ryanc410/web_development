<?php
echo "Hello World";

echo "This spans
multiple lines. The newlines will be 
output as well";

echo "This spansnmultiple lines. The newlines will benoutput as well.";

echo "Escaping characters is done "Like this".";

//You can use variables inside of an echo statement
$foo = "foobar";
$bar = "barbaz";

echo "foo is $foo"; // foo is foobar

// Using single quotes will print the variable name, not the value
echo 'foo is $foo'; // foo is $foo

// If you are not using any other characters, you can just echo variables
echo $foo;          // foobar
echo $foo,$bar;     // foobarbarbaz

echo <<<END
This uses the "here document" syntax to output
multiple lines with $variable interpolation. Note
that the here document terminator must appear on a
line with just a semicolon no extra whitespace!
END;

// Because echo is not a function, following code is invalid. 
($some_var) ? echo('true'): echo('false');

// However, the following examples will work:
($some_var) ? print('true'): print('false'); // print is a function
echo $some_var ? 'true': 'false'; // changing the statement around
?>

echo() also has a shortcut syntax, where you can immediately follow the opening tag with an equals sign. 
I have <?=$foo?> foo.
 
