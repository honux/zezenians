<?php
if (@extension_loaded('zlib') && !headers_sent())
{
   ob_start('ob_gzhandler');
}

session_start();

include_once ('include/database/config.php');

include_once (FILE_PATH.'include/langs/index.php');
include_once (FILE_PATH.'include/database/classes.php');

$account = new Account();

if ( isset($_GET['mod']) )
{
	switch($_GET['mod'])
	{

		case 'admin':
			include(FILE_PATH."include/account/admin/index.php");
		break;
	
		case 'user':
			include(FILE_PATH."include/account/index.php");
		break;

		case 'captcha':
			include(FILE_PATH."include/general/other/img.php");
		break;

		// General
		case 'home':
			include(FILE_PATH."include/general/home/midle.php");
		break;

		case 'archive':
			include(FILE_PATH."include/general/home/archive.php");
		break;

		case 'staff':
			include(FILE_PATH."include/general/staff/index.php");
		break;

		case 'downloads':
			include(FILE_PATH."include/general/download/index.php");
		break;

		case 'poll':
			include(FILE_PATH."include/general/polls/index.php");
		break;

		// Library
		case 'items':
			include(FILE_PATH."include/library/items/index.php");
		break;

		case 'creatures':
			include(FILE_PATH."include/library/creatures/creatures.php");
		break;

		case 'spells':
			include(FILE_PATH."include/library/spells/index.php");
		break;

		case 'exp':
			include(FILE_PATH."include/library/exp_table/index.php");
		break;

		case 'map':
			include(FILE_PATH."include/library/map/index.php");
		break;

		// Community
		case 'highscores':
			include(FILE_PATH."include/community/highscores/index.php");
		break;
	
		case 'card':
			include(FILE_PATH."include/general/other/card.php");
		break;
	
		default:
			include(FILE_PATH."include/general/home/index.php");
		break;
	}
}
else
{
	include(FILE_PATH."include/general/home/index.php");
}

exit;
?>
