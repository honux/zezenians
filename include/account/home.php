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
		<?php print($lang['mdl_account_home']); ?>
	</div>

	<div class="clbar"><span class="cltitle"><?php print($lang['mdl_account_welcome']); ?></span></div>
	<?php
	if ( $account->isAdmin() )
	{
	?>
		<a href="?mod=admin&act=home">
			<div class="cibox" style="width:260px;height:50px;text-align: left;padding: 5px;border: #CCCCCC solid 1px;">
				<table>
					<tr>
						<td style="width: 50px;"><img src="http://images.zezenians.com/dot.gif" style="width: 40px;height: 40px;"></td>
						<td>
							<b><font style="font-size: 12px;"><?php print($lang['account_home_admin_area']); ?></font></b>
							<br/><?php print($lang['account_home_admin_area_desc']); ?>
						</td>
					</tr>
				</table>
			</div>
		</a>
	<?php
	}
	?>
	<a href="?mod=user&act=card">
		<div class="cibox" style="width:260px;height:50px;text-align: left;padding: 5px;border: #CCCCCC solid 1px;">
			<table>
				<tr>
					<td style="width: 50px;"><img src="http://images.zezenians.com/dot.gif" style="width: 40px;height: 40px;"></td>
					<td>
						<b><font style="font-size: 12px;"><?php print($lang['account_home_image']); ?></font></b>
						<br/><?php print($lang['account_home_image_desc']); ?>
					</td>
				</tr>
			</table>
		</div>
	</a>
	<a href="?mod=user&act=logout">
		<div class="cibox" style="width:260px;height:50px;text-align: left;padding: 5px;border: #CCCCCC solid 1px;">
			<table>
				<tr>
					<td style="width: 50px;"><img src="http://images.zezenians.com/dot.gif" style="width: 40px;height: 40px;"></td>
					<td>
						<b><font style="font-size: 12px;"><?php print($lang['account_home_logout']); ?></font></b>
						<br/><?php print($lang['account_home_logout_desc']); ?>
					</td>
				</tr>
			</table>
		</div>
	</a>
	<div style="clear: both;"> </div>
</div>

</body>
</html>
