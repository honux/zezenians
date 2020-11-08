<?php

if ( isset($_GET['act']) )
{
	switch($_GET['act'])
	{
		case 'register':
			if ( $account->Add() )
			{
				include ('include/account/login.php');
			}
			else
			{
				include ('include/account/new.php');
			}
		break;

		case 'new':
			include ('include/account/new.php');
		break;

		case 'login':
			if ( $account->Login() )
			{
				include ('include/account/home.php');
			}
			else
			{
				include ('include/account/login.php');
			}
		break;

		case 'logout':
			$account->Logout();
			include ('include/account/login.php');
		break;

		case 'card':
			include ('include/account/card.php');
		break;
		
		default:
			if ( $account->isLoged() )
			{
				include ('include/account/home.php');
			}
			else
			{
				include ('include/account/login.php');
			}
		break;
	}
}
else
{
	if ( $account->isLoged() || $account->Login() )
	{
		include ('include/account/home.php');
	}
	else
	{
		include ('include/account/login.php');
	}
}

?>
