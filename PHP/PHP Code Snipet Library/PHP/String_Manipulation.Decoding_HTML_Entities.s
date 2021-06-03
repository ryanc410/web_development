<?php
$orig = "I'll "walk" the <b>dog</b> now";

$a = htmlentities($orig);

$b = html_entity_decode($a);

echo $a; // I'll &quot;walk&quot; the &lt;b&gt;dog&lt;/b&gt; now

echo $b; // I'll "walk" the <b>dog</b> now


// For users prior to PHP 4.3.0 you may do this:
function unhtmlentities ($string)
{
    $trans_tbl = get_html_translation_table (HTML_ENTITIES);
    $trans_tbl = array_flip ($trans_tbl);
    return strtr ($string, $trans_tbl);
}

$c = unhtmlentities($a);

echo $c; // I'll "walk" the <b>dog</b> now

?>