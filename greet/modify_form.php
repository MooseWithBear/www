<?
session_start();
@extract($_POST);
@extract($_GET);
@extract($_SESSION);
//세션변수 4
//num=7&page=1

include "../lib/dbconnect.php";

$sql = "select * from greet where num=$num";
$result = mysql_query($sql, $connect);

$row = mysql_fetch_array($result);
$item_subject = $row[subject];
$item_content = $row[content];
?>
<!DOCTYPE html>
<html lang="ko">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>공지사항-수정페이지</title>
	<script src="https://kit.fontawesome.com/218900a9a2.js" crossorigin="anonymous"></script>
	<script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-replace-svg="nest"></script>

	<link rel="stylesheet" href="../sub1/common/css/sub_common_active.css">
	<link rel="stylesheet" href="../common/css/common.css">
	<link rel="stylesheet" href="../sub4/common/css/sub4common.css">
	<link rel="stylesheet" href="../sub4/css/sub4_content1.css">

	<link rel="stylesheet" href="./css/greet.css">
</head>

<body>
	<? include "../sub1/common/sub_header.html" ?>


	<div class="main">
		<div class="g-wrap">
			<div class="starsCopy"></div>
			<div class="starsCopy"></div>
			<div class="starsCopy"></div>
			<div class="starsCopy"></div>
			<div class="starsCopy"></div>

			<div class="g-aurora"></div>
		</div>


		<svg id='blob' version='1.1' xmlns='http://www.w3.org/2000/svg'>
			<defs>
				<filter id='wave'>
					<feturbulence basefrequency='0.00510 0.00099' id='turbulence' numoctaves='3' result='noise'
						seed='10' />
					<fedisplacementmap id='displacement' in2='noise' in='SourceGraphic' scale='96' />
				</filter>
			</defs>
		</svg>
		<h3>홍보센터</h3>

	</div>

	<div class="subNav">
		<ul>
			<li class="current"><a href="../greet/list.php#noticeJump">공지사항</a></li>
			<li><a href="../concert/list.php#prJump">홍보실</a></li>
		</ul>
	</div>
	<article id="content">
		<div class="titleArea">
			<div class="lineMap">
				<span><i class="fa-solid fa-house"></i> </span>&gt;
				<span>홍보센터 </span>
				&gt;<span> 공지사항</span>
			</div>
			<h2>NOTICE</h2>
		</div>
		<div class="contentArea">


			<div class="subSlogan">
				<p>패러다임 변화를 주도하는 에너지 기업</p>
				<p>“친환경 전력을 생산하는 GS의 기술 혁신이 친환경 미래 세상을 앞당기고 있습니다.</p>
				<p id="noticeJump">GS파워는 미래 세대에게 물려줄 선물인 지구를 가꾸고 보전하는 일에 최선을 다하겠습니다.”</p>
			</div>

			<section class="notice">
				<h3>Notice Modify</h3>

				<form name="board_form" class="board_form" method="post"
					action="insert.php?mode=modify&num=<?= $num ?>&page=<?= $page ?>">
					<div id="write_form">

						<div class="row" id="write_row1">
							<label for="nick">작성자</label>
							<input type="text" name="nick" id="nick" class="disabled_input " value="<?= $usernick ?>"
								disabled>
							<div id="loadtext2"></div>
						</div>

						<div class="row" id="write_row2">
							<label for="subject">제목</label>
							<input type="text" name="subject" id="subject" value="<?= $item_subject ?>"
								placeholder="제목을 입력해주세요.">
						</div>

						<div class="row" id="write_row3">
							<label for="text_content">내용</label>
							<textarea name="content" id="text_content" class="text_content"
								placeholder="내용을 입력해주세요."><?= $item_content ?></textarea>
						</div>

					</div>

					<div id="page_button">
						<ul class="btn_wrap btn_wrap2">
							<li><a href="list.php?page=<?= $page ?>#noticeJump" class="btn btn5">취소</a></li>
							<li><a href="view.php?num=<?= $item_num ?>&page=<?= $page ?>#noticeJump"><button type="submit" value="등록" class="btn btn2"><span>수정</span></button></a></li>
						</ul>
					</div>
				</form>
			</section>
		</div>
	</article>
	<? include "../sub1/common/sub_footer.html" ?>
	<script>
			//reference --https://segmentfault.com/a/1190000041166007/en

			var filter = document.querySelector("#turbulence");
		var frames = 0;
		var rad = Math.PI / 180;

		function freqAnimation() {
			bfx = 0.005;
			bfy = 0.005;
			frames += .2
			bfx += 0.0025 * Math.cos(frames * rad);
			bfy += 0.0025 * Math.sin(frames * rad);

			bf = bfx.toString() + ' ' + bfy.toString();
			filter.setAttributeNS(null, 'baseFrequency', bf);
			window.requestAnimationFrame(freqAnimation);
		}

		window.requestAnimationFrame(freqAnimation);
	</script>
</body>

</html>