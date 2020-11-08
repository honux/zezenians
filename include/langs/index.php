<?php 

	$lang = array();

	$language = "";

	if ( isset($_COOKIE["lang"]) )
	{
		$language = $_COOKIE["lang"];
	}

	$urlParts = explode('.', $_SERVER['HTTP_HOST']);

	if ( $urlParts[0] != "www" && $urlParts[0] != "zezenians" && $urlParts[0] != "" && $urlParts[0] != $language && $urlParts[0] != "beta" )
	{
		$language = $urlParts[0];
	}
	else if ( $language == "" )
	{
		include("include/langs/geoip.inc.php");
		$gi = geoip_open("include/langs/GeoIP.dat",GEOIP_STANDARD);
		$language = strtolower(geoip_country_code_by_addr($gi, getenv('REMOTE_ADDR')));
		geoip_close($gi);
	}

	if (file_exists( "include/langs/".$language.".php" ))
	{
		setcookie("lang", $language, 1893463200, '/', '.zezenians.com');
		include ( "include/langs/".$language.".php" );
	}
	else
	{
		include ( "include/langs/en.php" );
	}
?>