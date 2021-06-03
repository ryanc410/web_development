Left - ltrim() function
<?php

$text = "ttThese are a few words :) ...  ";
$trimmed = ltrim($text);
// $trimmed = "These are a few words :) ...  "
$trimmed = ltrim($text," t.");
// $trimmed = "These are a few words :) ...  "
$clean = ltrim($binary,"0x00..0x1F");
// trim the ASCII control characters at the beginning of $binary 
// (from 0 to 31 inclusive)

?>

Right - rtrim() function
<?php

$text = "ttThese are a few words :) ...  ";
$trimmed = rtrim($text);
// $trimmed = "ttThese are a few words :) ..."
$trimmed = rtrim($text," t.");
// $trimmed = "ttThese are a few words :)"
$clean = rtrim($binary,"0x00..0x1F");
// trim the ASCII control characters at the end of $binary 
// (from 0 to 31 inclusive)

?>