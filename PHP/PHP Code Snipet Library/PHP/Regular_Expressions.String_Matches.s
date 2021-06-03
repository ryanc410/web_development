Match the string 'php'

<?php
// the "i" after the pattern delimiter indicates a case-insensitive search
if (preg_match ("/php/i", "PHP is the web scripting language of choice.")) {
    print "A match was found.";
} else {
    print "A match was not found.";
}
?>

Match the string 'web'
<?php
// the b in the pattern indicates a word boundary, so only the distinct
// word "web" is matched, and not a word partial like "webbing" or "cobweb"
if (preg_match ("/bwebb/i", "PHP is the web scripting language of choice.")) {
    print "A match was found.";
} else {
    print "A match was not found.";
}
if (preg_match ("/bwebb/i", "PHP is the website scripting language of choice.")) {
    print "A match was found.";
} else {
    print "A match was not found.";
}
?>

Getting the domain name out of a URL
<?php
// get host name from URL
preg_match("/^(http://)?([^/] )/i",
"http://www.php.net/index.html", $matches);
$host = $matches[2];
// get last two segments of host name
preg_match("/[^./] .[^./] $/",$host,$matches);
echo "domain name is: ".$matches[0]."n";
?>