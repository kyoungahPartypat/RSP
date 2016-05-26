<? session_start() ?>
<?

	include "connect_db.php";


	$sql = "select * from basket";
	$res =  mysql_query($sql, $connect) or die(mysql_error());

	$data = mysql_fetch_array($res);
	
	if(mysql_num_rows($res)) { 
		$sql = " delete from basket where phone_number = '$_SESSION[phone_number]'";
	}
	mysql_query($sql, $connect) or die(mysql_error()); 


	echo "<script>
				location.replace('Basket.php');
		  </script>";

?>