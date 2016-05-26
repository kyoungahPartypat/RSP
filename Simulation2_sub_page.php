<?
	foreach ($_POST["me"] as $a);
	foreach ($_POST["dan_one"] as $b);
	foreach ($_POST["dan_two"] as $c);
	foreach ($_POST["dan_three"] as $d);
	foreach ($_POST["use_month"] as $e);
	
	$x = $b + ($b * $c) + ($b * $c * $d);
	$f = ($x * $a) + $a;

	if($f>=10000000) {
		$g = 0.21;
	} else if($f<10000000 && $f>=6800000) {
		$g = 0.18;
	} else if($f<6800000 && $f>=4000000) {
		$g = 0.15;
	} else if($f<4000000 && $f>=2400000) {
		$g = 0.12;
	} else if($f<2400000 && $f>=1200000) {
		$g = 0.09;
	} else if($f<1200000 && $f>=600000) {
		$g = 0.06;
	} else if($f<600000 && $f>=200000) {
		$g = 0.03;
	} else {
		$g = 0;
	}

	$h = $f * $g * 1.53;
	$temp1 = 1 + $c + ($c * $d);
	$temp2 = $temp1 * $a;

	if($temp2>=10000000) {
		$temp_g = 0.21;
	} else if($temp2<10000000 && $temp2>=6800000) {
		$temp_g = 0.18;
	} else if($temp2<6800000 && $temp2>=4000000) {
		$temp_g = 0.15;
	} else if($temp2<4000000 && $temp2>=2400000) {
		$temp_g = 0.12;
	} else if($temp2<2400000 && $temp2>=1200000) {
		$temp_g = 0.09;
	} else if($temp2<1200000 && $temp2>=600000) {
		$temp_g = 0.06;
	} else if($temp2<600000 && $temp2>=200000) {
		$temp_g = 0.03;
	} else {
		$temp_g = 0;
	}

	$temp3 = $temp2 * $temp_g * 1.53;
	$i = $temp3 * $b;
	$j = $h - $i;
	$k = $j * $e;
	$l = $f * 1.53;
	$m = $b + ($b * $c) + ($b * $c * $d);
	$level = $g * 100;
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="css/background.css" />
<link rel="stylesheet" href="css/themes/Blues_a.css" />
<link rel="stylesheet" href="css/themes/jquery.mobile.icons.min.css" />
<link rel="stylesheet" href="css/jquery_mobile_structure-1.4.2.min.css" /> 
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/mobile_init.js"></script>
<script src="js/jquery.mobile-1.4.2.min.js"></script>
    <title>보상 시뮬레이션 2</title>
	<style>
		/* 초기화 */
		@font-face { font-family: '고딕'; src: url('css/나눔고딕.ttf'); }
		* { font-family: '고딕'; text-shadow: none; }
		a { text-decoration: none; }

		/* 출력 화면 */
		.wrap { padding: 5px; font-size: 16px; font-weight: bold; }
		.text { border: 1px solid #d9d9d9; border-radius: 10px; margin: 20px auto; padding: 10px; width: 280px; clear: both; }
		.left { width: 120px; height: 25px; text-align: left; float: left; }
		.right { width: 150px; height: 25px; text-align: right; float: left; }
	</style>
</head>
<body>
    <div data-role="page" id="background">
        <div data-role="header" data-position="fixed">
            <h1>보상 시뮬레이션 2</h1>
			<a href="#" data-rel="back" data-icon="back" style="background-color: white;">뒤로</a>
        </div>
		<div data-role="content">
			<div class="wrap">
				<div class="text">
					<?
						$a = number_format($a);
						$b = number_format($b);
						$c = number_format($c);
						$d = number_format($d);
					?>
					<div style="width: 280px; height: 120px;">
						<div class="left">본인 점수치 &nbsp;&nbsp;&nbsp;&nbsp;:</div><div class="right"><? echo "$a"; ?>점</div>
						<div class="left">단계 1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</div><div class="right"><? echo "$b"; ?>명</div>
						<div class="left">단계 2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</div><div class="right"><? echo "$c"; ?>명</div>
						<div class="left">단계 3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</div><div class="right"><? echo "$d"; ?>명</div>
						<div class="left">사용월수&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</div><div class="right"><? echo "$e"; ?>개월</div>
					</div>
				</div>
				<div class="text">
					<?
						$f = number_format($f);
						$h = number_format($h);
						$i = number_format($i);
						$j = number_format($j);
						$k = number_format($k);
						$l = number_format($l);
					?>
					<div style="width: 280px; height: 95px;">
						<div class="left">총 레그수 &nbsp;&nbsp;&nbsp;:</div><div class="right"><? echo "$m"; ?>명</div>
						<div class="left">총 점수치 &nbsp;&nbsp;&nbsp;:</div><div class="right"><? echo "$f"; ?>점</div>
						<div class="left">총 가격치 &nbsp;&nbsp;&nbsp;:</div><div class="right"><? echo "$l"; ?>점</div>
						<div class="left">레벨 %&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</div><div class="right"><? echo "$level"; ?>%</div>
					</div>
				</div>
				<div class="text" style="width: 280px; height: 95px; background-color: #d9d9d9;">
					<div class="left">총 보너스&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</div><div class="right"><? echo "$h"; ?>원</div>
					<div class="left">하위 보너스&nbsp;&nbsp;&nbsp; :</div><div class="right"><? echo "$i"; ?>원</div>
					<div class="left"><font color="red">본인 보너스&nbsp;&nbsp;&nbsp; :</div><div class="right"><? echo "$j"; ?>원</font></div>
					<div class="left">누계 보너스&nbsp;&nbsp;&nbsp; :</div><div class="right"><? echo "$k"; ?>원</div>
				</div>
			</div>
		</div>
        <div data-role="footer" data-position="fixed">
            <div data-role="navbar">
                <ul class="footer_ul">
                    <li><a href="main.php"><img src="img/icon/홈.png" class="img35" /></a></li>
                    <li><a href="Basket.php"><img src="img/icon/장바구니.png" class="img35" /></a></li>
                    <li><a href="RSP_page.php"><img src="img/icon/상담결과.png" class="img35" /></a></li>
                </ul>
				<div class="bar">리크루팅 시뮬레이션 프로그램</div>
            </div>
        </div>
    </div>
</body>
</html>