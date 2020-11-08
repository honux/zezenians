<?php

$poll = new Poll();

if ( isset($_GET['act']) )
{
	switch($_GET['act'])
	{

		case 'add':
			$poll->Vote();
			include (FILE_PATH."include/general/polls/result.php");
		break;

		case 'result':
			include (FILE_PATH."include/general/polls/result.php");
		break;
		
		default:
			include (FILE_PATH."include/general/polls/".$lang['lang'][0].".php");
		break;
	}
}
else
{
	include (FILE_PATH."include/general/polls/".$lang['lang'][0].".php");
}

?>
