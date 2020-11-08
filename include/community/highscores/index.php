<?php

$time = 1;
$world = "Global";
$skill = "experience";

if ( isset($_POST['time']) )
{
	switch($_POST['time'])
	{
		case '1':
			$time = 1;
		break;

		case '2':
			$time = 7;
		break;

		case '3':
			$time = 30;
		break;

		default:
			$time = 1;
		break;
	}
}

if ( isset($_POST['world']) )
{
	switch($_POST['world'])
	{
		case '1':
			$world = "Tipitaka";
		break;

		case '2':
			$world = "Platon";
		break;

		case '3':
			$world = "Global";
		break;

		default:
			$world = "Tipitaka";
		break;
	}
}

if ( isset($_POST['skill']) )
{
	switch($_POST['skill'])
	{
		case '1':
			$skill = "experience";
		break;

		case '2':
			$skill = "melee";
		break;

		case '3':
			$skill = "magiclevel";
		break;

		case '4':
			$skill = "distance";
		break;

		case '5':
			$skill = "defending";
		break;

		default:
			$skill = "experience";
		break;
	}
}

include("include/community/highscores/".$time."_".$world."_".$skill.".php");

?>
