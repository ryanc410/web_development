<?php
if (function_exists("imagegif")) {
    header ("Content-type: image/gif");
    imagegif ($im);
}
elseif (function_exists("imagejpeg")) {
    header ("Content-type: image/jpeg");
    imagejpeg ($im, "", 0.5);
}
elseif (function_exists("imagepng")) {
    header ("Content-type: image/png");
    imagepng ($im);
}
elseif (function_exists("imagewbmp")) {
    header ("Content-type: image/vnd.wap.wbmp");
    imagewbmp ($im);
}
else
    die("No image support in this PHP server");
?>