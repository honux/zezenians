<?php

	function br2nl($text)
	{
	    return preg_replace( '!<br.*>!iU', "", $text );
	}
	
	$id = "";
	if ( isset($_GET['id']) )
	{
		$id = $_GET['id'];
	}
?>
<html>

<head>
	<script language="JavaScript">
	function redir (selSelectObject)
	{
		if(selSelectObject.options[selSelectObject.selectedIndex].value != "")
		{ 
			location.href=selSelectObject.options[selSelectObject.selectedIndex].value
		}
	}
	</script>
	<link rel="stylesheet" href="http://zezenians.com/css/content.css" type="text/css" />
	<script type="text/javascript" src="http://zezenians.com/js/midle.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta http-equiv="Content-Language" content="en" />	

	<meta name="author" content="Honux" />	
	<meta name="robots" content="noindex,nofollow">
	<meta name="robots" content="noarchive">
</head>

<body onload="checkHeight('middle');" onunload="">
<div id="pheight" class="cbody">

	<div class="clocal">
		<?php print($lang['mdl_account']); ?> <img src="http://images.zezenians.com/lmenu.gif" style="padding-bottom: 1px;" alt=""/> 
		Admin Area <img src="http://images.zezenians.com/lmenu.gif" style="padding-bottom: 1px;" alt=""/> 
		Edit News
	</div>

	<div class="clbar"><span class="cltitle">Edit News</span></div>
	<?php
		if ( $notice->getMessageKind() != -1 )
		{
			switch ( $notice->getMessageKind() )
			{
				case 0:
				case 1:
					echo '<center><font style="font-weight: bold; color: #FF0000;">';
					echo $notice->getMessage();
					echo '</font></center><br>';
				break;
				default:
					echo '<center><font style="font-weight: bold; color: #000000;">';
					echo $notice->getMessage();
					echo '</font></center><br>';
				break;
			}
		}
	?>
	<table>
		<tr>
			<td>
				<select name="pt-br" onChange="redir(this);">
					<option value="" selected>Portuguese News</option>
					<?php
						$query = "SELECT date, title, id FROM `news` WHERE lang = 'br' ORDER BY `date` desc LIMIT 10";
						$MySQL = new MySQL();
						$sql = $MySQL->myQuery($query);
			
						if ($sql === false)
						{
							$error = $MySQL->getError();
							die($error);
						}			
						else if ( mysql_num_rows( $sql ) > 0 )
						{
							$alpha = "";
							while($news = mysql_fetch_array($sql))
							{
								if ( date("d", $news['date']) != $alpha )
								{
									$alpha = date("d", $news['date'] );
									echo "<option disabled>".date('d/m/y', $news['date'] )."</option>";
								}
								$selected = ($id == $news['id'])?'selected':'';
								echo '<option value="?mod=admin&act=edit_news&id='.$news['id'].'" '.$selected.'>'.stripslashes($news['title']).'</option>\n';
							}
						}
					?>
				</select>
			</td>
			<td>
				<select name="en" onChange="redir(this);">
					<option value="" selected>English News</option>
					<?php
						$query = "SELECT date, title, id FROM `news` WHERE lang = 'en' ORDER BY `date` desc LIMIT 10";
						$MySQL = new MySQL();
						$sql = $MySQL->myQuery($query);

						if ($sql === false)
						{
							$error = $MySQL->getError();
							die($error);
						}
						else if ( mysql_num_rows( $sql ) > 0 )
						{
							$alpha = "";
							while($news = mysql_fetch_array($sql))
							{
								if ( date("d", $news['date']) != $alpha )
								{
									$alpha = date("d", $news['date'] );
									echo "<option disabled>".date('d/m/y', $news['date'] )."</option>\n";
								}
								$selected = ($id == $news['id'])?'selected':'';								
								echo '<option value="?mod=admin&act=edit_news&id='.$news['id'].'" '.$selected.'>'.stripslashes($news['title']).'</option>\n';
							}
						}
					?>
				</select>			
			</td>
		</tr>
	</table>
	<?php
		if ( !empty($id) && is_numeric($id) && !(isset($_POST['delete'])))
		{
			$query = "SELECT * FROM `".DB_NEWS."` WHERE id = '".$id."';";
			$MySQL = new MySQL();
			$sql = $MySQL->myQuery($query);
			$enews = array();

			if ($sql === false)
			{
				$error = $MySQL->getError();
				die($error);
			}

			else if ( mysql_num_rows( $sql ) == 1 )
			{
				$enews = mysql_fetch_array($sql);
			}
	?>
	<form action="?mod=admin&act=edit_news&id=<?php echo $id; ?>" method="post">
		<table style="font-size: 12px;">
			<tr>
				<td colspan="2"><br/><input type="checkbox" name="delete" value="1"> <b>Delete this news?</b><br/></td>
			</tr>
			<tr>
				<td> Title </td>
				<td> <input name="title" type="text" maxlength="90" size="50" value="<?php echo stripslashes($enews['title']);?>" class="cuser_input" style="width: 200px;height: 20px;"/> </td>
			</tr>
			<tr>
				<td> Post </td>
				<td> <textarea name="notice" style="font-size: 10px;font-family: 'Trebuchet MS';color: #0B333C;height: 14px;border-bottom: 1px solid #D8DADB;border-right: 1px solid #D8DADB;border-top: 1px solid #7D7F80;border-left: 1px solid #7D7F80;width:200px;height: 100px; width: 450px" rows="15" cols="70"><?php echo br2nl(stripslashes($enews['notice']));?></textarea> </td>
			</tr>
			<tr>
				<td>About</td>
				<td>
					<select name="type">
						<option value="1" <?php echo ( $enews['type'] == 1 )?'selected':''; ?>>Zezenians</option>
						<option value="2" <?php echo ( $enews['type'] == 2 )?'selected':''; ?>>Zezenia</option>
						<option value="3" <?php echo ( $enews['type'] == 3 )?'selected':''; ?>>Off-Topic</option>
					</select>
				</td>
			</tr>			
			<tr>
				<td>Language</td>
				<td>
					<select name="lang">
						<option value="br" <?php echo ( $enews['lang'] == 'br' )?'selected':''; ?>>Portuguese</option>
						<option value="en" <?php echo ( $enews['lang'] == 'en' )?'selected':''; ?>>English</option>
						<option value="fi" <?php echo ( $enews['lang'] == 'fi' )?'selected':''; ?>>Finnish</option>
						<option value="es" <?php echo ( $enews['lang'] == 'es' )?'selected':''; ?>>Spanish</option>
						<option value="se" <?php echo ( $enews['lang'] == 'se' )?'selected':''; ?>>Swedish</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="hidden" name="edit_news" value="1" />
					<input type="submit" value="Send" class="cuser_button" />
				</td>
			</tr>
		</table>
	</form>
	<?php
		}
	?>

	<form action="?" method="get">
	<input type="hidden" name="mod" value="admin" />
	<input type="hidden" name="act" value="edit_news" />
	News ID: <input name="id" type="text" maxlength="5" class="cuser_input" style="height: 20px;"/>
	<br/><input type="submit" value="Edit" class="cuser_button"/>
	</form>

</div>
</body>

</html>