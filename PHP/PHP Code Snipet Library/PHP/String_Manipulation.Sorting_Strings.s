<?php
$arr1 = $arr2 = array("img12.png","img10.png","img2.png","img1.png");
echo "Standard string comparisonn";
usort($arr1,"strcmp");
print_r($arr1);
echo "nNatural order string comparisonn";
usort($arr2,"strnatcmp");
print_r($arr2);
?>


/* Output
Standard string comparison
Array
(
    [0] => img1.png
    [1] => img10.png
    [2] => img12.png
    [3] => img2.png
)

Natural order string comparison
Array
(
    [0] => img1.png
    [1] => img2.png
    [2] => img10.png
    [3] => img12.png
)
*/