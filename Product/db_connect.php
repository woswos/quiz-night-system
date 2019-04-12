<?PHP
$dbname = "quiz_night"; //database name
$dbuser = "username";  //database username
$dbpass = "password";  //database password
mysql_connect('localhost',$dbuser, $dbpass);
mysql_select_db($dbname) or die('unable to select db');
mysql_set_charset('utf8');

//echo 'no problem';
?>
