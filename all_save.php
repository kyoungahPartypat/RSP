<? session_start() ?>
<?

	include "connect_db.php";
	$insert_date = date("Y-m-d");
	$sql = "select * from basket where phone_number = '$_SESSION[phone_number]'";
	$res =  mysql_query($sql, $connect) or die(mysql_error());

	while($array = mysql_fetch_array($res)){
		
			$sql = "insert into rsp(phone_number, big_class, middle_class, small_class, small_class_two, product_name, product_code, score_value, price_value, price, product_character, product_image, product_count, incentive, saved_day)";
			$sql .=" values('$_SESSION[phone_number]', 
			'$array[big_class]', 
			'$array[middle_class]', 
			'$array[small_class]', 
			'$array[small_class_two]', 
			'$array[product_name]', 
			'$array[product_code]', 
			'$array[score_value]', 
			'$array[price_value]',  
			'$array[price]', 
			'$array[product_character]', 
			'$array[product_image]',   
			'$array[product_count]', 
			'$incentive', 
			'$insert_date')";

			$result = mysql_query($sql, $connect) or die(no);

	}
		$sql = "delete from basket";
		$result = mysql_query($sql, $connect);

	echo "$sql";
	echo "<script>
				location.replace('Result_page.php');
		  </script>";
?>