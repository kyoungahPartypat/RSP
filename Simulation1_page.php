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
		* { font-family: '고딕'; text-shadow: none; font-weight: bold; -webkit-text-size-adjust: none; }
		a { text-decoration: none; }
		img { width: 100%; height: 100%; }

		/* 보기 */
		.wrap { text-align: center; margin-top: 10px; }
		.box { width: 283px; height: 50px; line-height: 23px; padding-top: 3px; border: 1px solid #d9d9d9; border-radius: 10px; margin-left: 10px; margin-bottom: 30px; }
		.simul_img { position: absolute; left: 40px; top: 123px; width: 67px; height: 280px; }
		.bogi_fir { width: 205px; height: 50px; line-height: 23px; padding-top: 3px; margin-bottom: 20px; margin-left: 90px; border-radius: 10px; background-color: #e8e8e8; }
		.bogi { width: 205px; height: 50px; line-height: 50px; margin-bottom: 20px; margin-left: 90px; border-radius: 10px; }		
	</style>
</head>
<body>
    <div data-role="page" id="background">
        <div data-role="header" data-position="fixed">
            <h1>보상 시뮬레이션 1</h1>
        </div>
		<div data-role="content">
			<div class="wrap">
				<img src="img/simulation1/bar.png" class="simul_img" />
				<div class="box">보상 설명<br /><font size="2">(사업과 수익구조의 기본적인 이해)</font></div>
				<div class="bogi_fir"><a href="Simulation1_sub1_page.php">보기 1<br /><font size="2">PV(판매점수치), BV(판매가격치)</font></a></div>
				<div class="bogi" style="background-color: #c6c6c6;"><a href="Simulation1_sub2_page.php">보기 2</a></div>
				<div class="bogi" style="background-color: #afafaf;"><a href="Simulation1_sub3_page.php">보기 3</a></div>
				<div class="bogi" style="background-color: #999999;"><a href="Simulation1_sub4_page.php">보기 4</a></div>
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