<?php

	if ( !$account->isLoged() )
	{
		exit();
	}

?>
<html>

<head>
	<title>Admin Area</title>
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
		Add Poll
	</div>

	<div class="clbar"><span class="cltitle">Add Poll</span></div>
	
	<a href="?mod=admin&act=home">Back to Admin Home</a><br/><br/>
	<?php
		if ( $poll->getMessageKind() != -1 )
		{
			switch ( $poll->getMessageKind() )
			{
				case 0:
				case 1:
					echo '<center><font style="font-weight: bold; color: #FF0000;">';
					echo $poll->getMessage();
					echo '</font></center><br>';
				break;
				default:
					echo '<center><font style="font-weight: bold; color: #000000;">';
					echo $poll->getMessage();
					echo '</font></center><br>';
				break;
			}
		}
	?>
	<i><small>Note: You need to set at least two options!</small></i><br/>
	<b><font color="#FF0000">Check twice before sending it, it's not possible to edit it later!</font></i>
	<form action="?mod=admin&act=add_poll" method="post">
		<input type="hidden" name="new_poll" value="1" />
		<table style="font-size: 12px;">
			<tr>
				<td> Question </td>
				<td> <input name="question" type="text" maxlength="55" size="50" class="cuser_input" style="width: 200px;height: 20px;"/> </td>
			</tr>
			<tr>
				<td> Option 1: </td>
				<td> <input name="a1" type="text" maxlength="30" size="50" class="cuser_input" style="width: 200px;height: 20px;"/> </td>
			</tr>
			<tr>
				<td> Option 2: </td>
				<td> <input name="a2" type="text" maxlength="30" size="50" class="cuser_input" style="width: 200px;height: 20px;"/> </td>
			</tr>
			<tr>
				<td> Option 3: </td>
				<td> <input name="a3" type="text" maxlength="30" size="50" class="cuser_input" style="width: 200px;height: 20px;"/> </td>
			</tr>
			<tr>
				<td> Option 4: </td>
				<td> <input name="a4" type="text" maxlength="30" size="50" class="cuser_input" style="width: 200px;height: 20px;"/> </td>
			</tr>
			<tr>
				<td> Option 5: </td>
				<td> <input name="a5" type="text" maxlength="30" size="50" class="cuser_input" style="width: 200px;height: 20px;"/> </td>
			</tr>
			<tr>
				<td> Option 6: </td>
				<td> <input name="a6" type="text" maxlength="30" size="50" class="cuser_input" style="width: 200px;height: 20px;"/> </td>
			</tr>
			<tr>
				<td> Option 7: </td>
				<td> <input name="a7" type="text" maxlength="30" size="50" class="cuser_input" style="width: 200px;height: 20px;"/> </td>
			</tr>
			<tr>
				<td>Language</td>
				<td>
					<select name="lang">
						<option value="br">Portuguese</option>
						<option value="en" selected>English</option>
						<option value="fi">Finnish</option>
						<option value="es">Spanish</option>
						<option value="se">Swedish</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2"> <input type="submit" value="Send" class="cuser_button"></td>
			</tr>
		</table>
	</form>
</div>
</body>

</html>