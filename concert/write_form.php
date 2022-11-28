<?
session_start();
@extract($_POST);
@extract($_GET);
@extract($_SESSION);
//새글쓰기 =>  concert
//수정글쓰기 => concert, $num, $page, $modify

include "../lib/dbconnet.php";

if ($mode == "modify") //수정 글쓰기면
{
	$sql = "select * from concert where num=$num";
	$result = mysql_query($sql, $connect);

	$row = mysql_fetch_array($result);

	$item_subject = $row["subject"];
	$item_content = $row["content"];

	$item_file_0 = $row["file_name_0"];
	$item_file_1 = $row["file_name_1"];
	$item_file_2 = $row["file_name_2"];

	$copied_file_0 = $row["file_copied_0"];
	$copied_file_1 = $row["file_copied_1"];
	$copied_file_2 = $row["file_copied_2"];
}


?>
<!DOCTYPE html>
<html lang="ko">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>홍보실-글쓰기</title>
	<script src="https://kit.fontawesome.com/218900a9a2.js" crossorigin="anonymous"></script>
	<script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-replace-svg="nest"></script>
	<link rel="stylesheet" href="../sub1/common/css/sub_common_active.css">
	<link rel="stylesheet" href="../common/css/common.css">
	<link rel="stylesheet" href="../sub4/common/css/sub4common.css">
	<link rel="stylesheet" href="../sub4/css/sub4_content1.css">
	<link rel="stylesheet" href="./css/concert.css">
	<link rel="stylesheet" href="../greet/css/greet.css">

	<script>
		function check_input() {
			if (!document.board_form.subject.value) {
				alert("제목을 입력하세요!");
				document.board_form.subject.focus();
				return;
			}
			if (!document.board_form.content.value) {
				alert("내용을 입력하세요!");
				document.board_form.content.focus();
				return;
			}
			document.board_form.submit();
		}

		// 파일 업로드 

		$(".file").on("change", function () {

			var filename = $(".file").val();

			$(".file_info").val(fileName);
		});

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



				<?
        if ($mode == "modify") //수정글쓰기 mode=modify&num=<?=$num~~
        {
        ?>
				<form name="board_form" method="post" class="board_form"
					action="insert.php?mode=modify&num=<?= $num ?>&page=<?= $page ?>&table=concert"
					enctype="multipart/form-data">
					<?
        } else //새글쓰기 table=<?=concert~~
        {
        ?>
					<form name="board_form" method="post" class="board_form" action="insert.php?table=concert"
						enctype="multipart/form-data">
						<?
        }
        ?>
						<div id="write_form">

							<div class="row" id="write_row1">
								<label for="nick">작성자</label>
								<input type="text" name="nick" id="nick" class="disabled_input " value="<?= $usernick ?>"
									disabled>
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

							<div class="row" id="write_row4">
								<label for="file1">이미지파일1</label>
								<input type="file" name="upfile[]" id="file1">
								<?
                if ($mode == "modify" && $item_file_0) {
                ?>
								<div class="delete_ok">
									<i class="fas fa-file-image"></i><span class="hidden">이미지 파일아이콘</span>
									<?= $item_file_0 ?>
										<input type="checkbox" id="checkbox" name="del_file[]" value="0">
										<label for="checkbox">파일삭제</label>
								</div>
								<?
                }
                ?>
							</div>
							<div class="row" id="write_row5">
								<label for="file2">이미지파일3</label>
								<input type="file" name="upfile[]" id="file2">
							</div>
							<?
            if ($mode == "modify" && $item_file_1) {
            ?>
							<div class="delete_ok">
								<?= $item_file_1 ?> 파일이 등록되어 있습니다.
									<input type="checkbox" name="del_file[]" value="1"> 삭제
							</div>
							<?
            }
            ?>
							<div class="row" id="write_row6">
								<label for="file3">이미지파일3</label>
								<input type="file" name="upfile[]" id="file3">
							</div>
							<?
            if ($mode == "modify" && $item_file_2) {
            ?>
							<div class="delete_ok">
								<?= $item_file_2 ?> 파일이 등록되어 있습니다.
									<input type="checkbox" name="del_file[]" value="2">
									삭제
							</div>
							<?
            }
            ?>
						</div>

						<div id="page_button">
							<ul class="btn_wrap btn_wrap2" id="write_button">
								<?
            if ($mode == "modify") //수정글쓰기 mode=modify&num=<?=$num~~
            {
            ?>
								<li><a href="list.php?table=concert&page=<?= $page ?>" class="btn btn5">취소</a></li>
								<li><a href="#" role="button" onclick="check_input()" class="btn btn2">수정</a></li>
								<?
            } else //새글쓰기 table=<?=concert~~
            {
            ?>
								<li><a href="list.php?table=concert&page=<?= $page ?>" class="btn btn5">취소</a></li>
								<li><a href="#" role="button" onclick="check_input()" class="btn btn3">등록</a></li>
								<?
            }
            ?>
							</ul>
						</div>
					</form>


			</section>
			<!-- end of page_button -->
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