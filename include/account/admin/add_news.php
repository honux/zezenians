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
	<script language="JavaScript">
	function Change_Pre ()
	{
		var item = document.getElementById( "pre_post" );
		if( item.checked == true )
		{
			document.getElementById("pre_options").style.display = "block";
		}
		else
		{
			document.getElementById("pre_options").style.display = "none";
		}
	}
	</script>
</head>

<body onload="checkHeight('middle'); Change_Pre()" onunload="">
<div id="pheight" class="cbody">

	<div class="clocal">
		<?php print($lang['mdl_account']); ?> <img src="http://images.zezenians.com/lmenu.gif" style="padding-bottom: 1px;" alt=""/> 
		Admin Area <img src="http://images.zezenians.com/lmenu.gif" style="padding-bottom: 1px;" alt=""/> 
		Add News
	</div>

	<div class="clbar"><span class="cltitle">Add News</span></div>
	
	<a href="?mod=admin&act=home">Back to Admin Home</a><br/><br/>
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
	<form action="?mod=admin&act=add_news" method="post">
		<input type="hidden" name="new_news" value="1" />
		<table style="font-size: 12px;">
			<tr>
				<td> Title </td>
				<td> <input name="title" type="text" maxlength="90" size="50" class="cuser_input" style="width: 200px;height: 20px;"/> </td>
			</tr>
			<tr>
				<td> Post </td>
				<td> <textarea name="notice" style="font-size: 10px;font-family: 'Trebuchet MS';color: #0B333C;height: 14px;border-bottom: 1px solid #D8DADB;border-right: 1px solid #D8DADB;border-top: 1px solid #7D7F80;border-left: 1px solid #7D7F80;width:200px;height: 100px; width: 450px" rows="15" cols="70"></textarea> </td>
			</tr>
			<tr>
				<td>About</td>
				<td>
					<select name="type">
						<option value="1"selected>Zezenians</option>
						<option value="2">Zezenia</option>
						<option value="3">Off-Topic</option>
					</select>
				</td>
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
				<td colspan="2"><br/><input type="checkbox" name="pre_post" id="pre_post" value="1" onChange="Change_Pre();"> <b>Pre-Post this news?</b><br/><i><small>Note: The news will be updated on feed only 1,5 hour after released!</small></i></td>
			</tr>
			<tr>
				<td colspan="2">
					<div id="pre_options" name="pre_options">
					Hour:
						<select name="pre_hour">
							<option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option>
						</select>
					Minute:	
						<select name="pre_min">
							<option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option>
						</select>
					Day:
					<select name="pre_day">
						<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>
					</select>
					Month:
					<select name="pre_month">
						<option value="January">January</option>
						<option value="February">February</option>
						<option value="March">March</option>
						<option value="April">April</option>
						<option value="May">May</option>
						<option value="June">June</option>
						<option value="July">July</option>
						<option value="August">August</option>
						<option value="September">September</option>
						<option value="October">October</option>
						<option value="November">November</option>
						<option value="December">December</option>
					</select>
					Year:
					<select name="pre_year">
						<option value="2009">2009</option><option value="2010">2010</option><option value="2011">2011</option><option value="2012">2012</option><option value="2013">2013</option><option value="2014">2014</option><option value="2015">2015</option><option value="2016">2016</option><option value="2017">2017</option><option value="2018">2018</option><option value="2019">2019</option><option value="2020">2020</option><option value="2021">2021</option><option value="2022">2022</option><option value="2023">2023</option><option value="2024">2024</option><option value="2025">2025</option><option value="2026">2026</option><option value="2027">2027</option><option value="2028">2028</option><option value="2029">2029</option><option value="2030">2030</option><option value="2031">2031</option><option value="2032">2032</option><option value="2033">2033</option><option value="2034">2034</option><option value="2035">2035</option><option value="2036">2036</option><option value="2037">2037</option><option value="2038">2038</option><option value="2039">2039</option><option value="2040">2040</option><option value="2041">2041</option><option value="2042">2042</option><option value="2043">2043</option><option value="2044">2044</option><option value="2045">2045</option><option value="2046">2046</option><option value="2047">2047</option><option value="2048">2048</option><option value="2049">2049</option><option value="2050">2050</option>
					</select>
					</div>
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