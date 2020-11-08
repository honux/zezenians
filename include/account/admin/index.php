<?php

if ( !$account->isAdmin() )
{
	include (FILE_PATH.'include/general/other/404.php');
	return;
}

include( FILE_PATH.'include/database/rss_generator.php');

$notice = new News();
$poll = new Poll();

if ( isset($_GET['act']) )
{
	switch($_GET['act'])
	{
		case 'home':
			include (FILE_PATH.'include/account/admin/home.php');
		break;

		case 'add_news':
			if ( isset($_POST['new_news']) && $_POST['new_news'] == 1 )
			{
				$notice->Add();
			}
			include (FILE_PATH.'include/account/admin/add_news.php');
		break;

		case 'edit_news':
			if ( isset($_POST['edit_news']) && $_POST['edit_news'] == 1 )
			{
				$notice->Update( array( 'title' => trim($_POST['title']), 'type' => $_POST['type'], 'lang' => $_POST['lang'], 'notice' => nl2br($_POST['notice']) ), array( 'id' => $_GET['id'] ) );
			}
			include (FILE_PATH.'include/account/admin/edit_news.php');
		break;
		
		case 'add_poll':
			if ( isset($_POST['new_poll']) && $_POST['new_poll'] == 1 )
			{
				$poll->Add();
			}
			include (FILE_PATH.'include/account/admin/add_poll.php');
		break;

		default:
			include (FILE_PATH.'include/general/other/404.php');
		break;
	}
}
else
{
	include (FILE_PATH.'include/account/admin/home.php');
}

?>
