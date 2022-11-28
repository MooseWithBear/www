<?
session_start();
@extract($_POST);
@extract($_GET);
@extract($_SESSION);
//$table, $num, $page = (get)

include "../lib/dbconnect.php";

$sql = "select * from $table where num=$num";
$result = mysql_query($sql, $connect);

$row = mysql_fetch_array($result);
// 하나의 레코드 가져오기

$item_num = $row["num"];
$item_id = $row["id"];
$item_name = $row["name"];
$item_nick = $row["nick"];
$item_hit = $row["hit"];

$image_name[0] = $row["file_name_0"];
$image_name[1] = $row["file_name_1"];
$image_name[2] = $row["file_name_2"];


$image_copied[0] = $row["file_copied_0"];
$image_copied[1] = $row["file_copied_1"];
$image_copied[2] = $row["file_copied_2"];

$item_date = $row["regist_day"];
$item_date = substr($item_date, 0, 10);
$item_subject = str_replace(" ", "&nbsp;", $row["subject"]);

$item_content = $row["content"];
$is_html = $row["is_html"];

if ($is_html != "y") {
	$item_content = str_replace(" ", "&nbsp;", $item_content);
	$item_content = str_replace("\n", "<br>", $item_content);
}

for ($i = 0; $i < 3; $i++) {
	if ($image_copied[$i]) //업로드한 파일이 존재하면 0 1 2
	{
		$imageinfo = GetImageSize("./data/" . $image_copied[$i]);
		//GetImageSize(서버에 업로드된 파일 경로 파일명)
		// => 파일의 너비와 높이값, 종류
		$image_width[$i] = $imageinfo[0]; //파일너비
		$image_height[$i] = $imageinfo[1]; //파일높이
		$image_type[$i] = $imageinfo[2]; //파일종류

		if ($image_width[$i] > 785) //785px는 레이아웃의 너비
			$image_width[$i] = 785;
	} else //null값을 집어넣음
	{
		$image_width[$i] = "";
		$image_height[$i] = "";
		$image_type[$i] = "";
	}
}

$new_hit = $item_hit + 1;

$sql = "update $table set hit=$new_hit where num=$num"; // 글 조회수 증가시킴

mysql_query($sql, $connect);
?>
<!DOCTYPE html>
<html lang="ko">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>홍보실-상세</title>
	<script src="https://kit.fontawesome.com/218900a9a2.js" crossorigin="anonymous"></script>
	<script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-replace-svg="nest"></script>
	<link rel="stylesheet" href="../sub1/common/css/sub_common_active.css">
	<link rel="stylesheet" href="../common/css/common.css">
	<link rel="stylesheet" href="../sub4/common/css/sub4common.css">
	<link rel="stylesheet" href="../sub4/css/sub4_content1.css">
	<link rel="stylesheet" href="./css/concert.css">
	<link rel="stylesheet" href="../greet/css/greet.css">
	<script>
		function del(href) {
			if (confirm("한번 삭제한 자료는 복구할 방법이 없습니다.\n\n정말 삭제하시겠습니까?")) {
				document.location.href = href;
			};
		};
		//댓글 함수
		function check_input() {
			if (!document.ripple_form.ripple_content.value) {
				alert("댓글의 내용을 입력하세요.");
				document.ripple_form.ripple_content.focus();
				return;
			};
			document.ripple_form.submit();
		};
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
			<li><a href="../greet/list.php#noticeJump">공지사항</a></li>
			<li class="current"><a href="../concert/list.php#prJump">홍보실</a></li>
		</ul>
	</div>
	<article id="content">
		<div class="titleArea">
			<div class="lineMap">
				<span><i class="fa-solid fa-house"></i> </span>&gt;
				<span>홍보센터 </span>
				&gt;<span> 홍보실</span>
			</div>
			<h2>PR ROOM</h2>
		</div>
		<div class="contentArea">


			<div class="subSlogan">
				<p>패러다임 변화를 주도하는 에너지 기업</p>
				<p>“친환경 전력을 생산하는 GS의 기술 혁신이 친환경 미래 세상을 앞당기고 있습니다.</p>
				<p id="prJump">GS파워는 미래 세대에게 물려줄 선물인 지구를 가꾸고 보전하는 일에 최선을 다하겠습니다.”</p>
			</div>
			<section class="promo">
				<h3>PR Board</h3>

				<ul class="moveBox">
					<?
    //이전글 다음글 찾기
    $next = "SELECT * FROM concert WHERE num > $item_num ORDER BY num ASC LIMIT 1";
    $prev = "SELECT * FROM concert WHERE num < $item_num ORDER BY num DESC LIMIT 1";
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
					<li><a class="prev move" href="view.php?table=concert&num=<?= $num_prev ?>#prJump"><i
								class="fa-solid fa-caret-left"></i> 이전글 </a></li>
					<li><a class="next move" href="view.php?table=concert&num=<?= $num_next ?>#prJump"> 다음글 <i
								class="fa-solid fa-caret-right"></i></a></li>
				</ul>
				<div class="view_form">
					<div id="view_title3">
						<ul class="btn_wrap btn_double center_btn" id="view_button">
							<?
                        if ($userlevel == 1 || $userid == "GS POWER") {
                        ?>

							<li><a href="javascript:del('delete.php?table=<?= $table ?>&num=<?= $num ?>#prJump')"
									class="del">게시글 삭제</a></li>
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
						<?
                for ($i = 0; $i < 3; $i++) //업로드된 이미지를 출력한다 
                {
	                if ($image_copied[$i]) //첨부된 파일이 있으면
                	{
		                $img_name = $image_copied[$i];
		                $img_name = "./data/" . $img_name;
		                // ./data/2019_03_22_10_07_15_0.jpg
                		$img_width = $image_width[$i];

		                echo "<img src='$img_name' width='$img_width'>" . "<br><br>";
	                }
                }
                ?>
						<?= $item_content ?>
					</div>

					<!-- 댓글 폼 -->
					<div class="reply_form">
						<div>
							<?
                    $sql = "select * from free_ripple where parent='$item_num'";
                    $ripple_result = mysql_query($sql);

                    while ($row_ripple = mysql_fetch_array($ripple_result)) {
	                    $ripple_num = $row_ripple["num"];
	                    $ripple_id = $row_ripple["id"];
	                    $ripple_nick = $row_ripple["nick"];
	                    $ripple_content = str_replace("\n", "<br>", $row_ripple["content"]);
	                    $ripple_content = str_replace(" ", "&nbsp;", $ripple_content);
	                    $ripple_date = $row_ripple["regist_day"];
                    ?>
							<div class="reply_wrap">
								<i class="fas fa-user-circle usericon"></i><span class="hidden">프로필 아이콘</span>
								<ul class="reply_infobox">
									<li>
										<?= $ripple_nick ?><span>
												<?= $ripple_date ?>
											</span>
									</li>
									<li>
										<?
	                    if ($userid == "GS POWER" || $userid == $ripple_id) {
		                    echo "<a href='delete_ripple.php?table=$table&num=$item_num&ripple_num=$ripple_num'><i class='fas fa-trash'></i><span class='hidden'>삭제아이콘</span> 삭제</a>";
	                    }
	                    ;
                            ?>
									</li>
								</ul>
								<div class="reply_content">
									<?= $ripple_content ?>
								</div>
							</div>
							<?
                    }
                    ?>
						</div>
						<!-- 댓글 작성 폼(로그인 유저만 사용가능) -->
						<?
                if ($userid) {
                ?>
						<form name="ripple_form" method="post"
							action="insert_ripple.php?table=<?= $table ?>&num=<?= $item_num ?>" class="writer_content">
							<div>
								<label for="ripple_content" class="hidden">댓글작성</label>
								<textarea name="ripple_content" id="ripple_content"
									placeholder="댓글을 입력해주세요."></textarea>
							</div>
							<div class="btn_wrap right_btn">
								<a id="rippleBtn" href="#rippleBtn" role="button" onclick="check_input()" class="btn btn_solid">댓글작성</a>
							</div>
						</form>
						<?
                }
                ;
                ?>
					</div>

					<div class="view_gbtn">
						<ul class="btn_wrap btn_wrap2 btn_list" id="view_button">
							<li><a href="list.php?page=<?= $page ?>#prJump" class="btn btn1">목록</a></li>
							<?
                    if ($userlevel == 1 || $userid == "GS POWER") //로그인이 되면 글쓰기
                    {
                    ?>
							<li><a href="write_form.php?table=<?= $table ?>&mode=modify&num=<?= $num ?>&page=<?= $page ?>#prJump"
									class="btn btn2">수정</a></li>
							<?
                    }
                    ?>
						</ul>
					</div>

				</div>

			</section>
			<!-- end of page_button -->
		</div>
	</article>

	<? include "../sub1/common/sub_footer.html" ?>

	<script> 

		const btn = document.getElementById('rippleBtn');
		const text = document.getElementById('ripple_content');
		const color = function () {
			if(text.value.length < 1){
				btn.classList.remove('btnActive')
			}else{
				btn.classList.add('btnActive');
			}
		} 	
		text.onkeyup = color;
  		text.onchange = color;
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