<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<link rel="stylesheet" href="http://zezenians.com/css/content.css" type="text/css" />

	<script type="text/javascript" src="http://zezenians.com/js/midle.js"></script>
	
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="Description" content="Zezenia Fan Site" />
	<meta name="keywords" content="Zezenia, Fan Site, Tutorials, Downloads, Game, On-line" />
	<meta name="author" content="Honux" />
	<script type="text/javascript" language="javascript">
	function newCaptcha() 
	{
	    document.captcha_img.src = "?mod=captcha&id="+(Math.random());
	}
	var accountHttp;
	function GetXmlHttpObject()
	{
		var xmlHttp=null;
		try
		{
			xmlHttp=new XMLHttpRequest();
		}
		catch (e)
		{
			try
			{
				xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
			}
			catch (e)
			{
				xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
		}
		return xmlHttp;
	}

	function checkAccount()
	{
		if(document.getElementById("login").value=="")
		{
			document.getElementById("acc_name_check").innerHTML = '<br/><?php echo $lang['account_new_newuser'];?>';
			document.getElementById("login").style.border = '1px solid #D8DADB';
			document.getElementById("login").style.borderTop = '1px solid #7D7F80';
			document.getElementById("login").style.borderLeft = '1px solid #7D7F80';
			return;
		}
		accountHttp=GetXmlHttpObject();
		if (accountHttp==null)
		{
			return;
		}
		var account = document.getElementById("login").value;
		var url="js/check_account.php?type=1&account=" + account + "&uid="+Math.random();
		accountHttp.onreadystatechange=AccountStateChanged;
		accountHttp.open("GET",url,true);
		accountHttp.send("");
	}

	function AccountStateChanged() 
	{ 
		if (accountHttp.readyState==4)
		{ 
			if ( accountHttp.responseText == '0' ) // Illegal Characters
			{
				document.getElementById("acc_name_check").innerHTML = '<img src="http://images.zezenians.com/del.png" /><br/><b><font color="#FF0000"><?php echo $lang['classes_account_add_login_invalid'];?></font></b>';
				document.getElementById("login").style.border = '1px solid #ff0000';
			}
			else if ( accountHttp.responseText == '1' ) // Name in use
			{
				document.getElementById("acc_name_check").innerHTML = '<img src="http://images.zezenians.com/del.png" /><br/><b><font color="#FF0000"><?php echo $lang['classes_account_add_login_in_use'];?></font></b>';
				document.getElementById("login").style.border = '1px solid #ff0000';
			}
			else
			{
				document.getElementById("acc_name_check").innerHTML = '<img src="http://images.zezenians.com/ok.png" /><br/><b><font color="#005500">OK</font></b>';
				document.getElementById("login").style.border = '1px solid #007700';
			}
			//document.getElementById("acc_name_check").innerHTML=accountHttp.responseText;
		}
	}
	function validate_required(field,alerttxt)
	{
		with (field)
		{
			if (value==null||value==""||value==" ")
			{
				alert(alerttxt);
				return false;
			}
			else 
			{
				return true;
			}
		}
	}
	function validate_email(field,alerttxt)
	{
		with (field)
		{
			apos=value.indexOf("@");
			dotpos=value.lastIndexOf(".");
			if (apos<1||dotpos-apos<2)
			{
				alert(alerttxt);
				return false;
			}
			else 
			{
				return true;
			}
		}
	}
	function validate_form(thisform)
	{
		with (thisform)
		{
			if (validate_required(login,"<?php echo $lang['classes_account_add_empty'];?>")==false)
			{
				login.focus();
				return false;
			}
			if (validate_required(pass,"<?php echo $lang['classes_account_add_empty'];?>")==false)
			{
				pass.focus();
				return false;
			}
			if (validate_required(pass2,"<?php echo $lang['classes_account_add_empty'];?>")==false)
			{
				pass2.focus();
				return false;
			}
			if (pass.value!=pass2.value)
			{
				alert("<?php echo $lang['classes_account_add_dif_pass'];?>");
				return false;
			}
			if (validate_required(mail,"<?php echo $lang['classes_account_add_empty'];?>")==false)
			{
				mail.focus();
				return false;
			}
			if (validate_email(mail,"<?php echo $lang['classes_account_add_email_invalid'];?>")==false)
			{
				mail.focus();
				return false;
			}
			if (mail.value!=mail2.value)
			{
				alert("<?php echo $lang['classes_account_add_dif_mail'];?>");
				return false;
			}
			if (validate_required(captcha,"<?php echo $lang['classes_account_add_empty'];?>")==false)
			{
				captcha.focus();
				return false;
			}
		}
	}
	</script>
</head>
<body onload="checkHeight('middle');" onunload="">

<div id="pheight" class="cbody">

	<div class="clocal">
		<?php print($lang['mdl_account']); ?> <img src="http://images.zezenians.com/lmenu.gif" style="padding-bottom: 1px;" alt=""/> 
		<?php print($lang['mdl_account_login']); ?>
	</div>

	<div class="clbar"><span class="cltitle"><?php print($lang['mdl_account_new']); ?></span></div>
	
		<form action="?mod=user&act=register" onsubmit="return validate_form(this)" method="post">
			<?php
				if ( $account->getMessageKind() == 1 )
				{
					echo '<center><font style="font-weight: bold; color: #FF0000;">';
					echo $account->getMessage();
					echo '</font></center><br><br>';
				}
			?>
			<table cellspacing="0" cellpadding="4">
				<tr>
					<td><?php print($lang['mdl_login_user']); ?>:</td>
					<td><input id="login" name="login" value="" type="text" class="cuser_input" onkeyup="checkAccount();"><span id="acc_name_check"><br/><?php echo $lang['account_new_newuser'];?></span></td>
				</tr>
				<tr>
					<td><?php print($lang['mdl_login_pass']); ?>:</td>
					<td><input name="pass" value="" type="password" class="cuser_input"></td>
				</tr>
				<tr>
					<td><?php print($lang['mdl_login_confirm_pass']); ?>:</td>
					<td><input name="pass2" value="" type="password" class="cuser_input"></td>
				</tr>
				<tr>
					<td><?php print($lang['mdl_login_email']); ?>:</td>
					<td><input name="mail" value="" type="text" class="cuser_input" style="width: 200px"></td>
				</tr>
				<tr>
					<td><?php print($lang['mdl_login_confirm_email']); ?>:</td>
					<td><input name="mail2" value="" type="text" class="cuser_input" style="width: 200px"></td>
				</tr>
				<tr>
					<td>Captcha:</td>
					<td><img src="?mod=captcha" name="captcha_img" id="captcha_img"><br/><a href="#" onclick="newCaptcha()" style="font-size: 10px; font-style: italic;text-decoration: none;font-weight: bold;">I can't read this captcha!</a></td>
				</tr>
				<tr>
					<td></td>
					<td><small><i><?php print($lang['mdl_login_captcha_desc']); ?></i></small><br/><input name="captcha" value="" type="text" class="cuser_input"></td>
				</tr>

				<tr>
					<td></td>
					<td colspan="2">
						<input value="Create" type="submit" class="cuser_button"/>&nbsp; &nbsp;<input type="reset" value="Clear" class="cuser_button"/>
					</td>
				</tr>
			</table>
		</form>
		<br/>
</div>

</body>
</html>
