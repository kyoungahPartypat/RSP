<?
	include "connect_db.php";
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>";

	$sql = "delete from basket where bno='$bno'";  
	$res = mysql_query($sql, $connect) or die(mysql_error());

	echo "<script>
			alert('삭제 되었습니다.');
			location.replace('Basket.php');
		  </script>";
?>