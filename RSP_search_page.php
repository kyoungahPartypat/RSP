<?
	include "session_check.php";

	$sql = "select bno, customer, saved_date, saved_time from rsp where customer like '%$name%' and phone_number = '$_SESSION[phone_number]' order by `bno` desc";

	mysql_query("set session character_set_connection=utf8;");
	mysql_query("set session character_set_results=utf8;");
	mysql_query("set session character_set_client=utf8;");				
						
	$res = mysql_query($sql, $connect) or die (안됨);
	$count = mysql_num_rows($res);
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
			location.href = 'RSP_delete.php?bno='+obj;
		}	
	}
</script>
    <title>상담결과 보관함</title>
	<style>
		@font-face { font-family: '고딕'; src: url('css/나눔고딕.ttf'); }
		* { font-family: '고딕'; }
		a { text-decoration: none; }
	</style>
</head>
<body>
    <div data-role="page">
        <div data-role="header" data-position="fixed">
            <h1>상담결과 보관함 1</h1>
			<a href="RSP_page.php" data-icon="back" style="background-color: white;">뒤로</a>
        </div>
		<div data-role="content">			
				<?
					if($count >0) {
						while($array = mysql_fetch_assoc($res)) {
							echo "
								<ul data-role='listview' data-inset='true'>
									<li data-divider='true' style='background-color: #2f64a5; color: white;'>$array[saved_date]</li>
									<li>
										<a href = 'Share_page.php?bno=$array[bno]'>고객 : $array[customer]</a>
										<a href='javascript:conFirmEvent($array[bno])' data-icon='delete'></a>
										<span class='ui-li-aside'>$array[saved_time]</span>
									</li>
								</ul>";
						}
					} else {
						echo "
							<script>
								alert('검색결과가 없습니다.');
								location.href = 'RSP_page.php';
							</script>";
					}
				?>				
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