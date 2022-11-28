<?
session_start();

@extract($_POST);
@extract($_GET);
@extract($_SESSION);
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입 - 정보수정</title>
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">

    <!-- <link rel="stylesheet" href="./css/member_common.css">
    <link rel="stylesheet" href="./css/member_form.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <script src="../common/js/prefixfree.min.js"></script>
    <script src="../common/js/jquery-1.12.4.min.js"></script>
    <script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
    <!-- <script src="./js/member_check.js"></script> -->
    <script>
        $(document).ready(function () {

            //id 중복검사
            // $("#id").keyup(function() {     // id입력 상자에 id값 입력시
            //     var id = $('#id').val();    //a

            //         $.ajax({
            //             type: "POST",
            //             url: "check_id.php",
            //             data: "id="+ id,        // check_id.php?id= +id
            //             cache: false,
            //             success: function(data)
            //             {
            //                 //data => echo "문자열" 이 저장된
            //                 // console.log(data);
            //                 $("#loadtext").html(data);
            //             }
            //         });
            // });

            //nick 중복검사		 
            $("#nick").keyup(function () {    // id입력 상자에 id값 입력시
                var nick = $('#nick').val();

                $.ajax({
                    type: "POST",
                    url: "check_nick.php",
                    data: "nick=" + nick,
                    cache: false,
                    success: function (data) {
                        $("#loadtext2").html(data);
                    }
                });
            });

            //pass_confirm
            $("#pass_confirm").keyup(function () {

                if ($('#pass').val() == $('#pass_confirm').val()) {
                    $('#loadtext_pass_confirm').html('<span class="success">비밀번호가 일치합니다.</span>');
                    $('#pass_confirm').parent().parent('dl').removeClass('fail');
                    $('#pass_confirm').parent().parent('dl').addClass('success');
                } else {
                    $('#loadtext_pass_confirm').html('<span class="fail">비밀번호가 일치하지 않습니다.</span>');
                    $('#pass_confirm').parent().parent('dl').removeClass('success');
                    $('#pass_confirm').parent().parent('dl').addClass('fail');
                }
            });

        });
    </script>
    <script>
        function check_input() {
            if (!document.member_form.pass.value) {
                alert("비밀번호를 입력하세요");
                document.member_form.pass.focus();
                return;
            }

            if (!document.member_form.pass_confirm.value) {
                alert("비밀번호확인을 입력하세요");
                document.member_form.pass_confirm.focus();
                return;
            }

            if (!document.member_form.name.value) {
                alert("이름을 입력하세요");
                document.member_form.name.focus();
                return;
            }

            if (!document.member_form.nick.value) {
                alert("닉네임을 입력하세요");
                document.member_form.nick.focus();
                return;
            } else if (document.member_form.nick.value.indexOf(' ') > -1) {
                alert("공백을 포함하지 않는 닉네임을 입력하세요");
                document.member_form.nick.focus();
                return;
            }

            if (!document.member_form.hp2.value || !document.member_form.hp3.value) {
                alert("휴대폰 번호를 입력하세요");
                document.member_form.nick.focus();
                return;
            }

            if (document.member_form.pass.value !=
                document.member_form.pass_confirm.value) {
                alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");
                document.member_form.pass.focus();
                document.member_form.pass.select();
                return;
            }

            document.member_form.submit();
        }

        function reset_form() {
            // document.member_form.id.value = "";
            // document.member_form.pass.value = "";
            // document.member_form.pass_confirm.value = "";
            // document.member_form.name.value = "";
            // document.member_form.nick.value = "";
            // document.member_form.hp1.value = "010";
            // document.member_form.hp2.value = "";
            // document.member_form.hp3.value = "";
            // document.member_form.email1.value = "";
            // document.member_form.email2.value = "";

            // document.member_form.id.focus();

            // return;

            history.go(-1);
        }
    </script>
</head>
<?
//$userid='green';

include "../lib/dbconnect.php";

$sql = "select * from member where id='$userid'";
$result = mysql_query($sql, $connect);

$row = mysql_fetch_array($result);
//$row[id]....$row[level]

$hp = explode("-", $row[hp]); //000-0000-0000
$hp1 = $hp[0];
$hp2 = $hp[1];
$hp3 = $hp[2];

$email = explode("@", $row[email]);
$email1 = $email[0];
$email2 = $email[1];

mysql_close();
?>

<body class="flex flex-col h-full font-sans text-gray-900">
    <article id="content">
        <div class="flex justify-center px-6 pb-16 mt-20 sm:mt-10 sm:px-0">
            <div class="w-full max-w-md">
                <a href="../index.html">
                    <h1 class="hidden">GS파워로고</h1>
                    <img class="w-auto h-24 mx-auto" src="../common/images/gslogo.png" alt="gs파워로고">
                </a>
                <h2 class="mt-6 text-2xl font-bold text-center sm:text-3xl">GS POWER에 오신것을 환영합니다.</h2>
                <p class="mt-2 text-sm text-center text-gray-600">GS 파워는 깨끗한 지구를 만들기 위해 노력하는 친환경 에너지 기업입니다.</p>
                <div class="mx-4 sm:mx-0">
                    <br>
                    <div class="relative mt-7">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-500/30 "></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <h2 class="px-2 text-gray-500 bg-white">회원정보 수정</h2>
                        </div>
                    </div>
                    <form class="space-y-4 md:space-y-6" name="member_form" method="post" action="modify.php">
                        <div>
                            <label for="id" class="block mb-2 text-sm font-medium text-gray-900 ">아이디</label>
                            <input type="text" name="id" id="id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:none focus:border-blue-600 block w-full p-2.5"
                                value="<?= $row[id] ?>" disabled>
                            <span id="loadtext"></span>
                        </div>
                        <div>
                            <label for="pass" class="block mb-2 text-sm font-medium text-gray-900 ">비밀번호</label>
                            <input type="password" name="pass" id="pass" placeholder="비밀번호를 입력하세요"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 "
                                required="">
                        </div>
                        <div>
                            <label for="pass_confirm"
                                class="block mb-2 text-sm font-medium text-gray-900 notice_txt ">비밀번호 확인</label>
                            <input type="password" name="pass_confirm" id="pass_confirm" placeholder="비밀번호를 한번 더 입력하세요"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 "
                                required="">
                            <div class="notice_txt" id="loadtext_pass_confirm"></div>
                        </div>
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">이름</label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 "
                                value="<?= $row[name] ?>" required>
                        </div>
                        <div>
                            <label for="nick" class="block mb-2 text-sm font-medium text-gray-900 ">닉네임</label>
                            <input type="text" name="nick" id="nick"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 "
                                value="<?= $row[nick] ?>" required>
                            <span id="loadtext2"></span>
                        </div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 ">연락처</label>
                        <div style="margin-top: 10px;" class="flex justify-between">
                            <label class="hidden" for="hp1">전화번호앞3자리</label>
                            <select
                                class="hp text-center bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-1/4 p-2.5 "
                                name="hp1" id="hp1">
                                <option value='010' <?php if ($hp1=="010")
                                echo "selected='selected'"; ?>>010</option>
                                <option value='011' <?php if ($hp1=="011")
                                echo "selected='selected'"; ?>>011</option>
                                <option value='016' <?php if ($hp1=="016")
                                echo "selected='selected'"; ?>>016</option>
                                <option value='017' <?php if ($hp1=="017")
                                echo "selected='selected'"; ?>>017</option>
                                <option value='018' <?php if ($hp1=="018")
                                echo "selected='selected'"; ?>>018</option>
                                <option value='019' <?php if ($hp1=="019")
                                echo "selected='selected'"; ?>>019</option>
                            </select>
                            <label class="hidden" for="hp2">전화번호중간4자리</label>
                            <input
                                class=" bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-1/3 p-2.5 "
                                type="text" class="hp" name="hp2" value="<?= $hp2 ?>" id="hp2" required>
                            <label class="hidden" for="hp3">전화번호끝4자리</label>
                            <input
                                class=" bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-1/3 p-2.5 "
                                type="text" class="hp" name="hp3" value="<?= $hp3 ?>" id="hp3" required>
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 " for="email1">메일주소</label>
                            <div class="flex items-center justify-between">
                                <input type="text" id="email1" name="email1"
                                    class=" bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-6/12 p-2.5 "
                                    placeholder="local-part" value="<?= $email1 ?>" required>
                                <span>@</span>
                                <label class="hidden" for="email2">도메인주소</label>
                                <input type="text" id="email2" name="email2"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-5/12 p-2.5 "
                                    placeholder="domain.com" value="<?= $email2 ?>" required>
                            </div>
                        </div>
                        <div style="margin-top:40px;">
                            <button onclick="check_input()" type="button"
                                class="w-full  block text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">회원정보
                                수정
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </article>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
</body>
</html>