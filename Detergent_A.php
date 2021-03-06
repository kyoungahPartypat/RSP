<?
	include "session_check.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="css/background.css" />
<link rel="stylesheet" href="css/style_.css" />
<link rel="stylesheet" href="css/themes/Blues.css" />
<link rel="stylesheet" href="css/themes/jquery.mobile.icons.min.css" />
<link rel="stylesheet" href="css/jquery_mobile_structure-1.4.2.min.css" /> 
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/mobile_init.js"></script>
<script src="js/jquery.mobile-1.4.2.min.js"></script>
<script>
	function basket_select(obj) {
		if(obj.value>0) {
			location.href = 'insert_Basket.php?num='+obj.value+'&code='+obj.id+'';
		}
	}
</script>
<?		
	$sql = "select * from product_list where product_code LIKE 'DA%'";

	mysql_query("set session character_set_connection=utf8;");
	mysql_query("set session character_set_results=utf8;");
	mysql_query("set session character_set_client=utf8;");

	$res =  mysql_query($sql, $connect) or die(mysql_error());
?>
    <title>주택용</title>
	<style>
		@font-face { font-family: "고딕"; src: url("css/나눔고딕.ttf"); }
		* { font-family: "고딕"; }

		.header_ul li { margin: 1%; }
		.header_ul li:nth-child(1) { width: 31.3%; }
		.header_ul li:nth-child(2) { width: 31.3%; }
		.header_ul li:nth-child(3) { width: 30.5%; }
	</style>
</head>
<body>
    <div data-role="page" id="background">
        <div data-role="header" data-position="fixed" style="background-color: #7ccbc8; color: white;">
			<h1>RSP - 세제류</h1>
            <div data-role="navbar">
                <ul class="header_ul">
                    <li><a href="Detergent_A.php" class="ui-btn-active">주택용</a></li>
                    <li><a href="Detergent_B.php">주방용</a></li>
                    <li><a href="Detergent_C.php?code=lavadura">세탁용</a></li>
                </ul>
            </div>
        </div>
        <div data-role="content">
            <form name = "product_list" method="post" action = 'insert_Basket.php'>
 				<?
					while($array = mysql_fetch_array($res)) {
						$array[price] = number_format($array[price]);
						$array[score_value] = number_format($array[score_value]);
						$array[price_value] = number_format($array[price_value]);

						echo "
							<div class='list'>
								<input type='hidden' name='product[]' value='$array[product_code]'>
								<img src='$array[product_image]' class= 'img100' onClick=\"location.href='$array[product_url]'\" />
								<div class='title'>$array[product_name]</div>
								<div class='sub'>$array[product_character]</div>
								<div class='price'>가격 : $array[price]원</div>
								<div class='sub'>점수치 : $array[score_value]점 / 가격치 : $array[price_value]점</div>
								<div class='num_wrap'>
									<img src='img/돋보기.png' style='float: left;' onClick=\"location.href='$array[product_url]'\" />
									<div class='num'>수량 :</div>
									<div class='numbox'><input type='number' id = '$array[product_code]' name = 'count[]' data-mini='true' data-clear-btn='true' min='0' max='999' style='font-size: 14px;' onKeyUp='if(this.value > 999) { this.value = this.value.substring(0, 3); }' placeholder = '0' pattern='[0-9]*' /></div>
									<div class='basket_btn'><input type='button' value='담기' onClick=\"javascript:basket_select($array[product_code])\" data-mini='true' style='font-size: 14px;' /></div>
								</div>
							</div>";
					}
				?>	
            </form>
        </div>
        <div data-role="footer" data-position="fixed" style="background-color: #2f64a5; color: white;">
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