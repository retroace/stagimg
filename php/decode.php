<?php
$sequence = [
    'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',"0","1",'2','3','4','5','6','7','8','9'," ",",", ".", "\"","!", "'", "\n", "(", ")", "?"
];



$image = __DIR__. "/encoded.png";
$encryptionImage = imagecreatefrompng($image);
$imageInfo = getimagesize($image);

$width = imagesx($encryptionImage);
$height = imagesy($encryptionImage);

$text = "";

$totalSequence = count($sequence);

for($x = 0; $x < $width; $x++) {
    for($y = 0; $y < $height; $y++) {
        
        $color = imagecolorat($encryptionImage, $x, $y);
        $colors = imagecolorsforindex($encryptionImage, $color);
        
        
        $text .= $totalSequence < $colors['red'] ? "": $sequence[$colors['red']];
        $text .= $totalSequence < $colors['green'] ? "": $sequence[$colors['green']];
        $text .= $totalSequence < $colors['blue'] ? "": $sequence[$colors['blue']];
    }
}
// Decoded Text
var_dump($text);