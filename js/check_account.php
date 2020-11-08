<?PHP
include ( '/home/honux/zezenians/site/include/database/config.php' );

$query = "";

function CheckName( $name )
{
	global $cfg;
	$con = @mysql_pconnect( $cfg['SQL_Server'],$cfg['SQL_User'],$cfg['SQL_Password'] );
	
	if ( $con === false )
	{
		return false;
	}
	if ( !@mysql_select_db( $cfg['SQL_Database'] ) )
	{
		return false;
	}
	
	$query = "SELECT * FROM `accounts` WHERE `login` LIKE CONVERT( _utf8 '".mysql_real_escape_string($name)."' USING latin1 ) COLLATE latin1_swedish_ci;";
	$sql = @mysql_query( $query );
	if ( mysql_num_rows( $sql ) != 0 )
	{
		return true;
	}
	return false;
}

$errors = 0;
$account = trim($_REQUEST['account']);

if ( !preg_match( '/^([a-z0-9_-])*$/i', $account ) )
{
	echo '0';
}
else if( CheckName($account) ) 
{
	echo '1';
}
else 
{
	echo '2';
}
?>