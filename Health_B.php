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
		if (product_list.menu.value == 'AB01') { location.replace("Health_B.php?code=intestine"); }
		if (product_list.menu.value == 'AB02') { location.replace("Health_B.php?code=stomacgh"); }
		if (product_list.menu.value == 'AB03') { location.replace("Health_B.php?code=bon"); }
		if (product_list.menu.value == 'AB04') { location.replace("Health_B.php?code=joint"); }
		if (product_list.menu.value == 'AB05') { location.replace("Health_B.php?code=eye"); }
		if (product_list.menu.value == 'AB06') { location.replace("Health_B.php?code=liver"); }
		if (product_list.menu.value == 'AB07') { location.replace("Health_B.php?code=brain"); }
		if (product_list.menu.value == 'AB08') { location.replace("Health_B.php?code=heart"); }
		if (product_list.menu.value == 'AB09') { location.replace("Health_B.php?code=immune"); }
		if (product_list.menu.value == 'AB10') { location.replace("Health_B.php?code=kidney"); }
		if (product_list.menu.value == 'AB11') { location.replace("Health_B.php?code=breathing"); }
		if (product_list.menu.value == 'AB12') { location.replace("Health_B.php?code=activation"); }
		if (product_list.menu.value == 'AB13') { location.replace("Health_B.php?code=male"); }
		if (product_list.menu.value == 'AB14') { location.replace("Health_B.php?code=female"); }
		if (product_list.menu.value == 'AB15') { location.replace("Health_B.php?code=kid"); }
		if (product_list.menu.value == 'AB16') { location.replace("Health_B.php?code=skin"); }
		if (product_list.menu.value == 'AB17') { location.replace("Health_B.php?code=energy"); }
		if (product_list.menu.value == 'AB18') { location.replace("Health_B.php?code=sleep"); }
		if (product_list.menu.value == 'AB19') { location.replace("Health_B.php?code=thyroid"); }
		if (product_list.menu.value == 'AB20') { location.replace("Health_B.php?code=sulfation"); }
		if (product_list.menu.value == 'AB21') { location.replace("Health_B.php?code=total"); }
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
	if(!strcmp($code, 'intestine')) {
		$sql = "select * from product_list where small_class LIKE '장건강'";
	} else if(!strcmp($code, 'stomacgh')) {
		$sql = "select * from product_list where small_class LIKE '위건강'";
	} else if(!strcmp($code, 'bon')) {
		$sql = "select * from product_list where small_class LIKE '뼈건강'";
	} else if(!strcmp($code, 'joint')) {
		$sql = "select * from product_list where small_class LIKE '관절건강'";
	} else if(!strcmp($code, 'eye')) {
		$sql = "select * from product_list where small_class LIKE '눈건강'";
	} else if(!strcmp($code, 'liver'))  {
		$sql = "select * from product_list where small_class LIKE '간건강'";
	} else if(!strcmp($code, 'brain'))  {
		$sql = "select * from product_list where small_class LIKE '뇌건강'";
	} else if(!strcmp($code, 'heart')) {
		$sql = "select * from product_list where small_class LIKE '심장건강'";
	} else if(!strcmp($code, 'immune')) {
		$sql = "select * from product_list where small_class LIKE '면역건강'";
	} else if(!strcmp($code, 'kidney')) {
		$sql = "select * from product_list where small_class LIKE '신장건강'";
	} else if(!strcmp($code, 'breathing')) {
		$sql = "select * from product_list where small_class LIKE '호흡건강'";
	} else if(!strcmp($code, 'activation')) {
		$sql = "select * from product_list where small_class LIKE '췌장건강'";
	} else if(!strcmp($code, 'male')) {
		$sql = "select * from product_list where small_class LIKE '남성건강'";
	} else if(!strcmp($code, 'female')) {
		$sql = "select * from product_list where small_class LIKE '여성건강'";
	} else if(!strcmp($code, 'kid')) {
		$sql = "select * from product_list where small_class LIKE '어린이건강'";
	} else if(!strcmp($code, 'skin')) {
		$sql = "select * from product_list where small_class LIKE '피부건강'";
	} else if(!strcmp($code, 'energy')) {
		$sql = "select * from product_list where small_class LIKE '활성에너지'";
	} else if(!strcmp($code, 'sleep')) {
		$sql = "select * from product_list where small_class LIKE '숙면(신경안정)'";
	} else if(!strcmp($code, 'thyroid')) {
		$sql = "select * from product_list where small_class LIKE '갑상선건강'";
	} else if(!strcmp($code, 'sulfation')) {
		$sql = "select * from product_list where small_class LIKE '항산화건강'";
	} else if(!strcmp($code, 'total')) {
		$sql = "select * from product_list where small_class LIKE '기타'";
	}
	
	mysql_query("set session character_set_connection=utf8;");
	mysql_query("set session character_set_results=utf8;");
	mysql_query("set session character_set_client=utf8;");

	$res =  mysql_query($sql, $connect) or die(mysql_error());

	$product_num = "SELECT COUNT( * ) 
					FROM product_list
					WHERE product_code LIKE  'AB%'
					GROUP BY small_class
					ORDER BY  `product_code` ASC  ";

	$result = mysql_query($product_num, $connect) or die(mysql_error());

	$i = 0;

	while($result_count = mysql_fetch_row($result)) {
		$count[$i] = $result_count[0];
		$i++;
	}
?>
    <title>영양공급</title>
	<style>
		@font-face { font-family: "고딕"; src: url("css/나눔고딕.ttf"); }
		* { font-family: "고딕"; }
	</style>
</head>
<body>
    <div data-role="page" id="background">
        <div data-role="header" data-position="fixed" style="background-color: #298819; color: white;">
            <h1>RSP - 건강</h1>
            <div data-role="navbar">
                <ul class="header_ul">
                    <li><a href="Health_A.php?code=jang">솔루션</a></li>
                    <li><a href="Health_B.php?code=intestine" class="ui-btn-active">영양공급</a></li>
                </ul>
            </div>
        </div>
        <div data-role="content">
            <form name = "product_list" method="post" action = 'insert_Basket.php'>
                <div class="list_wrap">
					<div class='sel'>
						<select name = "menu" onChange="javascript:menu_select()">
							<option value='AB01' <? if(!strcmp($code, 'intestine')) { echo "selected='selected'"; } ?>>장건강 (<? echo "$count[0]"?>)</option>
							<option value='AB02'<? if(!strcmp($code, 'stomacgh')) { echo "selected='selected'"; } ?>>위건강 (<? echo "$count[1]"?>)</option>
							<option value='AB03'<? if(!strcmp($code, 'bon')) { echo "selected='selected'"; } ?>>뼈건강 (<? echo "$count[2]"?>)</option>
							<option value='AB04'<? if(!strcmp($code, 'joint')) { echo "selected='selected'"; } ?>>관절건강 (<? echo "$count[3]"?>)</option>
							<option value='AB05'<? if(!strcmp($code, 'eye')) { echo "selected='selected'"; } ?>>눈건강 (<? echo "$count[4]"?>)</option>
							<option value='AB06'<? if(!strcmp($code, 'liver')) { echo "selected='selected'"; } ?>>간건강 (<? echo "$count[5]"?>)</option>
							<option value='AB07'<? if(!strcmp($code, 'brain')) { echo "selected='selected'"; } ?>>뇌건강 (<? echo "$count[6]"?>)</option>
							<option value='AB08'<? if(!strcmp($code, 'heart')) { echo "selected='selected'"; } ?>>심장건강 (<? echo "$count[7]"?>)</option>
							<option value='AB09'<? if(!strcmp($code, 'immune')) { echo "selected='selected'"; } ?>>면역건강 (<? echo "$count[8]"?>)</option>
							<option value='AB10'<? if(!strcmp($code, 'kidney')) { echo "selected='selected'"; } ?>>신장건강 (<? echo "$count[9]"?>)</option>
							<option value='AB11'<? if(!strcmp($code, 'breathing')) { echo "selected='selected'"; } ?>>호흡건강 (<? echo "$count[10]"?>)</option>
							<option value='AB12'<? if(!strcmp($code, 'activation')) { echo "selected='selected'"; } ?>>췌장건강 (<? echo "$count[11]"?>)</option>
							<option value='AB13'<? if(!strcmp($code, 'male')) { echo "selected='selected'"; } ?>>남성건강 (<? echo "$count[12]"?>)</option>
							<option value='AB14'<? if(!strcmp($code, 'female')) { echo "selected='selected'"; } ?>>여성건강 (<? echo "$count[13]"?>)</option>
							<option value='AB15'<? if(!strcmp($code, 'kid')) { echo "selected='selected'"; } ?>>어린이건강 (<? echo "$count[14]"?>)</option>
							<option value='AB16'<? if(!strcmp($code, 'skin')) { echo "selected='selected'"; } ?>>피부건강 (<? echo "$count[15]"?>)</option>
							<option value='AB17'<? if(!strcmp($code, 'energy')) { echo "selected='selected'"; } ?>>활성에너지 (<? echo "$count[16]"?>)</option>
							<option value='AB18'<? if(!strcmp($code, 'sleep')) { echo "selected='selected'"; } ?>>숙면 (신경안정) (<? echo "$count[17]"?>)</option>
							<option value='AB19'<? if(!strcmp($code, 'thyroid')) { echo "selected='selected'"; } ?>>갑상선건강 (<? echo "$count[18]"?>)</option>
							<option value='AB20'<? if(!strcmp($code, 'sulfation')) { echo "selected='selected'"; } ?>>항산화건강 (<? echo "$count[19]"?>)</option>
							<option value='AB21'<? if(!strcmp($code, 'total')) { echo "selected='selected'"; } ?>>기타 (<? echo "$count[20]"?>)</option>
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
										<div class='basket_btn'><input type='button' value='담기' onClick=\"javascript:basket_select($array[product_code])\" data-mini='true' style='font-size: 14px;' /></div>
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