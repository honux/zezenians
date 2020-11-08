<?php
	$MySQL = new MySQL();
	
	$res = $MySQL->myRetrieve( DB_POLLS, array( 'id' => $_REQUEST['id'] ) );
	if ( $res == false )
	{
		echo $lang['poll_result_wrong_id'];
		exit();
	}
	$height = $res['height'];
	for ( $i = 1; isset($res['a'.$i]) && !empty($res['a'.$i]); $i++ )
	{
		$height += 10;
	}
	
	$error = '';
	if ( $poll->getMessageKind() != -1 )
	{
		$error = "alert('".$poll->getMessage()."');";
	}
	
?>
<html>
<head>
	<link rel="stylesheet" href="http://zezenians.com/css/content.css" type="text/css" />
	<script type="text/javascript" src="http://zezenians.com/js/midle.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta http-equiv="Content-Language" content="en" />
	<meta name="author" content="Honux" />
	<script language="JavaScript">
		function updatePoll ()
		{
			if(document.getElementById)
			{
				parent.document.getElementById('poll_frame').style.height = <?php echo $height;?>+'px';
			}
			else
			{
				parent.document.all('poll_frame').height = <?php echo $height;?>;
			}
		}
	</script>
</head>
<body onload="updatePoll();<?php echo $error;?>">
		<?php
		echo $res['question'].'<br/><br/>';
		
		$query = "SELECT * FROM `".DB_POLL_VOTES."` WHERE id = '".$_REQUEST['id']."';";
		$sql = $MySQL->myQuery($query);
		$total = mysql_num_rows( $sql );

		if ( $total == 0 )
		{
			echo $lang['poll_result_no_vote'];
		}
		else
		{
			$images = array( '1' => 'blue', 'brown', 'darkgreen', 'gold', 'grey', 'orange', 'purple' );
			
			for ( $i = 1; isset($res['a'.$i]) && !empty($res['a'.$i]); $i++ )
			{
				$query = "SELECT * FROM `".DB_POLL_VOTES."` WHERE id = '".$_REQUEST['id']."' AND vote = '".$i."';";
				$sql = $MySQL->myQuery($query);
				$temp = mysql_num_rows( $sql );
				echo $res['a'.$i].'<br/>';
				echo '<img src="http://images.zezenians.com/'.$images[$i].'.gif" style="width:'.(round(($temp/$total)*74)+1).'px;height:12px;"/> - '.round($temp*100/$total).'%<br/>';
			}
		}

	?>
</body>
</html>