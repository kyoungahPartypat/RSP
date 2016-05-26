<? session_start() ?>
<?
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>";

	if(!$_SESSION[phone_number]) {
		echo "<script>
			alert('잘못된 경로입니다.');
			location.replace('index.php');
		</script>";		
	} else {
		include "connect_db.php";
	}
?>