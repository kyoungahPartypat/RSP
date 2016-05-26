<?
	include "session_check.php";

	$sql = "select * from basket where phone_number = '$_SESSION[phone_number]' ORDER BY  `bno` DESC";

	mysql_query("set session character_set_connection=utf8;");
	mysql_query("set session character_set_results=utf8;");
	mysql_query("set session character_set_client=utf8;");

	$res =  mysql_query($sql, $connect) or die(mysql_error());
	$total = mysql_num_rows($res);
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
	function conFirmEvent(obj) {
		if(confirm("삭제하시겠습니까?")) {
			location.href = 'product_delete.php?bno='+obj.id+'';
		}
	}
</script>
<script>
	function conFirmEventTwo() {
		if(confirm("삭제하시겠습니까?")) {
			location.href = 'all_delete.php';
		}
	}
</script>
<script>
	function alter(obj) {
		location.href = 'product_alter.php?num='+obj.value+'&code='+obj.id+'';
	}
</script>
    <title>장바구니</title>
    <style>
		/* 초기화 */
		@font-face { font-family: '고딕'; src: url('css/나눔고딕.ttf'); }
		* { font-family: '고딕'; text-shadow: none; }

		/* 제품 리스트 */
        .itembox { border: 1px solid #bbbbbb; background-color: white; margin-bottom: 5px; font-size: 13px; line-height: 16px; padding-top: 5px; border-radius: 10px; }
        .img75 { width: 75px; height: 95px; margin-left: 3px; border-radius: 5px; float: left; margin-right: 5px; }
		.title { font-weight: bold; }
        .total_btn { width: 60px; height: 40px; float: right; margin-right: 5px; }
		.price { color: red; }
		.sub { float: left; width: 170px; height: 17px; line-height: 17px; }
        .inputbox { height: 75px; }
		.num { width: 40px; height: 43px; line-height: 43px; float: left; }
		.numbox { width: 70px; float: left; }

		/* 합계 출력 */
        .sum { width: 100%; margin-top: 20px; padding-top: 5px; font-size: 13px; border-top: 1px solid black; line-height: 20px; }
        .left { width: 160px; float: left; clear: right; }
        .right { width: 160px; text-align: left; float: right; color: red; }
		.top { width: 160px; clear: both; float: right; text-align: left; color: red; }

		/* 버튼 */
        .btn_wrap { clear: both; width: 220px; margin: 0 auto; padding-top: 20px; }
        .rsp_btn { width: 80px; float: left; margin-right: 5px; }
        .all_delete_btn { width: 130px; float: left; margin-left: 5px; }

		/* 빈 장바구니 */
		#bas { width: 160px; text-shadow: none; position: absolute; }
    </style>
	<script>
        $(document).ready(function () {
            $('#bas').css({ "left": (document.documentElement.clientWidth / 2) - (bas.clientWidth / 2) });
            $('#bas').css({ "top": (document.documentElement.clientHeight / 2) - (bas.clientHeight / 2) });
        });
    </script>
</head>
<body>
    <div data-role="page" id="background">
        <div data-role="header" data-position="fixed">
            <h1>장바구니</h1>
        </div>
        <div data-role="content">
			<form name = "save_form" method = "post" action = "all_save.php">
				<?
					if($total>0) {
						$num = 0;
						$sum = 0;
						$x = 0;
						$y = 0;

						while($array = mysql_fetch_array($res)) {							
							$fprice[$num] = number_format($array[price]);
							$fscore_value[$num] = number_format($array[score_value]);
							$fprice_value[$num] = number_format($array[price_value]);

							echo "
								<div class='itembox'>
									<img src='$array[product_image]' class='img75' />
									<div class='title'>$array[product_name]</div>
									<div class='total_btn'><input type='button' data-mini='true' id = '$array[bno]' value='삭제' onClick = \"javascript:conFirmEvent(this)\"/></div>
									<div class='price'>&nbsp;&nbsp;&nbsp;가격 : $fprice[$num]원</div>
									<div class='sub'>점수치 : $fscore_value[$num]점</div>
									<div class='sub'>가격치 : $fprice_value[$num]점</div>
									<div class='total_btn'><input type='button' data-mini='true' id='$num' value='수정' onclick=\"javascript:alter($array[product_code])\"/></div>
									<div class='inputbox'>
										<div class='num'>수량 : </div>
										<div class='numbox'><input type='number' data-mini='true' data-clear-btn='true' id= '$array[product_code]' value = '$array[product_count]' style='font-size: 13px;' onKeyUp='if(this.value > 999) { this.value = this.value.substring(0, 3); }' placeholder = '0' pattern='[0-9]*' /></div>
									</div>
								</div>";

							$num++;

							$sum += ($array[price]*$array[product_count]);
							$x += ($array[score_value] *$array[product_count]);
							$y += ($array[price_value] *$array[product_count]);
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

						$x = number_format($x);
						$sum = number_format($sum);
						$y = number_format($y);
						$incentive = number_format($incentive);

						echo "
							<div class='sum'>
								<div class='left'>점수치 합계 : {$x}점</div>
								<div class='right'>가격 합계 : {$sum}원</div>
								<div class='left'>가격치 합계 : {$y}점</div>
								<div class='right'>레벨&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {$level}%</div>
								<div class='top'>캐쉬백&nbsp;&nbsp;&nbsp;&nbsp; : {$incentive}원</div>
							</div>
							<div class='btn_wrap'>
								<div class='rsp_btn'><input type='button' data-mini='true' value='보관하기' style='background-color: black;' onClick= \"location.href = 'Result_page.php'\" /></div>
								<div class='all_delete_btn'><input type='button' data-mini='true' value='장바구니 비우기' style='background-color: black;' onClick= \"javascript:conFirmEventTwo()\" /></div>
							</div>";
					} else {
						echo "<div id='bas'>장바구니가 비었습니다.</div>";
					}
				?>
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