<?php
echo strtotime ("now"), "n";
echo strtotime ("10 September 2000"), "n";
echo strtotime (" 1 day"), "n";
echo strtotime (" 1 week"), "n";
echo strtotime (" 1 week 2 days 4 hours 2 seconds"), "n";
echo strtotime ("next Thursday"), "n";
echo strtotime ("last Monday"), "n";
?>

Checking for failure
<?php
$str = 'Not Good';
if (($timestamp = strtotime($str)) === -1) {
    echo "The string ($str) is bogus";
} else {
    echo "$str == ". date('l dS of F Y h:i:s A',$timestamp);
}
?>