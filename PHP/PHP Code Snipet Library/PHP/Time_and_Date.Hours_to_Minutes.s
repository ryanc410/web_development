<? 
function h2m($hours) { 
   $t = explode(".", $hours); 
   $h = $t[0]; 
   if (isset($t[1])) { 
      $m = $t[1]; 
   } else { 
      $m = "00"; 
   } 
   $mm = ($h * 60) + $m; 
   return $mm; 
} 
?> 