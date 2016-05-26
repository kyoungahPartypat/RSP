<?
	include "session_check.php";
	
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>";
	$sql = "select * from basket where product_code = '$code' and phone_number = '$_SESSION[phone_number]'";  
	$res = mysql_query($sql, $connect) or die(mysql_error());
	$array = mysql_fetch_array($res);
	$sql = "update basket set product_count='$num' where product_code='$array[product_code]' and phone_number = '$_SESSION[phone_number]' ";				
	$result = mysql_query($sql, $connect) or die(mysql_error());
	echo "<script>
				alert('수정 되었습니다.');
				location.replace('Basket.php');
		  </script>";	
?>