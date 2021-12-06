<?php
$sequence = [
    'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',"0","1",'2','3','4','5','6','7','8','9'," ",",", ".", "\"","!", "'", "\n", "(", ")", "?"
];


$text = file_get_contents('./example.txt');



$width = 600;
$height = 600;

$gd = imagecreatetruecolor($width, $height);
$text = strtolower($text);

$textCursor = 0;
$extraLength = strlen($text) + 1;
for($x = 0; $x < $width; $x++) {
    for($y = 0; $y < $height; $y++) {
        $isInsideBound = ($textCursor < strlen($text));
        $r = $isInsideBound ? array_search($text[$textCursor], $sequence) : $extraLength;
        $g = $isInsideBound ? array_search($text[$textCursor + 1], $sequence) : $extraLength;
        $b = $isInsideBound ? array_search($text[$textCursor + 2], $sequence) : $extraLength;
        
        $color = imagecolorallocate($gd, $r, $g,  $b);
        imagesetpixel($gd, $x,$y, $color);
        
        
        $textCursor += 3;
    }
}

 
header('Content-Type: image/png');
imagepng($gd, "encoded.png");
imagedestroy($gd);
