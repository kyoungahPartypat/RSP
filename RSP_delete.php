<?
	include "session_check.php";
	$sql = "select bno, saved_date from rsp where bno = '$bno'";
	$res = mysql_query($sql, $connect);
	$array =  mysql_fetch_assoc($res);

	$date = $array[saved_date];
	$sql = "delete from rsp where bno = '$bno'";
	$res = mysql_query($sql, $connect);

	$sql = "delete from rsp_basket where no = '$bno'";
	$res = mysql_query($sql, $connect);

	$sql = "select bno from rsp where phone_number = '$_SESSION[phone_number]'";
	$res = mysql_query($sql, $connect);
	$num = mysql_num_rows($res);

	if($num>0){
		echo "<script>
					location.href = 'RSP_sub_page.php?date=$date';
			  </script>";
	}else{
		echo "<script>
					location.href = 'RSP_page.php';
			  </script>";	
	}
?>