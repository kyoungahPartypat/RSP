<?
	include "session_check.php";

	$today = date("Y-m-d");

	$sql = "select phone_number, saved_date from basket where phone_number = '$_SESSION[phone_number]' ";
	$res = mysql_query($sql, $connect);

	while($array = mysql_fetch_assoc($res)) {
		if($array[saved_date] != $today) {
			$sql = "delete from basket where phone_number = '$_SESSION[phone_number]' and saved_date='$array[saved_date]'";
			$result = mysql_query($sql, $connect);
		}
	}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="css/background.css" />
<link rel="stylesheet" href="css/main_grid.css" />
<link rel="stylesheet" href="css/jquery_mobile_structure-1.4.2.min.css" />
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/mobile_init.js"></script>
<script src="js/jquery.mobile-1.4.2.min.js"></script>
    <title>메인</title>
	<style>
		/* 초기화 */
		@font-face { font-family: '고딕'; src: url('css/나눔고딕.ttf'); }
		* { font-family: '고딕'; }

		.con { padding: 0; margin: 0; }
		.health { background-image: url('img/icon/건강.png'); background-size: 100% 100%; background-repeat: no-repeat; }
		.simul1 { background-image: url('img/icon/보상1.png'); background-size: 100% 100%; background-repeat: no-repeat; }
		.simul2 { background-image: url('img/icon/보상2.png'); background-size: 100% 100%; background-repeat: no-repeat; }
	</style>
</head>
<body>
    <div data-role="page" id="background">
		<div data-role="header" data-position="fixed" style="border-bottom: 1px solid #7d7d7d; background-color: #d9d9d9;">
			<div class="title"><a href="main.php"><img src="img/background/title.png" /></a></div>
		</div>
        <div data-role="content" class="con">
			<div class="wrap">
				<div class="sub_wrap1">
					<a href="Health_A.php?code=jang"><div class="health">건강</div></a>
					<a href="Basket.php"><div class="basket">장바구니</div></a>
					<a href="RSP_page.php"><div class="rsp">상담결과</div></a>
				</div>
				<div class="sub_wrap2">
					<a href="Beauty_A.php?code=luxury"><div class="beauty">뷰티</div></a>
					<a href="Personal_A.php?code=normal"><div class="persnal">퍼스날</div></a>
					<a href="Detergent_A.php"><div class="detergent">세제류</div></a>
					<a href="Etc.php"><div class="etc">기타</div></a>
				</div>
				<a href="Simulation1_page.php"><div class="simul1">보상 1</div></a>
				<a href="Simulation2_page.php"><div class="simul2">보상 2</div></a>
			</div>
        </div>
    </div>
</body>
</html>