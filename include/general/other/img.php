<?php
// Set the content-type
header("Content-type: image/png");

function randomkeys($length)
{
	$pattern = "0123456789ABCDEFGHIJKLMNOPQRSTUVXYWZ0987654321";
	$key = '';
	for($i=0; $i < $length; $i++)
	{
		$key .= $pattern{rand(0,45)};
	}
	return $key;
}
$texto = randomkeys(4);

$_SESSION['server_code'] = strtolower($texto);

// Create the image
$im = imagecreatetruecolor(100, 40);

// Create some colors
$white = imagecolorallocate($im, 255, 255, 255);
$grey = imagecolorallocate($im, 128, 128, 128);
$black = imagecolorallocate($im, 0, 0, 0);

imagefilledrectangle($im, 0, 0, 99, 39, $white);

// Replace path by your own font path
$font = './css/arial.ttf';


$repeticoes = rand(6,15);
for ( $i = 0; $i < $repeticoes; $i++ )
{
	$cor = imagecolorallocatealpha( $im, rand(10,255), rand(10,255), rand(10,255), 50 );
	imagettftext($im,rand(10,16),rand(-30,30),rand(0,100),rand(40,0),$cor, $font,randomkeys(1));
}

imageline($im,0,40,100,0, $grey);
imageline($im,0,0,100,40, $grey);

// Add some shadow to the text
imagettftext($im, 16, rand(-5,5), 20, rand(30,15), $black, $font, $texto);


$repeticoes = rand(3,10);
for ( $i = 0; $i < $repeticoes; $i++ )
{
	$cor = imagecolorallocatealpha( $im, rand(10,255), rand(10,255), rand(10,255), 50 );
	imageline($im,rand(0,100),rand(0,40),rand(0,100),rand(0,100), $cor);
}

// Using imagepng() results in clearer text compared with imagejpeg()
imagepng($im);
imagedestroy($im);
?> 