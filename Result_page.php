<?
	include "session_check.php";

	$sql = "select * from basket where phone_number = '$_SESSION[phone_number]'";
	
	$now = time();
	$date= date("Y-m-d", $now);
	$time = date("A h시 i분", $now);
	mysql_query("set session character_set_connection=utf8;");
	mysql_query("set session character_set_results=utf8;");
	mysql_query("set session character_set_client=utf8;");

	$res =  mysql_query($sql, $connect) or die(mysql_error());
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
	<script>
			function chk_resultform() {
				if(result_form.adviser_name.value=="") {
					alert('상담자를 입력하세요.');
					result_form.adviser_name.focus();
					return false;
				} else if(result_form.adviser_phone.value=="") {
					alert('상담자 전화번호를 입력하세요.');
					result_form.adviser_phone.focus();
					return false;
				} else if(result_form.customer_name.value=="") {
					alert('고객명을 입력하세요.');
					result_form.customer_name.focus();
					return false;
				} else if(result_form.customer_phone.value=="") {     
					alert('고객 전화번호를 입력하세요.');
					result_form.customer_phone.focus();
					return false;
				} else {
					return true;
				}
		}
	</script>
	<title>상담 결과서 1</title>
	<style>
			/* 초기화 */
			@font-face { font-family: '고딕'; src: url('css/나눔고딕.ttf'); }
			* { font-family: '고딕'; }
			a { text-decoration: none; }
			
			/* 상단 (입력칸) */
			.birth { text-align: right; border-bottom: 1px solid #d9d9d9; padding-bottom: 8px; margin-bottom: 7px; }
			.text { width: 60px; height: 43px; line-height: 43px; float: left; }
			.box { width: 80px; float: left; }
			.phone { width: 60px; height: 43px; line-height: 43px; float: right; }
			.phonebox { width: 80px; float: right; }

			/* 중단 (장바구니 리스트) */
			.itembox { border: 1px solid #d9d9d9; height: 85px; margin-bottom: 5px; padding-top: 3px; font-size: 13px; line-height: 20px; clear: both; border-radius: 10px; background-color: white; }
			.img70 { width: 70px; height: 75px; margin-left: 3px; border-raidus: 5px; float: left; margin-right: 5px; }
			.title { font-weight: bold; }
			.price { color: red; }
			.inputbox { float: left; height: 40px; }
			.num { width: 80px; float: left; }

			/* 하단 (합계 출력) */
			.con1 { clear: both; padding: 5px; border: 1px solid #d9d9d9; margin-top: 10px; line-height: 25px; border-radius: 10px; background-color: white; }
			.red { color: red; }
			.con2 { margin-top: 10px; }
			.ok { width: 150px; margin: 0 auto; margin-top: 20px; }
	</style>
</head>
<body>
    <div data-role="page" id="background">
        <div data-role="header" data-position="fixed">
            <h1>상담 결과서 1</h1>
			<a href="#" data-rel="back" data-icon="back" style="background-color: white;">뒤로</a>
        </div>
        <div data-role="content">
			<form name = "result_form" method = "post" action = "Result_insert.php" onsubmit="return chk_resultform();">
				<div class='birth'><? echo "$date $time"; ?></div>
				<div class='text'><label for='name1'>상담자</label></div>
				<div class='box'><input type='text' name= 'adviser_name' id='name1' data-mini='true' /></div>
				<div class='phonebox'><input type='text' name = 'adviser_phone' id='phone1' placeholder='번호만 입력' data-mini='true' maxlength='11' pattern='[0-9]*' /></div>
				<div class='phone'><label for='phone1'>연락처</label></div>
				<div class='text' style='clear: left;'><label for='name2'>고객명</label></div>
				<div class='box'><input type='text' name= 'customer_name' id='name2' data-mini='true' /></div>
				<div class='phonebox'><input type='text' name= 'customer_phone' id='phone2' placeholder='번호만 입력' data-mini='true' maxlength='11' pattern='[0-9]*' /></div>
				<div class='phone' style='margin-bottom: 20px;'><label for='phone2'>연락처</label></div>
				<?
					$sum = 0;
					$level = 0;
					$incentive = 0;
					$x = 0;
					$y = 0;
					$a = 0;

					while($array = mysql_fetch_array($res)) {
						$fproduct_price[$a] = number_format($array[price]);
						$fscore_value[$a] = number_format($array[score_value]);
						$fprice_value[$a] = number_format($array[price_value]);

						echo "
							<div class='itembox'>
								<img src='$array[product_image]' class='img70' />
								<div class='title'>$array[product_name]</div>
								<div class='price'>가격 : $fproduct_price[$a]원</div>
								<div class='sub'>점수치 : $fscore_value[$a]점 / 가격치 : $fprice_value[$a]점</div>
								<div class='num'>수량 : $array[product_count]개</div>
							</div>";
					
						$sum += ($array[price]*$array[product_count]);
						$x += ($array[score_value] *$array[product_count]);
						$y += ($array[price_value] *$array[product_count]);
						$a++;
					}

					if($x>=10000000) {
						$z = 0.21;
					} else if($x<10000000 && $x>=6800000) {
						$z = 0.18;
					} else if($x<6800000 && $x>=4000000) {
						$z = 0.15;
					} else if($x<4000000 && $x>=2400000) {
						$z = 0.12;
					} else if($x<2400000 && $x>=1200000) {
						$z = 0.09;
					} else if($x<1200000 && $x>=600000) {
						$z = 0.06;
					} else if($x<600000 && $x >= 200000) {
						$z = 0.03;
					}

					$incentive = $y * $z;
					$level = $z * 100;

					$fx = number_format($x);
					$fy = number_format($y);
					$fsum = number_format($sum);
					$fincentive = number_format($incentive);
				?>
				<div class='con1'>점수치 합계 : <? echo "$fx"; ?>점<br />가격치 합계 : <? echo "$fy"; ?>점
					<div class='red'>가격 합계&nbsp;&nbsp;&nbsp; : <? echo "$fsum"; ?>원<br>레벨&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <? echo "$level"; ?>%<br>캐쉬백&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <? echo "$fincentive"; ?>원</div>
				</div>
				<div class='con2'><textarea placeholder='상담 내용' name="content" id="content"></textarea></div>
				<input type = "hidden" name = "sum" value ="<? echo "$sum"; ?>">
				<input type = "hidden" name = "level" value ="<? echo "$level"; ?>">
				<input type = "hidden" name = "incentive" value ="<?echo "$incentive"; ?>">
				<div class='ok'><input type='submit' value='확인' data-mini='true' style="background-color: black;" /></div>
			</form>
        </div>
		<div data-role="footer" data-position="fixed">
            <div data-role="navbar">
                <ul class="footer_ul">
                    <li><a href="main.php"><img src="img/icon/홈.png" class="img35" /></a></li>
                    <li><a href="Basket.php" class="ui-btn-active"><img src="img/icon/장바구니.png" class="img35" /></a></li>
                    <li><a href="RSP_page.php"><img src="img/icon/상담결과.png" class="img35" /></a></li>
                </ul>
				<div class="bar">리크루팅 시뮬레이션 프로그램</div>
            </div>
        </div>
    </div>
</body>
</html>