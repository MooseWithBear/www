<?
session_start();
@extract($_POST);
@extract($_GET);
@extract($_SESSION);

//세션변수
//view.php?num=7&page=1

include "../lib/dbconnect.php";

$sql = "select * from greet where num=$num";
$result = mysql_query($sql, $connect);

$row = mysql_fetch_array($result); //하나의 레코드 가져오기    

$item_num = $row["num"];
$item_id = $row["id"];
$item_name = $row["name"];
$item_nick = $row["nick"];
$item_hit = $row["hit"];
$item_date = $row["regist_day"];
$item_date = substr($item_date, 0, 10);

$item_subject = str_replace(" ", "&nbsp;", $row["subject"]);
$item_content = $row["content"];
$is_html = $row["is_html"];

if ($is_html != "y") {
	$item_content = str_replace(" ", "&nbsp;", $item_content);
	$item_content = str_replace("\n", "<br>", $item_content); //엔터값을 <br>태그로 변경
}

$new_hit = $item_hit + 1;

$sql = "update greet set hit=$new_hit where num=$num"; // 글 조회수 증가시킴
mysql_query($sql, $connect);
?>

<!DOCTYPE html>
<html lang="ko">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>공지사항-상세</title>
	<script src="https://kit.fontawesome.com/218900a9a2.js" crossorigin="anonymous"></script>
	<script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-replace-svg="nest"></script>

	<link rel="stylesheet" href="../sub1/common/css/sub_common_active.css">
	<link rel="stylesheet" href="../common/css/common.css">
	<link rel="stylesheet" href="../sub4/common/css/sub4common.css">
	<link rel="stylesheet" href="../sub4/css/sub4_content1.css">

	<link rel="stylesheet" href="./css/greet.css">
	<script>
		function del(href) //delete.php?num=7(num)
		{
			if (confirm("삭제된 자료는 복구가 불가능합니다.\n\n정말 삭제하시겠습니까?")) {
				document.location.href = href;
			}
		}
	</script>
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
				<h3>Notice View</h3>

				<ul class="moveBox">
					<?
    //이전글 다음글 찾기
    $next = "SELECT * FROM greet WHERE num > $item_num ORDER BY num ASC LIMIT 1";
    $prev = "SELECT * FROM greet WHERE num < $item_num ORDER BY num DESC LIMIT 1";
    $result1 = mysql_query($next, $connect);
    $result2 = mysql_query($prev, $connect);
    $rowNext = mysql_fetch_array($result1); //하나의 레코드 가져오기    
    $rowPrev = mysql_fetch_array($result2); //하나의 레코드 가져오기    
    $num_next = $rowNext["num"];
    $num_prev = $rowPrev["num"];
    if ($num_next == 0 && $num_prev == 0) {
	    echo ("
		<script>
		window.alert('마지막 글입니다.')
		history.go(-1)
		</script>
		");
	    exit;
    }
    ?>
					<li><a class="prev move" href="view.php?num=<?= $num_prev ?>#noticeJump"><i
								class="fa-solid fa-caret-left"></i> 이전글 </a></li>
					<li><a class="next move" href="view.php?num=<?= $num_next ?>#noticeJump"> 다음글 <i
								class="fa-solid fa-caret-right"></i></a></li>
				</ul>

				<form name="view_form" class="view_form">
					<div id="view_title3">
						<ul class="btn_wrap btn_wrap2">
							<?
                                if ($userlevel == 1 || $userid == "GS POWER") {
                                ?>
							<!-- <li><a href="write_form.php" >글쓰기</a></li> -->
							<li><a class="del" href="javascript:del('delete.php?num=<?= $num ?>')">게시글 삭제</a></li>
							<?
                                }
                                ?>
						</ul>
					</div>

					<div class="view_title">
						<div id="view_title1">
							<?= $item_subject ?>
						</div>
						<div id="view_title2">
							<ul>
								<li>
									<?= $item_nick ?>
								</li>
								<li><i style="margin-right: 10px;" class="fa-regular fa-eye"></i><span
										class="hidden">조회</span>
									<?= $item_hit ?>
								</li>
								<li>
									<?= $item_date ?>
								</li>
							</ul>
						</div>
					</div>

					<div id="view_content">
						<?= $item_content ?>
					</div>


					<div class="view_gbtn">
						<ul class="btn_wrap btn_wrap2 btn_list">
							<li><a href="list.php?page=<?= $page ?>#noticeJump" class="btn btn1">목록</a></li>
							<?
                            if ($userlevel == 1 || $userid == "GS POWER") {
                            ?>
							<li><a class="btn btn2"
									href="modify_form.php?num=<?= $num ?>&page=<?= $page ?>#noticeJump">수정</a></li>
							<?
                            }
                            ?>
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