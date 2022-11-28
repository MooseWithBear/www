<?
session_start();
@extract($_POST);
@extract($_GET);
@extract($_SESSION);

$table = "concert"; //테이블명 처리(추가 또는 테이블명 변경 시 변수만 수정)
$ripple = "free_ripple";
    //화면에 표시되는 글수
    if (!$scale) {
	    $scale = 9;
    }
?>
<!DOCTYPE html>
<html lang="ko">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>GS파워-홍보실</title>
	<script src="https://kit.fontawesome.com/218900a9a2.js" crossorigin="anonymous"></script>
	<script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" data-auto-replace-svg="nest"></script>
	<link rel="stylesheet" href="../sub1/common/css/sub_common_active.css">
	<link rel="stylesheet" href="../common/css/common.css">
	<link rel="stylesheet" href="../sub4/common/css/sub4common.css">
	<link rel="stylesheet" href="../sub4/css/sub4_content1.css">
	<link rel="stylesheet" href="./css/concert.css">
	<link rel="stylesheet" href="../greet/css/greet.css">
	<?
    include "../lib/dbconnect.php";
    //화면에 표시되는 글수
    if (!$scale) {
	    $scale = 10;
    }
    //검색 여부에 따른 리스트 출력
    if ($mode == "search") {
	    if (!$search) {
		    echo ("
				<script>
					window.alert('검색어를 입력해 주세요!');
					history.go(-1);
				</script>
				");
		    exit;
	    }
	    $sql = "select * from $table where $find like '%$search%' order by num desc";
    } else //검색X
    {
	    $sql = "select * from $table order by num desc";
    }

    $result = mysql_query($sql, $connect);
    $total_record = mysql_num_rows($result); // 전체 글 수
    
    // 전체 페이지 수($total_page) 계산 
    if ($total_record % $scale == 0) {
	    $total_page = floor($total_record / $scale);
    } else {
	    $total_page = floor($total_record / $scale) + 1;
    }
    //리스트 개수
    if (!$page) // 페이지번호($page)가 0 일 때
    {
	    $page = 1; // 페이지 번호를 1로 초기화
    }

    // 표시할 페이지($page)에 따라 $start 계산  
    $start = ($page - 1) * $scale;
    $number = $total_record - $start;
    ?>
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
				<!-- 검색 -->
				<div class="search_wrap">
					<form name="board_form" method="post" action="list.php?table=<?= $table ?>&mode=search#prJump"
						class="search_form">
						<!-- <div class="search_cat">
					<label class="hidden" for="find">검색 카테고리</label>
					<select name="find" id="find"> 
						<option value='subject'>제목</option>
						<option value='content'>내용</option>
						<option value='nick'>닉네임</option>
						<option value='name'>이름</option>
					</select>
				</div> -->
						<div id="list_search">
							<div id="list_search1">
								<label class="hidden" for="find">검색 카테고리</label>
								<select name="find" id="find">
									<option value='subject'>제목</option>
									<option value='content'>내용</option>
									<option value='nick'>닉네임</option>
									<option value='name'>이름</option>
								</select>
							</div>
							<div id="list_search2">
								<input type="text" name="search" id="search" value="<?= $search ?>"
									placeholder="검색어를 입력해주세요.">
							</div>
							<ul id="list_search3" class="btn_wrap btn_wrap2">
								<li><button type="submit" value="검색" class="btn btn1">검색</button></li>
								<li><button id="reset" type="reset" value="검색" class="btn btn3"
										onclick="location.href='list.php#prJump'">초기화</button></li>
							</ul>
						</div>
					</form>
				</div>
				<div style="margin: 130px 0 0 0;">
				<div class="tb_top">
					<p>총 <span>
							<?= $total_record ?>
						</span> 개의 소식이 있습니다.</p>
					<select name="scale" class="scale" onchange="location.href='list.php?scale='+this.value">
						<option value=''>보기</option>
						<option value='3'>3</option>
						<option value='6'>6</option>
						<option value='9'>9</option>
						<option value='12'>12</option>
					</select>
				</div>
				<div class="list_wrap2">
					<div><span class="hidden">고객리뷰 목록</span></div>
					<div class="hidden list_head">
						<ul>
							<li class="list_title1">No</li>
							<li class="list_title2">이미지</li>
							<li class="list_title3">제목</li>
							<li class="list_title4">작성자</li>
							<li class="list_title5">등록일</li>
							<li class="list_title6">조회</li>
						</ul>
					</div>

					<div class="list_body">
						<?
                        for ($i = $start; $i < $start + $scale && $i < $total_record; $i++) {
	                        mysql_data_seek($result, $i); //가져올 레코드로 위치(포인터) 이동  
                        	$row = mysql_fetch_array($result); // 하나의 레코드 가져오기
                        	$item_num = $row["num"];
	                        $item_id = $row["id"];
	                        $item_name = $row["name"];
	                        $item_nick = $row["nick"];
	                        $item_hit = $row["hit"];
	                        $item_date = $row["regist_day"];
	                        $item_date = substr($item_date, 0, 10); //2022-02-21(10자만 가지고 오기)
                        	$item_subject = str_replace(" ", "&nbsp;", $row["subject"]); //공백 문자는 태그로 바꾸기
                        	$item_content = $row["content"];
	                        // 댓글 정보
                        	$sql = "select * from $ripple where parent=$item_num";
	                        $result2 = mysql_query($sql, $connect);
	                        $num_ripple = mysql_num_rows($result2);

	                        if ($row[file_copied_0]) {
		                        $item_img = './data/' . $row[file_copied_0];
	                        } else {
		                        $item_img = './data/default.jpg';
	                        }
                        ?>
						<div OnClick="location.href='view.php?table=<?= $table ?>&num=<?= $item_num ?>&page=<?= $page ?>#prJump'"
							style="cursor:pointer;" class="item_wrap">
							<div>
								<div class="list_item1 hidden">
									<?= $number ?>
								</div>
								<div class="list_item2"><img src="<?= $item_img ?>" alt="썸네일 이미지"></div>
								<div class="bottom_item">
									<div class="list_item3">
										<?= $item_subject ?>
									</div>
									<div class="list_item4">
										<?= $item_content ?>
									</div>
									<div class="bottom_sub">
										<div class="list_item5">
											<?= $item_nick ?>
										</div>
										<div class="list_item6">
											<?= $item_date ?>
										</div>
										<div class="list_item7"><i class="fa-regular fa-eye"></i><span class="hidden">조회</span>
											<?= $item_hit ?>
										</div>
										<div class="list_item8">
											<?
	                        if ($num_ripple) //추가
                        		echo " <i style='margin-left:1rem;' class='fas fa-comment-dots'></i><span class='hidden'>댓글아이콘</span> $num_ripple"; //추가
                                            ?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?
	                        $number--;
                        }
                        ?>
					</div>
				</div>
				</div>
				<!-- 하단 버튼 -->
				<div id="page_button">
					<!-- 목록/글쓰기 버튼 -->
					<ul class="btn_wrap btn_wrap2 btn_write">
						<li><a href="list.php#prJump" class="btn btn1">목록</a></li>
						<?
                        if ($userlevel == 1 || $userid == "GS POWER") {
                        ?>
						<li><a href="write_form.php#prJump" class="btn btn3">글쓰기</a></li>

						<?
                        }
                        ?>
					</ul>



					<!-- 페이지 버튼 -->
					<div id="page_num">
						<i class="fas fa-angle-double-left"></i><span class="hidden">이전</span>
						<?
                        // 게시판 목록 하단에 페이지 링크 번호 출력
                        for ($i = 1; $i <= $total_page; $i++) {
	                        if ($page == $i) // 현재 페이지 번호 링크 안함
                        	{
		                        echo "<b> $i </b>";
	                        } else {
		                        if ($mode == "search") //검색했을때
                        		{
			                        echo "<a href='list.php?page=$i&scale=$scale&mode=search&find=$find&search=$search#prJump'> $i </a>"; //3페이지 번호랑 스케일, 검색 값을 다 넘겨줌
                        		} else //검색 안했을때
                        		{
			                        echo "<a href='list.php?page=$i&scale=$scale#prJump'> $i </a>"; //페이지 번호랑 스케일만 넘겨줌
                        		}
	                        }
                        }
                        ?>
						<i class="fas fa-angle-double-right"></i><span class="hidden">다음</span>
					</div>

				</div> <!-- end of page_button -->

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