<?
		include "session_check.php";
		echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>";

		mysql_query("set session character_set_connection=utf8;");
		mysql_query("set session character_set_results=utf8;");
		mysql_query("set session character_set_client=utf8;");

		if($adviser_name == "" || $adviser_phone == "" || $customer_name == "" || $customer_phone == ""){
			echo "
				<script>
					location.replace('main.php');
				</script>
			";
		}else{
		
			$now = time();
			$date= date("Y-m-d", $now);
			$time = date("A h시 i분", $now);

			$sql = " insert into rsp ( phone_number, adviser, adviser_phone, customer, 
						customer_phone, product_sum, product_level, product_incentive, consult_content,  saved_date, saved_time) ";

			$sql .= " values ('$_SESSION[phone_number]', '$adviser_name', '$adviser_phone', '$customer_name', '$customer_phone', '$sum', '$level', '$incentive', '$content', '$date', '$time')"; 
			$res =  mysql_query($sql, $connect) or die(mysql_error());
			
			$no = mysql_insert_id();
			
			$sql = "select * from basket where phone_number = $_SESSION[phone_number]";
			$res =  mysql_query($sql, $connect) or die(mysql_error());
			
			while($array = mysql_fetch_array($res)) {
				$query = " insert into rsp_basket(no, phone_number, big_class, middle_class, small_class, small_class_two, product_name, product_code, score_value, price_value, price, product_character, product_image, product_count)";

				$query .= " values ($no, '$_SESSION[phone_number]', '$array[big_class]', '$array[middle_class]', '$array[small_class]', '$array[small_class_two]',				'$array[product_name]', '$array[product_code]', '$array[score_value]', '$array[price_value]',  '$array[price]', '$array[product_character]', '$array[product_image]',   '$array[product_count]')";

				$result = mysql_query($query, $connect);
			}

			$sql = "delete from basket where phone_number = '$_SESSION[phone_number]'";
			$res =  mysql_query($sql, $connect) or die(mysql_error());
			
			echo "<script>
				location.href= 'Share_page.php?bno=$no';
			  </script>";
		}
?>