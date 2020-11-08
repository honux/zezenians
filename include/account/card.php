<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<link rel="stylesheet" href="http://zezenians.com/css/content.css" type="text/css" />

	<script type="text/javascript" src="http://zezenians.com/js/midle.js"></script>
	
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="Description" content="Zezenia Fan Site" />
	<meta name="keywords" content="Zezenia, Fan Site, Tutorials, Downloads, Game, On-line" />
	<meta name="author" content="Honux" />
	<script language="JavaScript">
	function trim(str){return str.replace(/^\s+|\s+$/g,"");}
	function replace( texto, procurar, novo )
	{
		len = procurar.length;
		pos = texto.indexOf(procurar);
		while (pos > -1)
		{
			parte1 = texto.substring(0, pos);
			parte2 = texto.substring(pos + len , texto.length);
			texto = parte1 + novo + parte2;
			pos = texto.indexOf(procurar);
		}
		return texto;
	}
	function Change_Background ()
	{
		var image = document.getElementById("template");
		var selected = document.getElementById("back").options[document.getElementById("back").selectedIndex].value;
		image.src = "http://images.zezenians.com/cards/"+selected+".png";
	}
	function Create_Image ()
	{
		document.getElementById("result").style.display = "block";
		var selected = document.getElementById("back").options[document.getElementById("back").selectedIndex].value;
		var character = replace(trim(document.getElementById("character").value), ' ','+');
		document.getElementById("bbcode").value = "[url=\"http://zezenians.com/\"][img]http://zezenians.com/?mod=card&char="+character+"&id="+selected+"[/img][/url]"
		document.getElementById("html").value = "<a href=\"http://zezenians.com/\"><img src=\"http://zezenians.com/?mod=card&char="+character+"&id="+selected+"\" /></a>"
		document.getElementById("direct").value = "http://zezenians.com/?mod=card&char="+character+"&id="+selected;
		document.getElementById("card").src = "http://zezenians.com/?mod=card&char="+character+"&id="+selected;
	}
	function hide()
	{
		document.getElementById("result").style.display = "none";
	}
	</script>
</head>
<body onload="checkHeight('middle');hide()" onunload="">

<div id="pheight" class="cbody">

	<div class="clocal">
		<?php print($lang['mdl_account']); ?> <img src="http://images.zezenians.com/lmenu.gif" style="padding-bottom: 1px;" alt=""/> 
		<?php print($lang['mdl_account_card']); ?>
	</div>

	<div class="clbar"><span class="cltitle"><?php print($lang['account_card_title']); ?></span></div>
	
	<table cellspacing="0" cellpadding="4">
		<tr>
			<td><?php print($lang['account_card_name']); ?>:</td>
			<td><input id="character" value="" maxlength="35" type="text" class="cuser_input"></td>
		</tr>
		<tr>
			<td><?php print($lang['account_card_background']); ?>:</td>
				<td>
					<img id="template" src="http://images.zezenians.com/cards/1.png" />
					<br /><br />
					<select name="back" id="back" onchange="Change_Background();">
						<option value="1">Image 1</option>
						<option value="2">Image 2</option>
						<option value="3">Image 3</option>
						<option value="4">Image 4</option>
						<option value="5">Image 5</option>
						<option value="6">Image 6</option>
						<option value="7">Image 7</option>
						<option value="8">Image 8</option>
						<option value="9">Image 9</option>
					</select>
				</td>
		</tr>
		<tr>
			<td></td>
			<td colspan="2">
				<input value="Create" type="button" class="cuser_button" onclick="Create_Image();">
			</td>
		</tr>
	</table>
	<center>
	<div id="result" style="padding: 6px;font-weight: normal;" class="cquote">
			<table>
				<tr>
					<td>BBCode</td>
					<td><input id="bbcode" style="width: 250px;" class="cuser_input" onclick="this.focus();this.select();" value="http://images.zezenians.com/dot.gif" type="text"></td>
				</tr>
				<tr>
					<td>HTML</td>
					<td><input id="html" style="width: 250px;" class="cuser_input" onclick="this.focus();this.select();" value="http://images.zezenians.com/dot.gif" type="text"></td>
				</tr>
				<tr>
					<td>Direct Link</td>
					<td><input id="direct" style="width: 250px;" class="cuser_input" onclick="this.focus();this.select();" value="http://images.zezenians.com/dot.gif" type="text"></td>
				</tr>
			</table>
			<br />
			<img name="card" id="card" src="http://images.zezenians.com/cards/1.png" />
	</div>
	</center>
	<br/>
</div>

</body>
</html>
