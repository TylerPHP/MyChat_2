<?php
	session_start();
    $sdvig = 5;
    $b = 6;
    //создается картинка
	$image = imagecreatetruecolor(170, 60);
    $white = imagecolorallocate($image, 155, 255, 255);

	$black = imagecolorallocate($image, 0, 0, 0);
	$color = imagecolorallocate($image, 200, 100, 90);
	imagefilledrectangle($image,0,0,399,99,$white);
	$string = "";
	for ($i = 0; $i < $b; $i++) {
    $bykva = chr(rand(97, 122));
    $sdvig += 21;
	imagettftext ($image, 20, rand(-25, 25), $sdvig, 37, $color, "verdana.ttf", $bykva);
	$string .= $bykva;
    imageline($image, rand(0, 25), rand(0, 120), rand(100, 150), rand(0, 60), $black);
    }

	$_SESSION['rand_code'] = $string;
	header("Content-type: image/png");
	imagepng($image);
?>