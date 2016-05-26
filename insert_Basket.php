<?
	session_start();	
?>
<?
	include "connect_db.php";

	$today = date("Y-m-d");
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";

	$sql = "select product_name from product_list where product_code = '$code'";
	$res = mysql_query($sql, $connect) or die (앙대1);
	$name = mysql_fetch_assoc($res);


	$sql = "select * from basket where product_name = '$name[product_name]' and phone_number = '$_SESSION[phone_number]'";
	$res = mysql_query($sql, $connect) or die (앙대2);

	$array = mysql_fetch_assoc($res);
	$count = mysql_num_rows($res);

	
	if($count <= 0){
		$sql = "select * from product_list where product_code = '$code'";
		$res = mysql_query($sql, $connect) or die (앙대3);
		$result = mysql_fetch_assoc($res);
		

		$sql = "insert into basket(phone_number, big_class, middle_class, small_class, small_class_two, product_name, product_code, score_value, price_value, price, product_character, product_image, product_count, saved_date)";
		$sql .= " values('$_SESSION[phone_number]', '$result[big_class]', '$result[middle_class]', '$result[small_class]', '$result[small_class_two]', '$result[product_name]', '$result[product_code]', '$result[score_value]', '$result[price_value]',  '$result[price]', '$result[product_character]', '$result[product_image]', '$num', '$today')";
		$res = mysql_query($sql, $connect) or die (앙대4);
		

	}else{
		$total_num = $num + $array[product_count];
		$sql = "update basket set product_count = '$total_num' where bno='$array[bno]'";
		$res = mysql_query($sql, $connect) or die (앙대5);
		
	}
	
	echo "<script>
				alert('장바구니에 담겼습니다.');
				history.back(-1);
		  </script>";
?>