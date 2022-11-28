
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?

 
$name_01=$_POST['uname'];
$mail_02=$_POST['email'];
$phone_03=$_POST['phone'];
$subject_04=$_POST['subject'];

$msg_05=$_POST['message'];


$to='kss10201020@naver.com';
$subject='GS파워 사이트에서 관리자에게 보낸 메일';
$msg="보낸사람:$name_01\n".
     "보낸사람메일주소:$mail_02\n".
     "보낸사람전화번호:$phone_03\n".
     "제목:$subject_04\n".
     "내용:$msg_05\n";

mail($to,$subject,$msg,'보낸사람메일주소:'.$mail_02);   

echo "<script>
       alert('성공적으로 메일이 전송되었습니다.');
       //history.go(-1);
       location.href='sub5_1.html' ;
</script>
"


?>



