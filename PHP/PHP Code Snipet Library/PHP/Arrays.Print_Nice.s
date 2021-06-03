<?php 
// the simple function 
function print_rn($ar) { 
    echo "<pre>"; 
        print_r($ar); 
    echo "</pre>"; 
} 

// array example 
$ar = array("p0144", 
            "p0145", 
            "p0146", 
            "p0159", 
            "p0166", 
            "p0167", 
            "p0171", 
            "p0172", 
            "p0173", 
            "p0174", 
            "p0176", 
            "p0191", 
            "p0194", 
            "p0197", 
            "p0198"); 

// pass array to the fuction 
print_rn($ar); 
?>