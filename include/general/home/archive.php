<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<link rel="stylesheet" href="http://zezenians.com/css/content.css" type="text/css" />

	<script type="text/javascript" src="http://zezenians.com/js/midle.js"></script>
	
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="Description" content="Zezenia Fan Site" />
	<meta name="keywords" content="Zezenia, Fan Site, Tutorials, Downloads, Game, On-line" />
	<meta name="author" content="Honux" />

	<style type="text/css">
		ul, li
		{
			list-style:none;
			padding-left: 10px;
			padding-bottom: 2px;
		}
	</style>
	
	
</head>
<body onload="checkHeight('middle');" onunload="">

<div id="pheight" class="cbody">

	<?php

	if ( isset($_GET['id']) )
	{
		$handler = new News();
		$news = $handler->Load($_GET['id']);
		
		if ( $news == false || time() < $news['date'] )
		{
			$error = $handler->getMessage();
			die($error);
		}

		echo '<div class="clocal">'.$lang['mdl_general'].' <img src="http://images.zezenians.com/lmenu.gif" style="padding-bottom: 1px;" alt=""/> '.$lang['mdl_archive'].'</div>';
		echo '<div class="clbar"><span class="cltitle">'.$lang['mdl_archive'].'</span></div>';

		echo '<div class="cnews">';
		echo '<div class="cnbar"><a href="#" class="cntitle">'.stripslashes($news['title']).'</a>';
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
	else
	{
		$MySQL = new MySQL();
		echo '<div class="clocal">'.$lang['mdl_general'].' <img src="http://images.zezenians.com/lmenu.gif" style="padding-bottom: 1px;" alt=""/> '.$lang['mdl_archive'].'</div>';
		echo '<div class="clbar"><span class="cltitle">'.$lang['mdl_news_archive'].'</span></div>';

		$month = "";
		
		$query = "SELECT * FROM `news` WHERE lang = '".$lang['lang'][0]."' AND `date` < '".time()."' ORDER BY `date` DESC;";
		$sql = $MySQL->myQuery($query);


		if ($sql === false)
		{
			$error = $MySQL->getMessage();
			die($error);
		}			
		else if ( mysql_num_rows( $sql ) > 0 )
		{
			while($news = mysql_fetch_array($sql))
			{
				if ( $month != date('M', $news['date'] ) )
				{
					if ( $month != "" )
					{
						echo '</ul>';
					}
					echo '<b><big>'.date('m / Y', $news['date'] ).'</big></b><br/>';
					echo '<center><img src="http://images.zezenians.com/fiocinza.jpg" alt="" style="width: 98%;height:1px;"/></center>';
					$month = date('M', $news['date'] );
					echo '<ul>';
				}
				
				echo '<li>';
				echo '<span style="color:#666666;"> '.$lang['lbi_day']." ".date('j', $news['date'] ).' </span>';
				
				switch( $news['type'] )
				{
					case '1':
						echo '<img width="7" height="7" src="http://images.zezenians.com/dot.gif" style="background-color: #37568C;border: 1px solid #203251;"/> ';
					break;
					
					case '2':
						echo '<img width="7" height="7" src="http://images.zezenians.com/dot.gif" style="background-color: #3399CC;border: 1px solid #257094;"/> ';
					break;
					
					case '3':
						echo '<img width="7" height="7" src="http://images.zezenians.com/dot.gif" style="background-color: #AE0000;border: 1px solid #990000;"/> ';
					break;
				}
				echo '<a href="?mod=archive&id='.$news['id'].'">'.stripslashes($news['title']).'</a>';
				echo '</li>';

			}
			echo '</ul>';
		}		
	}
	?>

</div>

</body>
</html>
