<?php
// Run: php generate-screenshot.php
// Generates screenshot.png for WordPress theme preview
$w = 1200; $h = 900;
$img = imagecreatetruecolor($w, $h);
$bg   = imagecolorallocate($img, 20, 20, 20);
$card = imagecolorallocate($img, 30, 30, 30);
$purp = imagecolorallocate($img, 112, 59, 247);
$white= imagecolorallocate($img, 255, 255, 255);
$grey = imagecolorallocate($img, 153, 153, 153);

imagefill($img, 0, 0, $bg);

// Nav bar
imagefilledrectangle($img, 0, 0, $w, 60, $card);
imagestring($img, 5, 30, 20, 'Estatein', $white);
imagefilledrectangle($img, $w-160, 18, $w-30, 42, $purp);
imagestring($img, 3, $w-148, 24, 'Contact Us', $white);

// Hero
imagestring($img, 5, 30, 90, 'Discover Your Dream Property', $white);
imagestring($img, 3, 30, 120, 'with Estatein', $white);
imagestring($img, 2, 30, 150, 'Find your perfect home effortlessly.', $grey);
imagefilledrectangle($img, 30, 180, 180, 210, $purp);
imagestring($img, 3, 50, 188, 'Browse Properties', $white);

// Property cards (3)
for ($i=0; $i<3; $i++) {
  $x = 30 + $i * 260;
  imagefilledrectangle($img, $x, 260, $x+240, 480, $card);
  imagefilledrectangle($img, $x, 260, $x+240, 360, imagecolorallocate($img, 40,40,40));
  imagefilledrectangle($img, $x+8, 268, $x+80, 285, $purp);
  imagestring($img, 2, $x+10, 270, 'For Sale', $white);
  imagestring($img, 3, $x+10, 375, 'Property Name', $white);
  imagestring($img, 2, $x+10, 400, '123 Main Street, City', $grey);
  imagestring($img, 3, $x+10, 450, '$550,000', $white);
}

imagepng($img, __DIR__ . '/screenshot.png');
imagedestroy($img);
echo "screenshot.png created\n";
