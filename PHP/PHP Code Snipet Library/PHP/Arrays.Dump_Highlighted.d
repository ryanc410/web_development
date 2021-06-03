An alternative to print_r, this function will print an array with HTML and Syntax highlighting. Could easily be extended to support 3D arrays.

USAGE: 

echo f_arr($_SESSION);
or
if($a = f_arr($_SESSION)) {
echo "Dump of SESSION:
".$a;
}