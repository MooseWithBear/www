<?
	function latest_article($table, $loop, $char_limit) //table 테이블명(구분 처리), loop 출력 게시글 개수, char_limit 글자 제한 바이트 수
	{	
		//latest_article("greet", 5, 30);
		include "dbconnect.php";

		$sql = "select * from $table order by num desc limit $loop";
		$result = mysql_query($sql, $connect);

		echo"<ul>";

		while ($row = mysql_fetch_array($result))
		{
			$num = $row[num]; //db실제 필드 번호
			$nick = $row[nick];

			$len_subject = mb_strlen($row[subject], 'utf-8'); //mb 한글도 1자로 처리(기본 2자), 제목의 총글자수 처리 40(제목)
			$subject = $row[subject];

			$len_content = mb_strlen($row[content], 'utf-8'); //mb 한글도 1자로 처리(기본 2자), 제목의 총글자수 처리 40(컨텐츠)
			$content = $row[content];

			if ($len_subject > 42) //(제목 글자수)
			{
				// $subject = str_replace( "&#039;", "'", $subject);               
				$subject = mb_substr($subject, 0, 10, 'utf-8'); //mb_substr > utf-8
				$subject = $subject."...";
			}
		
			if ($len_content > $char_limit) //(본문 글자수)
			{
				// $subject = str_replace( "&#039;", "'", $subject);               
				$content = mb_substr($content, 0, $char_limit, 'utf-8'); //mb_substr > utf-8
				$content = $content."...";
			}

			$regist_day = substr($row[regist_day], 0, 10); //'2022-02-21'

			if($table=='concert')
			{
				if($row[file_copied_0]) //첨부된 이미지가 있으면
				{ 
					$concertimg='./concert/data/'.$row[file_copied_0]; //'./concert/data/2022_02_21_10_11_00.jpg'
				}
				else
				{
					$concertimg= './concert/data/default.jpg'; //없으면 디폴트 이미지
				}
			}

			if($table=='greet')
			{
				echo "      
		
				<li><a href='./$table/view.php?table=$table&num=$num#noticeJump'>
				<dl>
				  <dt>$subject</dt>
				  <dd class='hovertext'>$content
					<span class='hovertext'>$regist_day</span>
				  </dd>
				</dl>
			  </a></li>
				";
			}
				else if($table=='concert')
				{
					echo "      
					
					<li><div><a href='./$table/view.php?table=$table&num=$num#prJump'><img style='width:100%;' src='$concertimg' alt='$subject'></a></div> <span><a href='./$table/view.php?table=$table&num=$num#prJump'>$subject</a></span></li>

					
					";  
				}
		}
		echo"</ul>";
		mysql_close();
	}
?>