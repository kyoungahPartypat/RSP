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
    <title>보상 시뮬레이션 1</title>
	<style>
		/* 초기화 */
		@font-face { font-family: '고딕'; src: url('css/나눔고딕.ttf'); }
		* { font-family: '고딕'; }
		a { text-decoration: none; }
		img { width: 100%; height: 100%; }
		
		/* 보기 */
		.wrap { text-align: center; }
		.simul_img4_1 { width: 280px; height: 270px; border-radius: 10px; margin: 0 auto; margin-bottom: 20px; }
		.text { background-color: #eaede2; color: #616d3f; padding: 5px; border-radius: 10px; font-weight: bold; margin-bottom: 20px; font-size: 14px; }
		.white { background-color: white; border-radius: 10px; color: #69adda; padding: 5px; }
		.simul_img4_2 { width: 260px; height: 73px; }
		.simul_img4_3 { width: 130px; height: 73px; }
	</style>
</head>
<body>
    <div data-role="page" id="background">
        <div data-role="header" data-position="fixed">
            <h1>보상 시뮬레이션 1</h1>
			<a href="#" data-rel="back" data-icon="back" style="background-color: white;">뒤로</a>
        </div>
		<div data-role="content">
			<div class="wrap">
				<div class="text">
					당신이 후원한 6명의 ABO가 각자 4명의 ABO들은 후원하고 이 4명의 ABO가 다시 각 2명의 새로운 ABO를 후원하여 이들 각 개인의 실적이 200,000PV에 이른다고 할 경우
					당신이 직접 후원한 6개의 각 그룹은 2,600,000PV가 되며, 당신의 월 총 실적은 15,800,000PV가 됩니다. 당신에게 지급되는 후원 수당은 아래와 같이 산출됩니다.<br />
					(PV와 BV가 동일하다고 가정)<br /><br />
					이런 실적이 12개월 중 총 6개월(그 중 3개월은 연속적으로)동안 지속될 경우, 당신은 플래티늄(Platinum)의 위치에 오르게 됩니다.
				</div>
				<img src="img/simulation1/4_1.png" class="simul_img4_1" />
				<div class="white">
					<b>▶ 당신의 월 후원수당 ◀</b>
					<br /><br />
					<div class="text">
					그룹후원수당 : 15,800,000 BV X 21% = 3,318,000원<br />
					다운라인에게 지급해야 할 후원수당 : 2,600,000 BV X 12% X 6레그 = 1,872,000원
					</div>			
					<img src="img/simulation1/4_2.png" class="simul_img4_2" />
					<img src="img/simulation1/4_3.png" class="simul_img4_3" />
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