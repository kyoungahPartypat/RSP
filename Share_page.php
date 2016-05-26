<?
	include "session_check.php";

	$sql = "select * from rsp where bno = '$bno'";

	mysql_query("set session character_set_connection=utf8;");
	mysql_query("set session character_set_results=utf8;");
	mysql_query("set session character_set_client=utf8;");

	$res =  mysql_query($sql, $connect) or die(mysql_error());
	$array = mysql_fetch_array($res);
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
 $(document).keydown(function(e){   
        if(e.target.nodeName != "INPUT" && e.target.nodeName != "TEXTAREA"){       
            if(e.keyCode === 8){   
				return false;
            }
        }
    });
 
    window.history.forward(0);
</script>
    <title>상담 결과서 2</title>
	<style>
		/* 초기화 */
		@font-face { font-family: '고딕'; src: url('css/나눔고딕.ttf'); }
		* { font-family: '고딕'; text-shadow: none; }
		a { text-decoration: none; }
		
		/* 중단 (장바구니 리스트) */
		.itembox { border: 1px solid #d9d9d9; border-radius: 10px; height: 85px; margin-bottom: 5px; padding-top: 3px; font-size: 13px; line-height: 20px; clear: both; background-color: white; }
		.img70 { width: 70px; height: 85px; float: left; margin-right: 5px; margin-left: 3px; border-radius: 5px; }
		.title { font-weight: bold; }
		.price { color: red; }
		.inputbox { float: left; height: 40px; }
		.num { width: 100px; float: left; }

		/* 하단 (계산) */
		.con1 { text-align: right; border-bottom: 1px solid #d9d9d9; padding-bottom: 3px; }
		.name { width: 130px; float: left; clear: right; }
		.phone { width: 180px; text-align: right; float: right; }
		.wrap { margin-bottom: 5px; height: 40px; padding: 3px; }
		.con2 { clear: both; padding: 5px; margin-top: 10px; border: 1px solid #d9d9d9; border-radius: 10px; line-height: 23px; background-color: white; }
		.red { color: red; }
		.con3 { padding: 5px; border: 1px solid #d9d9d9; border-radius: 10px; margin-top: 10px; background-color: white; }

		/* 카톡/버튼 */
		.btn_wrap { width: 160px; height: 65px; margin: 0 auto;  margin-top: 50px; }
		.img65 { width: 65px; height: 65px; float: left; margin-right: 15px; }
	</style>
</head>
<body>
    <div data-role="page" id="background">
        <div data-role="header" data-position="fixed">
            <h1>상담 결과서 2</h1>
        </div>
        <div data-role="content">
			<?
				$array[adviser_phone] = preg_replace("/(0(?:2|[0-9]{2}))([0-9]+)([0-9]{4}$)/", "\\1-\\2-\\3", $array[adviser_phone]);
				$array[customer_phone] = preg_replace("/(0(?:2|[0-9]{2}))([0-9]+)([0-9]{4}$)/", "\\1-\\2-\\3", $array[customer_phone]);
			?>
			<div class="con1"><?echo "$array[saved_date] $array[saved_time]"; ?></div>
			<div class="wrap">
				<div class="name">상담자 : <?echo "$array[adviser]"; ?></div>
				<div class="phone">연락처 : <?echo "$array[adviser_phone]"; ?></div>
				<div class="name">고객명 : <?echo "$array[customer]"; ?></div>
				<div class="phone">연락처 : <?echo "$array[customer_phone]"; ?></div>
			</div>
			<?
				$query = "select * from rsp_basket where no = '$array[bno]'";

				mysql_query("set session character_set_connection=utf8;");
				mysql_query("set session character_set_results=utf8;");
				mysql_query("set session character_set_client=utf8;");

				$result =  mysql_query($query, $connect) or die(mysql_error());
				$num = 0;
				$x = 0;
				$y = 0;

				while($arr=mysql_fetch_array($result)) {
					$fproduct_price[$num] = number_format($arr[price]);
					$fscore_value[$num] = number_format($arr[score_value]);
					$fprice_value[$num] = number_format($arr[price_value]);

					echo "
						<div class='itembox'>
							<img src='$arr[product_image]' class='img70' />
							<div class='title'>$arr[product_name]</div>
							<div class='price'>가격 : $fproduct_price[$num]원</div>
							<div class='sub'>점수치 : $fscore_value[$num]점 / 가격치 : $fprice_value[$num]점</div>
							<div class='num'>수량 : $arr[product_count]개</div>
						</div>";

					$x +=($arr[score_value] * $arr[product_count]);
					$y +=($arr[price_value] * $arr[product_count]);
				}

				$array[product_sum] = number_format($array[product_sum]);
				$array[product_incentive] = number_format($array[product_incentive]);
				$x = number_format($x);
				$y = number_format($y);
				$num++;
			?>
			<div class='con2'>
				점수치 합계 : <? echo "$x"; ?>점<br />
				가격치 합계 : <? echo "$y"; ?>점<br />
				<div class='red'>가격 합계&nbsp;&nbsp;&nbsp; : <? echo "$array[product_sum]"; ?>원<br />레벨&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <? echo "$array[product_level]"; ?>%<br />캐쉬백&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <? echo "$array[product_incentive]"; ?>원</div>
			</div>			
			<?
				if($array[consult_content] != ""){
					echo "<div class='con3'>
							$array[consult_content]
						</div>";												
				} else {
					echo "";
				}	
			?>			
			<div class="btn_wrap">
				<img src="img/icon/카톡1.png" class="img65" onClick="location.href='kakaolink://sendurl?msg=상담결과서 입니다.&url=finsol.dothome.co.kr/Send_page.php?bno=<? echo "$bno"; ?>/&appid=mytory&appver=0.1'" />
				<img src="img/icon/카톡2.png" class="img65" onClick="location.href='RSP_sub_page.php?date=<? echo "$array[saved_date]" ?>'" style="margin-left: 15px; margin-right: 0;" />
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