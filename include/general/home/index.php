<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Zezenians</title>

	<link rel="stylesheet" type="text/css" href="http://zezenians.com/css/style.css" />
	
	<script type="text/javascript" src="http://zezenians.com/js/scripts.js"></script>
	
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta http-equiv="Content-Language" content="<?php print($lang['lang'][0]); ?>" />
	<?php
		for ( $i = 1; isset($lang['lang'][$i]); $i++ )
		{
			print ( '<link href="http://'.$lang['lang'][$i].'.zezenians.com/" hreflang="'.$lang['lang'][$i].'" rel="alternate" />' );
		}
	?>

	<meta name="Description" content="Zezenia Fan Site" />
	<meta name="keywords" content="Zezenia, Fan Site, Tutorials, Downloads, Game, On-line, Quest, Screenshoot" />
	<meta name="author" content="Honux" />
	<meta name="reply-to" content="webmaster@zezenians.com" />
	<meta name="robots" content="index,nofollow" />
</head>

<body onload="">

<div class="body">

	<div id="logo" class="logo">
		<img src="http://images.zezenians.com/logo_.png" alt=""/>
	</div>
	
	<div id="center">
		<div id="lmenu" class="lmenu" align="center">

		<div class="lmlang" onclick="ShowLangBox('lmlbox');"></div>

		<div id="lmlbox" class="lmlbox">
			<ul>
					<li>
						<a href="http://en.zezenians.com/" hreflang="en" title="English" lang="en">
							<img src="http://images.zezenians.com/flags/us.gif" alt="English" />English
						</a>
					</li>
					<li>
						<a href="http://br.zezenians.com/" hreflang="pt-br" title="Português" lang="pt-br">
							<img src="http://images.zezenians.com/flags/br.gif" alt="Português" />Português
						</a>
			</ul>		
		</div>
		
			<div id="Menu1" class="lmenu_">
				<div class="lmenu_title" align="center"><?php print($lang['lm_general']); ?></div>
				<a href="?mod=home" class="lmenu_link" id="l1" target="middle" onclick="selectItem( this.id );"><?php print($lang['lm_homepage']); ?></a><br/>
				<a href="?mod=downloads" class="lmenu_link" id="l2" target="middle" onclick="selectItem( this.id );"><?php print($lang['lm_downloads']); ?></a><br/>
				<a href="?mod=staff" class="lmenu_link" id="l3" target="middle" onclick="selectItem( this.id );"><?php print($lang['lm_staff']); ?></a><br/>
				<a href="?mod=archive" class="lmenu_link" id="l4" target="middle" onclick="selectItem( this.id );"><?php print($lang['lm_archive']); ?></a><br/>
				<a href="?mod=user" class="lmenu_link" id="l5" target="middle" onclick="selectItem( this.id );"><?php print($lang['lm_myacc']); ?></a><br/>
			</div>
			<div id="Menu2" class="lmenu_">
				<div class="lmenu_title" align="center"><?php print($lang['lm_library']); ?></div>
				<a href="?mod=items" class="lmenu_link" id="l6" target="middle" onclick="selectItem( this.id );"><?php print($lang['lm_items']); ?></a><br/>
				<a href="?mod=creatures" class="lmenu_link" id="l7" target="middle" onclick="selectItem( this.id );"><?php print($lang['lm_creatures']); ?></a><br/>
				<a href="#" class="lmenu_link" id="l8" onclick="selectItem( this.id );"><?php print($lang['lm_spell_list']); ?></a><br/>
				<a href="?mod=exp" class="lmenu_link" id="l10" target="middle" onclick="selectItem( this.id );"><?php print($lang['lm_exp_table']); ?></a><br/>
			</div>
			<div id="Menu3" class="lmenu_">
				<div class="lmenu_title" align="center"><?php print($lang['lm_community']); ?></div>
				<a href="#" class="lmenu_link" id="l11" onclick="selectItem( this.id );"><?php print($lang['lm_screenshots']); ?></a><br/>
				<a href="?mod=highscores" class="lmenu_link" id="l12" target="middle" onclick="selectItem( this.id );"><?php print($lang['lm_highscores']); ?></a><br/>
				<a href="#" class="lmenu_link" id="l13" onclick="selectItem( this.id );"><?php print($lang['lm_interviews']); ?></a><br/>
			</div>
		</div>
		<div id="content" class="content">
			<?php
				$location = "?mod=home";
				if ( isset($_GET['redir']) )
				{
					$location = "?mod=";
					foreach($_GET  as $key => $value) 
					{
						if ( $key == "redir" )
						{
							$location .= $value;
						}
						else
						{
							$location .= "&".$key."=".$value;
						}
					}
				}
			?>
			<iframe src="<?php echo $location; ?>" id="middle" name="middle" width="100%" height="0px" frameborder="0" scrolling="no" style="height: 0px;"></iframe>
		</div>
		<div id="rmenu" class="rmenu">
			<div id="Rmenu0" class="rmenu_">
				<div class="rmenu_title">Poll</div>
					<iframe src="?mod=poll" id="poll_frame" name="poll_frame" width="100%" height="100%" frameborder="0" scrolling="no" style="height: 100%;"></iframe>
			</div>
			<div id="Rmenu1" class="rmenu_">
				<div class="rmenu_title"><?php print($lang['rm_calculator']); ?></div>
				<div class="rmenu_content">
					<?php print($lang['rm_current_exp']); ?><br/>
					<input id="rmenu_ccexp" type="text" maxlength="15" class="rmenu_calci" onkeyup="javascript:this.value=this.value.replace(/[^0-9]/g, '');" /><br/>
					<?php print($lang['rm_wanted_lvl']); ?><br/>
					<input id="rmenu_clvl" type="text" maxlength="15" class="rmenu_calci" onkeyup="javascript:this.value=this.value.replace(/[^0-9]/g, '');" /><br/>
					<input type="button" class="rmenu_calcb" value="<?php print($lang['rm_calculate']); ?>" name="<?php print($lang['rm_calculate']); ?>" onclick="Calc();" /><br/>
					<input id="rmenu_cresult" type="text" maxlength="15" class="rmenu_calci" onkeyup="javascript:this.value=this.value.replace(/[^0-9]/g, '');" style="display: none;" readonly="readonly" /><br/>
				</div>
			</div>
			<div id="Rmenu2" class="rmenu_">
				<div class="rmenu_title"><?php print($lang['rm_links']); ?></div>
				<div class="rmenu_content">
					<a href="http://www.zezeniaonline.com/" class="rmenu_link" target="_blank">Zezenia Online</a><br/>
					<a href="http://wiki.zezenians.com/" class="rmenu_link" target="_blank">Zezenia Wiki</a><br/>
					<a href="http://www.zezenium.com/" class="rmenu_link" target="_blank">Zezenium</a><br/>
				</div>
			</div>	
			<div id="Rmenu3" class="rmenu_">
				<div class="rmenu_title"><?php print($lang['rm_ads']); ?></div>
				<div class="rmenu_content">
					<!-- Beginning of Project Wonderful ad code: -->
					<!-- Ad box ID: 40628 -->
					<script type="text/javascript">
					<!--
					var pw_d=document;
					pw_d.projectwonderful_adbox_id = "40628";
					pw_d.projectwonderful_adbox_type = "4";
					pw_d.projectwonderful_foreground_color = "";
					pw_d.projectwonderful_background_color = "";
					//-->
					</script>
					<script type="text/javascript" src="http://www.projectwonderful.com/ad_display.js"></script>
					<noscript><map name="admap40628" id="admap40628"><area href="http://www.projectwonderful.com/out_nojs.php?r=0&amp;c=0&amp;id=40628&amp;type=4" shape="rect" coords="0,0,125,125" title="" alt="" target="_blank" /><area href="http://www.projectwonderful.com/out_nojs.php?r=1&amp;c=0&amp;id=40628&amp;type=4" shape="rect" coords="0,125,125,250" title="" alt="" target="_blank" /></map>
					<table cellpadding="0" border="0" cellspacing="0" width="125" bgcolor="#ffffff"><tr><td><img src="http://www.projectwonderful.com/nojs.php?id=40628&amp;type=4" width="125" height="250" usemap="#admap40628" border="0" alt="" /></td></tr><tr><td bgcolor="#ffffff" colspan="1"><center><a style="font-size:10px;color:#0000ff;text-decoration:none;line-height:1.2;font-weight:bold;font-family:Tahoma, verdana,arial,helvetica,sans-serif;text-transform: none;letter-spacing:normal;text-shadow:none;white-space:normal;word-spacing:normal;" href="http://www.projectwonderful.com/advertisehere.php?id=40628&amp;type=4" target="_blank">Ads by Project Wonderful!  Your ad here, right now: $0</a></center></td></tr><tr><td colspan=1 valign="top" width=125 bgcolor="#000000" style="height:3px;font-size:1px;padding:0px;max-height:3px;"></td></tr></table>
					</noscript>
					<!-- End of Project Wonderful ad code. -->
				</div>				
			</div>
		</div>
	</div>
	
	<div id="footer" class="footer">
		Copyright © Zezenians All rights reserved.<br />
		<a href="http://validator.w3.org/check?uri=referer" target="_blank"><img src="http://images.zezenians.com/icoXhtml.gif" alt="Valid XHTML 1.0 Transitional" /></a>
		<a href="http://jigsaw.w3.org/css-validator/validator?uri=http://zezenians.com/css/style.css" target="_blank"><img src="http://images.zezenians.com/icoCss.gif" alt="Valid CSS!" /></a>
		<a href="http://feeds.feedburner.com/Zezenians_<?php echo $lang['lang'][0]; ?>" rel="alternate" type="application/rss+xml" target="_blank"><img src="http://images.zezenians.com/icoRSS.gif" alt="Subscribe in a reader" /></a>
	</div>

</div>

<script type="text/javascript">
	var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
	var pageTracker = _gat._getTracker("UA-6472752-1");
	pageTracker._trackPageview();
</script>

</body>
</html>
