<?
	$host = 'localhost';
	$user = 'finsol';
	$passwd = 'aku900381vls';

	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>";

	$connect = mysql_connect($host, $user, $passwd) or die("접속 할 수 없습니다.");

	mysql_select_db('finsol', $connect);
?>