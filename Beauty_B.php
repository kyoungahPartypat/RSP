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
		if (product_list.menu.value == 'BB01') { location.replace("Beauty_B.php?code=cleansing"); }
		if (product_list.menu.value == 'BB02') { location.replace("Beauty_B.php?code=turnover"); }
		if (product_list.menu.value == 'BB03') { location.replace("Beauty_B.php?code=boosting"); }
		if (product_list.menu.value == 'BB04') { location.replace("Beauty_B.php?code=care"); }
		if (product_list.menu.value == 'BB05') { location.replace("Beauty_B.php?code=focus"); }
		if (product_list.menu.value == 'BB06') { location.replace("Beauty_B.php?code=moyse"); }
		if (product_list.menu.value == 'BB07') { location.replace("Beauty_B.php?code=cream"); }
		if (product_list.menu.value == 'BB08') { location.replace("Beauty_B.php?code=special"); }
		if (product_list.menu.value == 'BB09') { location.replace("Beauty_B.php?code=rays"); }
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
	if(!strcmp($code, 'cleansing')) {
		$sql = "select * from product_list where small_class LIKE '클렌징'";
	} else if(!strcmp($code, 'turnover')) {
		$sql = "select * from product_list where small_class LIKE '턴오버 관리'";
	} else if(!strcmp($code, 'boosting')) {
		$sql = "select * from product_list where small_class LIKE '부스팅 토너'";
	} else if(!strcmp($code, 'care')) {
		$sql = "select * from product_list where small_class LIKE '아이케어'";
	} else if(!strcmp($code, 'focus')) {
		$sql = "select * from product_list where small_class LIKE '집중케어에센스'";
	} else if(!strcmp($code, 'moyse')) {
		$sql = "select * from product_list where small_class LIKE '모이스처라이징'";
	} else if(!strcmp($code, 'cream')) {
		$sql = "select * from product_list where small_class LIKE '크림'";
	} else if(!strcmp($code, 'special')) {
		$sql = "select * from product_list where small_class LIKE '스페셜 케어'";
	} else {
		$sql = "select * from product_list where small_class LIKE '자외선 차단'";
	}
		
	mysql_query("set session character_set_connection=utf8;");
	mysql_query("set session character_set_results=utf8;");
	mysql_query("set session character_set_client=utf8;");

	$res =  mysql_query($sql, $connect) or die(mysql_error());

	$product_num = "SELECT COUNT( * ) 
					FROM product_list
					WHERE product_code LIKE  'BB%'
					GROUP BY small_class
					ORDER BY  `product_code` ASC";

	$result = mysql_query($product_num, $connect) or die(mysql_error());

	$i = 0;

	while($result_count = mysql_fetch_row($result)){
		$count[$i] = $result_count[0];
		$i++;
	}
?>
    <title>타입</title>
	<style>
		@font-face { font-family: "고딕"; src: url("css/나눔고딕.ttf"); }
		* { font-family: "고딕"; }
	</style>
</head>
<body>
    <div data-role="page" id="background">
        <div data-role="header" data-position="fixed" style="background-color: #e35a5a; color: white;">
			<h1>RSP - 뷰티</h1>
            <div data-role="navbar">
                <ul class="header_ul">
                    <li><a href="Beauty_A.php?code=luxury">솔루션</a></li>
                    <li><a href="Beauty_B.php?code=cleansing" class="ui-btn-active">타입</a></li>
                </ul>
            </div>
        </div>
        <div data-role="content">
            <form name = "product_list" method="post" action = 'insert_Basket.php'>
                <div class="list_wrap">
					<div class='sel'>
						<select name = "menu" onChange="javascript:menu_select()">
							<option value='BB01' <? if(!strcmp($code, 'cleansing')) { echo "selected='selected'"; } ?>>클렌징 (<? echo "$count[0]"?>)</option>
							<option value='BB02' <? if(!strcmp($code, 'turnover')) { echo "selected='selected'"; } ?>>턴오버 관리 (<? echo "$count[1]"?>)</option>
							<option value='BB03' <? if(!strcmp($code, 'boosting')) { echo "selected='selected'"; } ?>>부스팅 토너 (<? echo "$count[2]"?>)</option>
							<option value='BB04' <? if(!strcmp($code, 'care')) { echo "selected='selected'"; } ?>>아이케어 (<? echo "$count[3]"?>)</option>
							<option value='BB05' <? if(!strcmp($code, 'focus')) { echo "selected='selected'"; } ?>>집중케어에센스 (<? echo "$count[4]"?>)</option>
							<option value='BB06' <? if(!strcmp($code, 'moyse')) { echo "selected='selected'"; } ?>>모이스처라이징 (<? echo "$count[5]"?>)</option>
							<option value='BB07' <? if(!strcmp($code, 'cream')) { echo "selected='selected'"; } ?>>크림 (<? echo "$count[6]"?>)</option>
							<option value='BB08' <? if(!strcmp($code, 'special')) { echo "selected='selected'"; } ?>>스페셜 케어 (<? echo "$count[7]"?>)</option>
							<option value='BB09' <? if(!strcmp($code, 'rays')) { echo "selected='selected'"; } ?>>자외선 차단 (<? echo "$count[8]"?>)</option>
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