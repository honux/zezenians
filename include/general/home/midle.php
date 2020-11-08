<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<link rel="stylesheet" href="http://zezenians.com/css/content.css" type="text/css" />

	<script type="text/javascript" src="http://zezenians.com/js/midle.js"></script>
	
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="Description" content="Zezenia Fan Site" />
	<meta name="keywords" content="Zezenia, Fan Site, Tutorials, Downloads, Game, On-line" />
	<meta name="author" content="Honux" />

</head>
<body onload="ShowRMenu();checkHeight('middle');" onunload="HideRMenu();">

<div id="pheight" class="cbody">

	<div class="clocal"><?php print($lang['mdl_general']); ?> <img src="http://images.zezenians.com/lmenu.gif" style="padding-bottom: 1px;" alt=""/> <?php print($lang['mdl_homepage']); ?></div>

	<div class="clbar" style="width: 104%;"><span class="cltitle"><?php print($lang['mdl_home']); ?></span></div>
	<?php
		$query = "SELECT * FROM `news` WHERE lang = '".$lang['lang'][0]."' AND `date` < '".time()."' ORDER BY `date` desc LIMIT 5";
		$MySQL = new MySQL();
		$sql = $MySQL->myQuery($query);

		if ($sql === false)
		{
			$error = $MySQL->getMessage();
			die($error);
		}
		else if ( mysql_num_rows( $sql ) > 0 )
		{
			while($news = mysql_fetch_array( $sql ))
			{
				echo '<div class="cnews">';
				echo '<div class="cnbar"><a href="?mod=archive&id='.$news['id'].'" class="cntitle">'.stripslashes($news['title']).'</a>';
				switch( $news['type'] )
				{
					case '1':
						echo '<div style="float:right;" class="cnweb">Zezenians</div>';
					break;

					case '2':
						echo '<div style="float:right;" class="cnzezenia">Zezenia</div>';
					break;

					case '3':
						echo '<div style="float:right;" class="cnoff">Off-Topic</div>';
					break;
				}
				echo '</div>';
				echo '<div class="cnauthor">'.$news['author'].' at '.date('d.m.Y - g:i A', $news['date'] ).'</div>';
				echo '<div class="cncontent">'.stripslashes($news['notice']).'</div>';
				echo '</div>';
			}
		}
	?>

	<div class="cnabar">
		<center><img src="http://images.zezenians.com/fiocinza.jpg" alt="" style="width: 98%;"/></center>
		<a href="?mod=archive"><?php print($lang['mdl_archive']); ?></a>
	</div>
</div>

</body>
</html>
