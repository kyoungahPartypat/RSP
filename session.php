<?	
	session_start();

	$_SESSION[phone_number] = $check_phone;

	echo "<script>
				location.replace('main.php');
		  </script>";
?>