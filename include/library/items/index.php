<?php


if ( isset($_GET['cat']) )
{
	switch($_GET['cat'])
	{
		case 'amulets':
			include("include/library/items/amulets.php");
		break;
		
		case 'armors':
			include("include/library/items/armors.php");
		break;

		case 'boots':
			include("include/library/items/boots.php");
		break;
		
		case 'bracers':
			include("include/library/items/bracers.php");
		break;

		case 'distance':
			include("include/library/items/distance.php");
		break;

		case 'gauntlets':
			include("include/library/items/gauntlets.php");
		break;		
		
		case 'helmets':
			include("include/library/items/helmets.php");
		break;
		
		case 'legs':
			include("include/library/items/legs.php");
		break;

		case 'rings':
			include("include/library/items/rings.php");
		break;
		
		case 'shields':
			include("include/library/items/shields.php");
		break;
		
		case 'wands':
			include("include/library/items/wands.php");
		break;
		
		case 'weapons':
			include("include/library/items/weapons.php");
		break;
		
		case 'foods':
			include("include/library/items/foods.php");
		break;
		
		default:
			include("include/library/items/items.php");
		break;
	}
}
/*
else if ( isset($_GET['id']) )
{
	if ( file_exists( "include/items/details/".$_GET['id'].".php" ) )
	{
		include("include/items/details/".$_GET['id'].".php");
	}
	else
	{
		include("include/items/items.php");
	}
}
*/
else
{
	include("include/library/items/items.php");
}

exit;
?>
