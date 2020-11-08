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
<body onload="checkHeight('middle');" onunload="">

<div id="pheight" class="cbody">

	<div class="clocal">
		<?php print($lang['mdl_account']); ?> <img src="http://images.zezenians.com/lmenu.gif" style="padding-bottom: 1px;" alt=""/> 
		<?php print($lang['mdl_account_login']); ?>
	</div>

	<div class="clbar"><span class="cltitle"><?php print($lang['mdl_account_login']); ?></span></div>
	
			<form action="?mod=user&act=login" method="post">
			<?php
				if ( $account->getMessageKind() != -1 )
				{
					switch ( $account->getMessageKind() )
					{
						case 0:
						case 1:
							echo '<center><font style="font-weight: bold; color: #FF0000;">';
							echo $account->getMessage();
							echo '</font></center><br><br>';
						break;
						default:
							echo '<center><font style="font-weight: bold; color: #000000;">';
							echo $account->getMessage();
							echo '</font></center><br><br>';
						break;
					}
				}
			?>
			<table id="login" cellspacing="0" cellpadding="4">
				<tr>
					<td><?php print($lang['mdl_login_user']); ?>:</td>
					<td><input name="login" value="" type="text" class="cuser_input"></td>
				</tr>
				<tr>
					<td><?php print($lang['mdl_login_pass']); ?>:</td>
					<td><input name="pass" value="" type="password" class="cuser_input"></td>
				</tr>
				<tr>
					<td>Remember me:</td>
					<td><input type="checkbox" name="stay_logged" value="1" /><br /></td>
				</tr>
				<tr>
					<td></td>
					<td colspan="2">
						<input value="Login" type="submit" class="cuser_button">
					</td>
				</tr>
			</table>
		</form>
		<br/>
		<?php print($lang['mdl_login_new']); ?> <a href="?mod=user&act=new"><?php print($lang['mdl_login_new_link']); ?></a>
</div>

</body>
</html>
