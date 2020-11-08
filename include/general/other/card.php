<?php

if ( !isset($_GET['id']) || $_GET['id'] > 9 || $_GET['id'] < 1 || !isset($_GET['char']) || empty($_GET['char']) || strlen($_GET['char']) > 35 )
{
	exit();
}

$insert = false;

$sql = @mysql_pconnect("mysql.zezenians.com", "zez_jujuba", "4po6hi#-iep=uSWluSp5");
if ( !$sql )
{
	exit();
}
if ( !@mysql_select_db("zezenians", $sql) )
{
	exit();
}

$query = "SELECT * FROM `cards` WHERE `player` = '".mysql_real_escape_string($_GET['char'])."' AND `card` = '".mysql_real_escape_string($_GET['id'])."';";
$result = @mysql_query( $query );
if ( !$result )
{
	$insert = true;
}

$player = mysql_fetch_array($result);

if ( $player['update']+43200 < time() )
{
	$query = "DELETE FROM `cards` WHERE `player` = '".mysql_real_escape_string($_GET['char'])."' AND `card` = '".mysql_real_escape_string($_GET['id'])."';";
	$result = @mysql_query( $query );
	$insert = true;
}


if ( $insert == true )
{
	$query = "INSERT INTO `cards` (`player`, `card`, `update`) VALUES";
	$handle = curl_init();

	// We can't get a cached page, or it won't update!
	curl_setopt( $handle, CURLOPT_FRESH_CONNECT, true );
	// Set the timeout to 30 seconds
	curl_setopt( $handle, CURLOPT_CONNECTTIMEOUT, 15 );
	curl_setopt( $handle, CURLOPT_TIMEOUT, 15 );
	// To return the content of the page as text
	curl_setopt( $handle, CURLOPT_RETURNTRANSFER, true );
	// Ok, so lets set now to connect to Real Zezenia
	curl_setopt( $handle, CURLOPT_URL, "http://www.zezeniaonline.com/community/character/".preg_replace( '/ /', "+", $_GET['char'] ).".html" );

	// Everything set, so lets connect
	$page = curl_exec( $handle );

	// End the session
	curl_close( $handle );

	$matches = array();

	if ( preg_match( '/A character with/i', $page ) )
	{
		exit();
	}
	preg_match_all( '/World:<\/td>.*?td>(.*?)<\/td.*?Level:<\/td.*?<td>(.*?)<\/td.*?Class:<\/td.*?<td>(.*?)<\/td/i', $page, $matches );
	
	$query .= " ( '".$_GET['char']."', '".$_GET['id']."', '".time()."' );";
	// Update the Database
	@mysql_query( $query );
	
	//$img = imagecreatefrompng("home/honux/zezenians/images/cards/".$_GET['id'].".png");
	$img = imagecreatefrompng("http://images.zezenians.com/cards/".$_GET['id'].".png");

	// Create some colors
	$white = imagecolorallocate($img, 255, 255, 255);
	$grey = imagecolorallocate($img, 128, 128, 128);
	$black = imagecolorallocate($img, 0, 0, 0);

	// Replace path by your own font path
	$font = '/home/honux/zezenians/site/css/arialbd.ttf';

	// Add some shadow to the text
	imagettftext($img, 12, 0, 73, 23, $black, $font, ucwords(strtolower($_GET['char'])));

	imagettftext($img, 12, 0, 73, 46, $black, $font, $matches[2][0]);

	imagettftext($img, 12, 0, 73, 69, $black, $font, $matches[3][0]);

	imagettftext($img, 12, 0, 73, 92, $black, $font, $matches[1][0]);

	// Using imagepng() results in clearer text compared with imagejpeg()
	imagepng( $img, "/home/honux/zezenians/cards/".strtolower($_GET['char'])."_".$_GET['id'].".png", 9, PNG_ALL_FILTERS );
	imagedestroy( $img );
}

header("Content-type: image/png");
include ( "/home/honux/zezenians/cards/".strtolower($_GET['char'])."_".$_GET['id'].".png" );
?>