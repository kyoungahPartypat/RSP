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
<script language='javascript'>
	function menu_select() {
		if (product_list.menu.value == 'CA01') { location.replace("Personal_A.php?code=normal"); }
		if (product_list.menu.value == 'CA02') { location.replace("Personal_A.php?code=oily"); }
		if (product_list.menu.value == 'CA03') { location.replace("Personal_A.php?code=dandruff"); }
		if (product_list.menu.value == 'CA04') { location.replace("Personal_A.php?code=damage"); }
		if (product_list.menu.value == 'CA05') { location.replace("Personal_A.php?code=loss"); }
	}	
</script>
<script>
	function basket_select(obj) {
		if(obj.value>0) {
			location.href = 'insert_Basket.php?num='+obj.value+'&code='+obj.id+'';
		}
	}
</script>
<?		
	if(!strcmp($code, 'normal')) {
		$sql = "select * from product_list where small_class LIKE '중건성'";
	} else if(!strcmp($code, 'oily')) {
		$sql = "select * from product_list where small_class LIKE '지성'";
	} else if(!strcmp($code, 'dandruff')) {
		$sql = "select * from product_list where small_class LIKE '비듬'";
	} else if(!strcmp($code, 'damage')) {
		$sql = "select * from product_list where small_class LIKE '손상'";
	} else {
		$sql = "select * from product_list where small_class LIKE '탈모'";
	}
		
	mysql_query("set session character_set_connection=utf8;");
	mysql_query("set session character_set_results=utf8;");
	mysql_query("set session character_set_client=utf8;");

	$res =  mysql_query($sql, $connect) or die(mysql_error());

	$product_num = "SELECT COUNT( * ) 
					FROM product_list
					WHERE product_code LIKE  'CA%'
					GROUP BY small_class
					ORDER BY  `product_code` ASC";

	$result = mysql_query($product_num, $connect) or die(mysql_error());

	$i = 0;

	while($result_count = mysql_fetch_row($result)) {
		$count[$i] = $result_count[0];
		$i++;
	}
?>
    <title>헤어</title>
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
        <div data-role="header" data-position="fixed" style="background-color: #ffc240; color: white;">
			<h1>RSP - 퍼스널</h1>
            <div data-role="navbar">
                <ul class="header_ul">
                    <li><a href="Personal_A.php?code=normal" class="ui-btn-active">헤어</a></li>
                    <li><a href="Personal_B.php?code=body">바디</a></li>
                    <li><a href="Personal_C.php?code=mouth">구강</a></li>
                </ul>
            </div>
        </div>
        <div data-role="content">
            <form name = "product_list" method="post" action = 'insert_Basket.php'>
                <div class="list_wrap">
					<div class='sel'>
						<select name = "menu" onChange="javascript:menu_select()">
							<option value='CA01' <? if(!strcmp($code, 'normal')) { echo "selected='selected'"; } ?>>중건성 (<? echo "$count[0]"?>)</option>
							<option value='CA02' <? if(!strcmp($code, 'oily')) { echo "selected='selected'"; } ?>>지성 (<? echo "$count[1]"?>)</option>
							<option value='CA03' <? if(!strcmp($code, 'dandruff')) { echo "selected='selected'"; } ?>>비듬 (<? echo "$count[2]"?>)</option>
							<option value='CA04' <? if(!strcmp($code, 'damage')) { echo "selected='selected'"; } ?>>손상 (<? echo "$count[3]"?>)</option>
							<option value='CA05' <? if(!strcmp($code, 'loss')) { echo "selected='selected'"; } ?>>탈모 (<? echo "$count[4]"?>)</option>
						</select>
					</div>
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
										<img src='img/돋보기.png' onClick=\"location.href='$array[product_url]'\" style='float: left;' />
										<div class='num'>수량 :</div>
										<div class='numbox'><input type='number' id = '$array[product_code]' name = 'count[]' data-mini='true' data-clear-btn='true' min='0' max='999' style='font-size: 14px;' onKeyUp='if(this.value > 999) { this.value = this.value.substring(0, 3); }' placeholder = '0' pattern='[0-9]*' /></div>
										<div class='basket_btn'><input type='button' onClick=\"javascript:basket_select($array[product_code])\" value='담기' data-mini='true' style='font-size: 14px;' /></div>
									</div>
								</div>";
						}
					?>
                </div>
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