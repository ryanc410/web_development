<? 
// An alternative to print_r, this function will print an array 
// with HTML and Syntax highlighting. Could easily be extended to
// support 3D arrays.
// USAGE: echo f_arr($_SESSION);

function f_arr($arr) {
    $fr = "<font color=red size=1>";
    $fg = "<font color=green size=1>";
    $fb = "<font color=blue size=1>";
    $fk = "<font color=black size=1>";
    $fe = "</font>";
    $l = "$fg [ $fe";
    $r = "$fg ] $fe";
    $a = "$fk => $fe";
    $out = "";
    foreach($arr as $k=>$v){
        $out[] = $l.$fb.$k.$fe.$r.$a.$fr.$v.$fe;
    }
    if(is_array($out)) {
        return implode("<br />", $out);
    } else {
        return false;
    }
}
?>