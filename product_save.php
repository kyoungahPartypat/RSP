<? 
	extract($_GET);  
	extract($_POST);  
	extract($_SERVER); 

	include "connect_db.php";  

	echo "<input type='hidden' name='bno' value='<?php echo $fcode[$num]; ?>' />";

	$sql = "select product_code from basket where product_code ='$fcode[$num]'";  
	$res = mysql_query($sql, $connect) or die(mysql_error()); 
	$data = mysql_fetch_array($res);

	if(mysql_num_rows($res)) { 
		$sql = " delete from basket where product_code='$fcode' ";

		mysql_query($sql, $connect) or die(mysql_error()); 
	}

	echo "<script>
		location.href='Basket.php';  
	</script>";  

	mysql_close($connect);  
?>  
