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
    <title>보기 1</title>
	<style>
		@font-face { font-family: '고딕'; src: url('css/나눔고딕.ttf'); }
		* { font-family: '고딕'; text-shadow: none; }
		a { text-decoration: none; }
		img { width: 100%; height: 100%; }

		.wrap { text-align: center; }
		.simul_img1_1 { width: 280px; height: 100px; border-radius: 10px; margin: 0 auto; margin-bottom: 20px; }
		.text { text-align: left; background-color: #eaede2; color: #616d3f; padding: 5px; border-radius: 10px; font-weight: bold; margin-bottom: 20px; font-size: 14px; }
		.white { background-color: white; height: 187px; border-radius: 10px; color: #69adda; padding: 5px; }
		.simul_img1_2 { width: 260px; height: 73px; border-radius: 10px; }
		.simul_img1_3 { width: 130px; height: 73px; border-radius: 10px; }
	</style>
</head>
<body>
    <div data-role="page" id="background">
        <div data-role="header" data-position="fixed">
            <h1>보기 1</h1>
			<a href="#" data-rel="back" data-icon="back" style="background-color: white;">뒤로</a>
        </div>
		<div data-role="content">
			<div class="wrap">
				<div class="text">
					당신의 판매실적이 200,000PV에 도달한다고 할 경우 (PV와 BV가 동일하다고 가정)
				</div>
				<img src="img/simulation1/1_1.png" class="simul_img1_1" />
				<div class="white">
					<b>▶ 당신의 월 후원수당 ◀</b><br /><br />
					<img src="img/simulation1/1_2.png" class="simul_img1_2" />
					<img src="img/simulation1/1_3.png" class="simul_img1_3" />
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