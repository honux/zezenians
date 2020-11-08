<?php

#######################################################################
#									SQL Engine										#
#######################################################################

class MySQL
{
	protected $message;
	protected $kind = -1;
	public $attr = array();

	//Cria uma conexão persistente com o Banco de Dados
	protected function myConnect()
	{
		global $cfg;
		$con = @mysql_pconnect( $cfg['SQL_Server'],$cfg['SQL_User'],$cfg['SQL_Password'] );
		if ( $con === false )
		{
			$this->message = 'Unable to connect to MySQL server';
			$this->kind = ERROR_MESSAGE;
			return false;
		}
		if ( !@mysql_select_db( $cfg['SQL_Database'] ) )
		{
			$this->message = 'Unable to select database';
			$this->kind = ERROR_MESSAGE;
			return false;
		}
		return true;
	}

	//Perform SQL query
	public function myQuery( $query )
	{
		if ( !$this->myConnect() ) 
			return false;

		$sql = @mysql_query( $query );

		if ( $sql === false )
		{
			$this->message = 'SQL query failed';
			$this->kind = ERROR_MESSAGE;
			return false;
		}
		return $sql;
	}


	//Insert data
	public function myInsert( $table, $data )
	{
		$fields = array_keys( $data );
		$values = array_values( $data );
		$query = 'INSERT INTO `'.mysql_real_escape_string( $table ).'` (';

		foreach ( $fields as $field )
		{
			$query.= '`'.mysql_real_escape_string( $field ).'`,';
		}
	
		$query = substr( $query, 0, strlen( $query )-1 );
		$query.= ') VALUES (';
	
		foreach ( $values as $value )
		{
			if ( $value === null )
				$query.= 'NULL,';
			else
				$query.= '\''.mysql_real_escape_string( $value ).'\',';
		}
	
		$query = substr( $query, 0, strlen( $query )-1 );
		$query.= ');';
	
		if ( $this->myQuery( $query ) === false ) 
		{
			$this->message = $query;
			$this->kind = ERROR_MESSAGE;
			return false;
		}
		else
			return true;
	}

	//Retrieve single row
	public function myRetrieve( $table, $data )
	{
		$fields = array_keys( $data ); 
		$values = array_values( $data );
		$query = 'SELECT * FROM `'.@mysql_real_escape_string( $table ).'` WHERE (';
		
		for ( $i = 0; $i < count( $fields ); $i++ )
			$query.= '`'.@mysql_real_escape_string( $fields[$i] ).'` = \''.@mysql_real_escape_string( $values[$i] ).'\' AND ';

		$query = substr( $query, 0, strlen($query)-4 );
		$query.=');';
		$sql = $this->myQuery( $query );

		if ( $sql === false ) 
		{
			$this->message = $query;
			$this->kind = ERROR_MESSAGE;
			return false;
		}

		if ( mysql_num_rows( $sql ) != 1 ) 
			return false;

		return mysql_fetch_array( $sql );
	}

	//Update data
	public function myUpdate( $table, $data, $where, $limit=1 )
	{
		$fields = array_keys( $data ); 
		$values = array_values( $data );
		$query = 'UPDATE `'.mysql_real_escape_string( $table ).'` SET ';

		for ($i = 0; $i < count( $fields ); $i++)
				$query.= '`'.mysql_real_escape_string( $fields[$i] ).'` = \''.mysql_real_escape_string( $values[$i] ).'\', ';

		$query = substr( $query, 0, strlen( $query )-2 );
		$query.=' WHERE (';
		$fields = array_keys( $where ); 
		$values = array_values( $where );

		for ( $i = 0; $i < count( $fields ); $i++ )
			$query.= '`'.mysql_real_escape_string( $fields[$i] ).'` = \''.mysql_real_escape_string( $values[$i] ).'\' AND ';

		$query = substr( $query, 0, strlen( $query )-4 );
		$query.=') LIMIT '.$limit.';';
		$sql = $this->myQuery( $query );

		if ( $sql === false ) 
		{
			$this->message = mysql_error();
			$this->kind = ERROR_MESSAGE;
			return false;
		}

		return true;
	}

	//Delete data
	public function myDelete( $table, $data, $limit = 1 )
	{
		$fields = array_keys( $data ); 
		$values = array_values( $data );
		$query = 'DELETE FROM `'.mysql_real_escape_string( $table ).'` WHERE (';

		for ( $i = 0; $i < count( $fields ); $i++ )
			$query.= '`'.mysql_real_escape_string( $fields[$i] ).'` = \''.mysql_real_escape_string( $values[$i] ).'\' AND ';

		$query = substr( $query, 0, strlen( $query)-4 );

		if ($limit > 0)
			$query.=') LIMIT '.$limit.';';
		else
			$query.=');';

		$sql = $this->myQuery( $query );
		if ( $sql === false )
		{
			$this->message = mysql_error();
			$this->kind = ERROR_MESSAGE;
			return false;
		}

		return true;
	}

	//Set a Error
	public function setMessage( $message, $kind )
	{
		$this->message = $message;
		$this->kind = $kind;
	}

	// Get generated error
	public function getMessage()
	{
		return $this->message;
	}
	
	public function getMessageKind()
	{
		return $this->kind;
	}

	
	# Atributes part
	public function getSelAttr( $attr )
	{
		return $this->attr[$attr];
	}

	public function getAttr()
	{
		return $this->attr;
	}
	
	public function setAttr( $attr, $value )
	{
		$this->attr[$attr] = $value;
	}
	
	public function setFullAttr( $newattr )
	{
		$this->clearAttr();
		$this->attr = &$newattr;
	}

	public function clearAttr()
	{
		foreach( $this->attr as $i => $value )
		{
		    unset( $this->attr[$i] );
		}	
	}
};

#######################################################################
#									News System									#
#######################################################################

class News extends MySQL
{
	/*
	  `id` int(10) unsigned NOT NULL,
	  `author` int(10) unsigned NOT NULL,
	  `lang` varchar(5) NOT NULL,
	  `type` int(2) NOT NULL,
	  `title` varchar(150) NOT NULL,
	  `notice` text NOT NULL,
	  `date` int(10) NOT NULL
	*/
	private $admin;
	
	public function __construct( )
	{
		$this->myConnect();
		if ( isset($_SESSION['id']) && $_SESSION['access']&POST_AND_EDIT_NEWS )
		{
			$this->admin = true;
		}
		else
		{
			$this->admin = false;
		}
	}	

	public function Add()
	{
		global $lang;
		$date = time();
		if ( $this->admin == false || !isset($_POST['lang']) || !isset($_POST['type']) || !isset($_POST['title']) || !isset($_POST['notice']) )
		{
			$this->setMessage( $lang['classes_news_add_empty'], ERROR_MESSAGE );
			return false;
		}
		if ( isset($_POST['pre_post']) && $_POST['pre_post'] == 1 )
		{
			$date = strtotime( $_POST['pre_month']." ".$_POST['pre_day']." ".$_POST['pre_year']." ".$_POST['pre_hour'].":".$_POST['pre_min'].":00" );
			if ( $date == false || $date == -1 || $date < time() )
			{
				$this->setMessage( $lang['classes_news_add_fail_pre'], ERROR_MESSAGE );
				return false;
			}
		}
		
		$this->clearAttr();
		$this->setAttr( 'id', NULL );
		$this->setAttr( 'author', $_SESSION['login'] );
		$this->setAttr( 'lang', $_POST['lang'] );
		$this->setAttr( 'type', $_POST['type'] );
		$this->setAttr( 'title', trim($_POST['title']) );
		$this->setAttr( 'notice', nl2br($_POST['notice']) );
		$this->setAttr( 'date', $date );

		$res = $this->myInsert( DB_NEWS, $this->getAttr() );
		if ( $res == false )
		{
			$this->setMessage( $lang['classes_news_add_sql_fail'], ERROR_MESSAGE );
			return false;
		}
		
		$this->generateRSS( $_POST['lang'] );
		
		$this->setMessage( $lang['classes_news_add_success'], SUCESS_MESSAGE );
		return true;
	}

	public function Load( $id )
	{
		global $lang;
		if ( !preg_match('/^([0-9])*/i', $id) )
		{
			$this->setMessage( $lang['classes_news_load_invalid_id'], ERROR_MESSAGE );
			return false;
		}

		$this->clearAttr();

		$this->setAttr( 'id', $id );

		$resource = $this->myRetrieve( DB_NEWS, $this->getAttr() );
		if ( !$resource )
		{
			$this->setMessage( $lang['classes_news_load_invalid_id'], ERROR_MESSAGE );
			return false;
		}

		$this->setFullAttr( $resource );

		return $this->getAttr();
	}
	
	public function Update( $set, $where )
	{
		global $lang;
		if ( $this->admin != false )
		{
			$result = $this->myUpdate( DB_NEWS, $set, $where );
			
			if ( $result )
			{
				$this->generateRSS( $_POST['lang'] );
				$this->setMessage( $lang['classes_news_update_success'], SUCESS_MESSAGE );
				return true;
			}
			
			$this->setMessage( $lang['classes_news_update_error'], ERROR_MESSAGE );
			return true;
		}
	}

	public function generateRSS( $lang )
	{
		unlink ( FEED_PATH.$lang.".xml" );

		$FileHandle = fopen( FEED_PATH.$lang.".xml" , 'w') or die("can't open file");

		$rss_channel = new rssGenerator_channel();
		$rss_channel->atomLinkHref = 'http://feeds.zezenians.com/'.$lang.'.xml';
		$rss_channel->title = 'Zezenians News';
		$rss_channel->link = 'http://'.$lang.'.zezenians.com/';
		$rss_channel->description = 'The latest news about Zezenia.';
		$rss_channel->language = $lang;
		$rss_channel->managingEditor = 'honux@zezenians.com (Adriano Martins)';
		$rss_channel->webMaster = 'webmaster@zezenians.com (Adriano Martins)';

		$query = "SELECT * FROM `news` WHERE lang = '".$lang."' AND `date` < '".time()."' ORDER BY `date` desc LIMIT 10";
		$sql = $this->myQuery($query);

		if ($sql === false)
		{
			$error = $this->getMessage();
			die($error);
		}			
		else if ( mysql_num_rows( $sql ) > 0 )
		{
			while($news = mysql_fetch_array($sql))
			{
				$item = new rssGenerator_item();
				$item->title = htmlspecialchars(stripslashes($news['title']));
				$item->description = htmlspecialchars(stripslashes($news['notice']));
				$item->link = 'http://'.$lang.'.zezenians.com/?mod=archive&amp;id='.$news['id'];
				$item->guid = 'http://'.$lang.'.zezenians.com/?mod=archive&amp;id='.$news['id'];
				$item->pubDate = date('r', $news['date'] );
				$rss_channel->items[] = $item;
			}
		}
		
		$rss_feed = new rssGenerator_rss();
		$rss_feed->encoding = 'UTF-8';
		$rss_feed->version = '2.0';
		
		// Write on XML
		fwrite($FileHandle, $rss_feed->createFeed($rss_channel));
		
		fclose($FileHandle);
	
	}
};

#######################################################################
#									Poll System										#
#######################################################################

class Poll extends MySQL
{
	private $admin;
	
	public function __construct( )
	{
		$this->myConnect();
		if ( isset($_SESSION['id']) && $_SESSION['access']&POST_AND_EDIT_NEWS )
		{
			$this->admin = true;
		}
		else
		{
			$this->admin = false;
		}
	}
	
	public function Add()
	{
		global $lang;
		$date = time();
		$height = 70;
		
		if ( $this->admin == false || !isset($_POST['lang']) || !isset($_POST['question']) || !isset($_POST['a1']) || !isset($_POST['a2']) || empty($_POST['a1']) || empty($_POST['a2']) )
		{
			$this->setMessage( $lang['classes_poll_add_empty'], ERROR_MESSAGE );
			return false;
		}
		
		$this->clearAttr();
		$this->setAttr( 'id', NULL );
		$this->setAttr( 'lang', $_POST['lang'] );
		$this->setAttr( 'question', trim($_POST['question']) );
		
		for ( $i = 1; $i < 8; $i++ )
		{
			if ( isset( $_POST['a'.$i] ) && !empty($_POST['a'.$i]))
			{
				$this->setAttr( 'a'.$i, trim($_POST['a'.$i]) );
				$height += 19;
			}
			else
			{
				$this->setAttr( 'a'.$i, '' );
			}
		}

		$this->setAttr( 'height', $height );
		$this->setAttr( 'date', $date );

		$res = $this->myInsert( DB_POLLS, $this->getAttr() );
		if ( $res == false )
		{
			$this->setMessage( $lang['classes_poll_add_sql_fail'], ERROR_MESSAGE );
			return false;
		}
		
		$this->generatePoll( $_POST['lang'], $date );
		
		$this->setMessage( $lang['classes_poll_add_success'], SUCESS_MESSAGE );
		return true;
	}

	public function Vote()
	{
		global $lang;
		if ( !isset($_SESSION['id']) )
		{
			$this->setMessage( $lang['classes_poll_vote_not_logged'], ERROR_MESSAGE );
			return false;
		}
		elseif ( !isset( $_POST['option'] ) || !isset( $_POST['id'] ) )
		{
			return false;
		}

		$res = $this->myRetrieve( DB_POLLS, array( 'id' => $_POST['id'] ) );

		if ( $res == false || !isset($res['a'.$_POST['option']]) ||$res['a'.$_POST['option']] == '' )
		{
			return false;
		}
		else if ( isset($_COOKIE["poll_id"]) && $_COOKIE["poll_id"] == $_POST['id'] )
		{
			return false;
		}
		else if ( $this->myRetrieve( DB_POLL_VOTES, array( 'id' => $_POST['id'], 'user' => $_SESSION['id'] ) ) )
		{
			return false;
		}

		$this->clearAttr();
		$this->setAttr( 'id', $_POST['id'] );
		$this->setAttr( 'user', $_SESSION['id'] );
		$this->setAttr( 'vote', $_POST['option'] );

		setcookie("poll_id", $_POST['id'], time()+3600, '/', '.zezenians.com');

		$res = $this->myInsert( DB_POLL_VOTES, $this->getAttr() );
		if ( $res == false )
		{
			return false;
		}
		return true;
	}
	
	public function generatePoll( $lang, $date )
	{
		$res = $this->myRetrieve( DB_POLLS, array( 'date' => $date ) );

		$option = '';
		for ( $i = 1; $i < 8; $i++ )
		{
			if ( isset( $res['a'.$i] ) && !empty($res['a'.$i]) )
			{
				$option .= '<input type="radio" name="option" value="'.$i.'">'.$res['a'.$i].'<br/>';
			}
		}

		$FileHandle = fopen( FILE_PATH."include/general/polls/".$lang.".php" , 'w') or die("can't open file");

		fwrite($FileHandle, '<html>');
		fwrite($FileHandle, '<head>');
		fwrite($FileHandle, '<link rel="stylesheet" href="http://zezenians.com/css/content.css" type="text/css" />');
		fwrite($FileHandle, '<script type="text/javascript" src="http://zezenians.com/js/midle.js"></script>');
		fwrite($FileHandle, '<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />');
		fwrite($FileHandle, '<meta http-equiv="Content-Language" content="'.$lang.'" />');
		fwrite($FileHandle, '<meta name="author" content="Honux" />');
		fwrite($FileHandle, '<script language="JavaScript">function updatePoll (){if(document.getElementById){parent.document.getElementById(\'poll_frame\').style.height = '.$res['height'].'+\'px\';}else{parent.document.all(\'poll_frame\').height = '.$res['height'].';}}</script>');
		fwrite($FileHandle, '</head>');
		fwrite($FileHandle, '<body onload="updatePoll();">');
		fwrite($FileHandle, '<form action="?mod=poll&act=add" method="post">');
		fwrite($FileHandle, '<input type="hidden" name="id" value="'.$res['id'].'" />');
		fwrite($FileHandle, $res['question'].'<br/>');
		fwrite($FileHandle, $option);
		fwrite($FileHandle,'<input type="submit" value="Send" class="cuser_button"><br/>');
		fwrite($FileHandle, '</form>');
		fwrite($FileHandle, '<a href="?mod=poll&act=result&id='.$res['id'].'">View Results</a>');
		fwrite($FileHandle, '</body>');
		fwrite($FileHandle, '</html>');

		fclose($FileHandle);
	
	}
	
}

#######################################################################
#									Account System									#
#######################################################################

class Account extends MySQL
{
	/*
	 `id` INT( 10 ) NOT NULL AUTO_INCREMENT ,
	`login` VARCHAR( 35 ) NOT NULL ,
	`password` VARCHAR( 35 ) NOT NULL ,
	`salt` VARCHAR( 20 ) NOT NULL ,
	`e-mail` VARCHAR( 100 ) NOT NULL,
	`access` INT( 20 ) NOT NULL
	*/
	private $loged = false;

	public function __construct()
	{
		if ( isset($_COOKIE['logout']) && $_COOKIE['logout'] == 1 )
		{
			$this->Logout();
		}
		if ( isset($_SESSION['id']) )
		{
			$this->loged = true;
		}
		if ( isset($_COOKIE["user"]) && isset($_COOKIE["pass"]) )
		{
			$this->Login($_COOKIE["user"], $_COOKIE["pass"]);
		}
		$this->myConnect();
		$this->setMessage( '', -1 );
	}

	public function validEmail($email)
	{
		$isValid = true;
		$atIndex = strrpos($email, "@");
		if (is_bool($atIndex) && !$atIndex)
		{
			$isValid = false;
		}
		else
		{
			$domain = substr($email, $atIndex+1);
			$local = substr($email, 0, $atIndex);
			$localLen = strlen($local);
			$domainLen = strlen($domain);
			if ($localLen < 1 || $localLen > 64)
			{
				// local part length exceeded
				$isValid = false;
			}
			else if ($domainLen < 1 || $domainLen > 255)
			{
				// domain part length exceeded
				$isValid = false;
			}
			else if ($local[0] == '.' || $local[$localLen-1] == '.')
			{
				// local part starts or ends with '.'
				$isValid = false;
			}
			else if (preg_match('/\\.\\./', $local))
			{
				// local part has two consecutive dots
				$isValid = false;
			}
			else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain))
			{
				// character not valid in domain part
				$isValid = false;
			}
			else if (preg_match('/\\.\\./', $domain))
			{
				// domain part has two consecutive dots
				$isValid = false;
			}
			else if (!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/',	str_replace("\\\\","",$local)))
			{
			// character not valid in local part unless 
			// local part is quoted
				if (!preg_match('/^"(\\\\"|[^"])+"$/', str_replace("\\\\","",$local)))
				{
					$isValid = false;
				}
			}
			/*
			if ($isValid && !(checkdnsrr($domain,"MX") || ?checkdnsrr($domain,"A")))
			{
				// domain not found in DNS
				$isValid = false;
			}
			*/
		}
		return $isValid;
	}
	
	public function Add()
	{
		global $lang;

//		$invalid = array('guerrillamailblock.com', 'tyldd.com', 'mailinator2.com', 'sogetthis.com', 'mailin8r.com', 'mailinator.net', 'spamherelots.com', 'thisisnotmyrealemail.com', 'tempemail.net', 'trash2009.com', 'temporaryemail.net', 'spambox.us', 'tempomail.fr', 'spamspot.com', 'spam.la');
		
		if ( !isset($_POST['login']) || !isset($_POST['pass']) || !isset($_POST['pass2']) || !isset($_POST['mail']) || !isset($_POST['mail2']) || !isset($_POST['captcha']) )
		{
			$this->setMessage( $lang['classes_account_add_empty'], ERROR_MESSAGE );
			return false;
		}
		else if ( $_POST['pass'] != $_POST['pass2'] )
		{
			$this->setMessage( $lang['classes_account_add_dif_pass'], ERROR_MESSAGE );
			return false;		
		}
		else if ( $_POST['mail'] != $_POST['mail2'] )
		{
			$this->setMessage( $lang['classes_account_add_dif_mail'], ERROR_MESSAGE );
			return false;		
		}
		else if ( strtolower($_POST['captcha']) != $_SESSION['server_code'] )
		{
			$this->setMessage( $lang['classes_account_add_wrong_captcha'], ERROR_MESSAGE );
			return false;
		}
		else if ( strlen($_POST['login']) > 30 )
		{
			$this->setMessage( $lang['classes_account_add_long_login'], ERROR_MESSAGE );
			return false;
		}
		else if ( strlen($_POST['mail']) > 98 )
		{
			$this->setMessage( $lang['classes_account_add_long_mail'], ERROR_MESSAGE );
			return false;
		}
		/*
		else if ( !preg_match('/^([a-z0-9])(([-a-z0-9._])*([a-z0-9]))*\@([a-z0-9])*(\.([a-z0-9])([-a-z0-9_-])([a-z0-9])+)*$/i', trim($_POST['mail']) ) )
		{
			$this->setMessage( $lang['classes_account_add_email_invalid'], ERROR_MESSAGE );
			return false;
		}*/
		else if ( !$this->validEmail( strtolower(trim($_POST['mail']) )) )
		{
			$this->setMessage( $lang['classes_account_add_email_invalid'], ERROR_MESSAGE );
			return false;
		}
		else if ( !preg_match( '/^([a-z0-9_-])*$/i', trim($_POST['login']) ) )
		{
			$this->setMessage( $lang['classes_account_add_login_invalid'], ERROR_MESSAGE );
			return false;
		}
/*
		// No reason to use it right now, we dont use the e-mail!
		$domain = explode("@", trim($_POST['mail']));
		
		if ( in_array( strtolower($domain[1]), $invalid ) )
		{
			$this->setMessage( $lang['classes_account_add_prohibited_mail'], ERROR_MESSAGE );
			return false;		
		}
*/
		else if ( $this->myRetrieve( DB_USER, array( 'login' => trim($_POST['login']) ) ) != false )
		{
			$this->setMessage( $lang['classes_account_add_login_in_use'], ERROR_MESSAGE );
			return false;
		}
		else if ( $this->myRetrieve( DB_USER, array( 'e-mail' => trim($_POST['mail']) ) ) != false )
		{
			$this->setMessage( $lang['classes_account_add_email_in_use'], ERROR_MESSAGE );
			return false;
		}

		$salt = $this->randomkeys( "Z?E^Z~E!N@I#A\$N%S&*()-+=_:¿¡", rand(6,8) );
		$password = substr( strrev( $salt ), 1 ).$_POST['pass'].substr( $salt, 2 );

		$this->clearAttr();
		$this->setAttr( 'id', NULL );
		$this->setAttr( 'login', trim($_POST['login']) );
		$this->setAttr( 'password', md5($password) );
		$this->setAttr( 'salt', $salt );
		$this->setAttr( 'e-mail', trim($_POST['mail']) );
		$this->setAttr( 'access', ACTIVATED );

		$result = $this->myInsert( DB_USER, $this->getAttr() );
		if ( $result == false )
		{
			$this->setMessage( $lang['classes_account_add_insert_error'], ERROR_MESSAGE );
			return false;
		}

		$this->setMessage( $lang['classes_account_add_success'], SUCESS_MESSAGE );
		return true;
	}

	public function Load( $id )
	{
		global $lang;
		if ( !preg_match('/^([0-9])*/i', $id) )
		{
			$this->setMessage( $lang['classes_account_load_invalid_id'], ERROR_MESSAGE );
			return false;
		}

		$this->clearAttr();
		$this->setAttr( 'id', $id );

		$resource = $this->myRetrieve( DB_USER, $this->getAttr() );
		if ( !$resource )
		{
			$this->setMessage( $lang['classes_account_load_invalid_id'], ERROR_MESSAGE );
			return false;
		}

		$this->setFullAttr( $resource );

		return $this->getAttr();
	}
	
	public function Login( $login=NULL, $pass=NULL )
	{
		global $lang;
		$encrypt = false;
		$password = '';
		if ( $login == NULL && $pass == NULL )
		{
			if ( isset($_COOKIE["user"]) && isset($_COOKIE["pass"]) )
			{
				$login = $_COOKIE["user"];
				$pass = $_COOKIE["pass"];
			}
			else if ( isset($_POST["login"]) && !empty($_POST["login"]) && isset($_POST["pass"]) && !empty($_POST["pass"]))
			{
				$login = $_POST['login'];
				$pass = $_POST['pass'];
				$encrypt = true;
			}
			else
			{
				return false;
			}
		}
		
		if ( $this->loged == true )
		{
			$this->setMessage( $lang['classes_account_login_logged_already'], STATUS_MESSAGE );
			return;
		}
		else if ( !isset($login) || !isset($pass) )
		{
			$this->setMessage( $lang['classes_account_login_empty'], ERROR_MESSAGE );
			return false;
		}

		$this->clearAttr();
		$this->setAttr( 'login', trim( $login ) );
		$resource = $this->myRetrieve( DB_USER, $this->getAttr() );
		if ( !$resource )
		{
			$this->setMessage( $lang['classes_account_login_invalid_login'], ERROR_MESSAGE );
			return false;
		}

		if ( $encrypt )
		{
			$password = md5(substr( strrev( $resource['salt'] ), 1 ).$_POST['pass'].substr( $resource['salt'], 2 ));
		}
		else
		{
			$password = $pass;
		}

		if ( $resource['password'] != $password )
		{
			$this->setMessage( $lang['classes_account_login_wrong_password'], ERROR_MESSAGE );
			return false;
		}

		$_SESSION['login'] = $login;
		$_SESSION['password'] = $pass;
		$_SESSION['access'] = $resource['access'];
		$_SESSION['e-mail'] = $resource['e-mail'];
		$_SESSION['id'] = $resource['id'];

		$this->loged = true;
		$time = 0;
		if ( isset($_POST['stay_logged']) && $_POST['stay_logged'] == 1 )
		{
			$time = 1893463200;
		}

		setcookie("user", $login, $time, '/', '.zezenians.com');
		setcookie("pass", $password, $time, '/', '.zezenians.com');
		setcookie("logout", '', time()-36000, '/', '.zezenians.com');		

		$this->setMessage( $lang['classes_account_login_success'], SUCESS_MESSAGE );
		return true;
	}

	public function Update( $type )
	{
		global $lang;
		if ( $this->loged == false )
		{
			$this->setMessage( $lang['classes_account_update_not_logged'], STATUS_MESSAGE );
			return;
		}
		else if ( $type == UPDATE_PASSWORD )
		{
			if ( !isset($_POST['old_pass']) || !isset($_POST['pass']) || !isset($_POST['pass2']) )
			{
				$this->setMessage( $lang['classes_account_update_empty'], ERROR_MESSAGE );
				return false;
			}
			else if ( $_POST['pass'] != $_POST['pass2'] )
			{
				$this->setMessage( $lang['classes_account_update_dif_pass'], ERROR_MESSAGE );
				return false;
			}
			else if ( $_POST['old_pass'] != $_SESSION['password'] )
			{
				$this->setMessage( $lang['classes_account_update_old_pass'], ERROR_MESSAGE );
				return false;
			}
			$salt = $this->randomkeys( "Z?E^Z~E!N@I#A$N%S&*()-+=_:¿¡", rand(6,8) );
			$password = substr( strrev( $salt ), 1 ).$_POST['pass'].substr( $salt, 2 );

			$where['id'] = $_SESSION['id'];

			$set['password'] = md5($password);
			$set['salt'] = $salt;
			
			$resource = $this->myUpdate( DB_USER, $set, $where );
			if ( !$resource )
			{
				$this->setMessage( $lang['classes_account_update_unable_password'], ERROR_MESSAGE );
				return false;
			}

			$this->setMessage( $lang['classes_account_update_success_password'], SUCESS_MESSAGE );
			return true;
		
		}
		else if ( $type == UPDATE_EMAIL )
		{
			/*
			TODO
			*/
			return false;
		}
	}

	public function isLoged()
	{
		return $this->loged;
	}

	public function Logout()
	{
		setcookie("user", '', time()-36000, '/', '.zezenians.com');
		setcookie("pass", '', time()-36000, '/', '.zezenians.com');
		setcookie("logout", '1', 1893463200, '/', '.zezenians.com');
		session_unset();
		$this->loged = false;	
	}

	public function isAdmin()
	{
		if ( !$this->isLoged() )
		{
			return false;
		}
		if ( $_SESSION['access']&POST_AND_EDIT_NEWS )
		{
			return true;
		}
		return false;
	}
	
	private function randomkeys( $pattern, $length )
	{
		$key = '';
		for($i=0; $i < $length; $i++)
		{
			$key .= $pattern{ rand(0, (strlen($pattern)-1)) };
		}
		return $key;
	}
};

?>