<?
session_start();
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>회원가입</title>
    <link rel="stylesheet" href="../common/css/common.css">
    <link rel="stylesheet" href="css/member_form.css">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->

    <!-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> -->


    <script src="../common/js/jquery-1.12.4.min.js"></script>
    <script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        $(document).ready(function () {



            //id 중복검사
            $("#id").keyup(function () {    // id입력 상자에 id값 입력시
                var id = $('#id').val(); //aaa

                $.ajax({
                    type: "POST",
                    url: "check_id.php",
                    data: "id=" + id,
                    cache: false,
                    success: function (data) {
                        $("#loadtext").html(data);
                    }
                });
            });

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


        });



    </script>
    <script>


        function check_input() {
            if (!document.member_form.id.value) {
                alert("아이디를 입력하세요");
                document.member_form.id.focus();
                return;
            }

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

            if ($('#terms').not(':checked').length) {
                // do stuff for not selected
                alert("약관에 동의하셔야 가입이 가능합니다.");


                return;
            }

            document.member_form.submit();
            // insert.php 로 변수 전송
        }

        function reset_form() {
            document.member_form.id.value = "";
            document.member_form.pass.value = "";
            document.member_form.pass_confirm.value = "";
            document.member_form.name.value = "";
            document.member_form.nick.value = "";
            document.member_form.hp1.value = "010";
            document.member_form.hp2.value = "";
            document.member_form.hp3.value = "";
            document.member_form.email1.value = "";
            document.member_form.email2.value = "";

            document.member_form.id.focus();

            return;
        }
    </script>
</head>

<body>


    <div id="content">

        <div class="p-10 bg-gray-50 ">
            
            <div class="flex flex-col items-center justify-center px-6 py-8 lg:py-0">
                <a href="../index.html"
                    class="flex items-center my-4 mb-2 text-2xl font-semibold text-gray-900 "><h1 class="hidden">GS파워 로고</h1>
                    <img class="w-auto h-24 mx-auto " src="../common/images/gslogo.png" alt="gs파워로고">
                </a>
                <h2 class="mb-1 text-2xl font-bold text-center sm:text-3xl">GS POWER에 오신것을 환영합니다.</h2>
			<p class="mt-2 mb-6 text-sm text-center text-gray-600">GS 파워는 깨끗한 지구를 만들기 위해 노력하는 친환경 에너지 기업입니다.</p>

                <div
                    class="w-full bg-white rounded-lg shadow md:mt-3 sm:max-w-lg xl:p-0 ">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h2
                            class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl ">
                            신규 회원 가입
                        </h2>
                        <form class="space-y-4 md:space-y-6" name="member_form" method="post" action="insert.php">

	


                            <div>
                                <label for="id"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">아이디</label>
                                <input type="text" name="id" id="id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5"
                                    placeholder="gspower3023" required="">
                                <span id="loadtext"></span>


                            </div>
                            <div>
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">이름</label>
                                <input type="text" name="name" id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 "
                                    placeholder="Name" required="">
                            </div>
                            <div>
                                <label for="nick"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">닉네임</label>
                                <input type="text" name="nick" id="nick"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 "
                                    placeholder="Nickname">
                                <span id="loadtext2"></span>

                            </div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 ">연락처</label>
                            <div class="flex justify-between">
                            <label class="hidden" for="hp1">전화번호앞3자리</label>

                                <select
                                    class="text-center bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-1/4 p-2.5 "
                                    class="hp" name="hp1" id="hp1">
                                    <option value='010'>010</option>
                                    <option value='011'>011</option>
                                    <option value='016'>016</option>
                                    <option value='017'>017</option>
                                    <option value='018'>018</option>
                                    <option value='019'>019</option>
                                </select>
                                <label class="hidden" for="hp2">전화번호중간4자리</label>
                                <input
                                    class=" bg-gray-50 text-center border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-1/3 p-2.5 "
                                    type="text" class="hp" name="hp2" id="hp2" required>
                                <label class="hidden" for="hp3">전화번호끝4자리</label>
                                <input
                                    class=" bg-gray-50 text-center border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-1/3 p-2.5 "
                                    type="text" class="hp" name="hp3" id="hp3" required>

                            </div>
                            <div>


                                <label class="block mb-2 text-sm font-medium text-gray-900 "
                                    for="email1">메일주소</label>

                                <div class="flex items-center justify-between">

                                    <input type="text" id="email1" name="email1"
                                        class=" bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-6/12 p-2.5 "
                                        placeholder="local-part" required="" required>
                                    <span>@</span>
                                    <label class="hidden" for="email2">도메인주소</label>
                                    <input type="text" id="email2" name="email2"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-5/12 p-2.5 "
                                        placeholder="domain.com" required="" required>

                                </div>
                            </div>
                            <div>
                                <label for="pass"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">비밀번호</label>
                                <input type="password" name="pass" id="pass" placeholder="••••••••"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 "
                                    required="">
                            </div>
                            <div>
                                <label for="pass_confirm"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">비밀번호 확인</label>
                                <input type="password" name="pass_confirm" id="pass_confirm" placeholder="••••••••"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 "
                                    required="">
                            </div>


                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="terms" name="terms" aria-describedby="terms" type="checkbox"
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300"
                                        required="">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="terms" class="font-light text-gray-500 ">GS파워 가입 약관에
                                        <span> 모두
                                            동의합니다.</span> <a data-bs-toggle="modal" data-bs-target="#termsModal"
                                            class="ml-2 font-medium text-black-400 hover:underline "
                                            href="#">Terms and Conditions</a>
                                    </label>
                                </div>
                            </div>
                            <button onclick="check_input()" type="button"
                                class="w-full block text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">회원가입
                               </button>


                            <p class="text-sm font-light text-gray-500 ">
                                이미 회원이신가요? <a href="../login/login_form.php"
                                    class="font-light text-green-500 underline hover:underline ">로그인
                                    </a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>



            <!-- Modal -->
            <div class="fixed top-0 left-0 hidden w-full h-full overflow-x-hidden overflow-y-auto outline-none modal fade"
                id="termsModal" tabindex="-1" aria-labelledby="termsModal" aria-hidden="true">
                <div class="relative w-auto pointer-events-none modal-dialog modal-dialog-scrollable">
                    <div
                        class="relative flex flex-col w-full text-current bg-white border-none rounded-md shadow-lg outline-none pointer-events-auto modal-content bg-clip-padding">
                        <div
                            class="flex items-center justify-between flex-shrink-0 p-4 border-b border-gray-200 modal-header rounded-t-md">
                            <h5 class="text-xl font-medium leading-normal text-gray-800"
                                id="exampleModalScrollableLabel">
                                서비스 이용약관
                            </h5>
                            <button type="button"
                                class="box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 btn-close focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                                data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div id="modalHeight" class="relative p-4 text-gray-500 modal-body">

                            <h3>약관 동의</h3>
                            <h4>서비스 이용약관</h4>
                            <div class="policy">
                                제 1장 총칙<br><br>

                                제 1 조 (목적)<br>

                                이 이용약관(이하 '약관')은 주식회사 GS파워(이하 회사라 합니다)와 이용 고객(이하 '회원')간에 회사가 제공하는 GS파워 웹사이트 (이하 서비스)의
                                가입조건 및 이용에 관한 제반 사항과 기타 필요한 사항을 구체적으로 규정함을 목적으로 합니다. <br>

                                제 2 조 (이용약관의 효력 및 변경)<br>

                                1. 이 약관은 회사 웹사이트(moosewithbear.cafe24.com 이하 '웹사이트')에서 온라인으로 공시함으로써 효력을 발생하며, 합리적인 사유가 발생할 경우 관련법령에
                                위배되지 않는 범위 안에서 개정될 수 있습니다. 개정된 약관은 온라인에서 공지함으로써 효력을 발휘하며, 이용자의 권리 또는 의무 등 중요한 규정의 개정은
                                사전에 공지합니다.<br>
                                2. 회사는 합리적인 사유가 발생될 경우에는 이 약관을 변경할 수 있으며, 약관을 변경할 경우에는 지체 없이 이를 사전에 공시합니다.<br>
                                3. 이 약관에 동의하는 것은 정기적으로 웹을 방문하여 약관의 변경사항을 확인하는 것에 동의함을 의미합니다. 변경된 약관에 대한 정보를 알지 못해 발생하는
                                이용자의 피해는 회사에서 책임지지 않습니다.<br>
                                4. 회원은 변경된 약관에 동의하지 않을 경우 회원 탈퇴(해지)를 요청할 수 있으며, 변경된 약관의 효력 발생일로부터 7일 이후에도 거부의사를 표시하지
                                아니하고 서비스를 계속 사용할 경우 약관의 변경 사항에 동의한 것으로 간주됩니다.<br>
                                5. 회원은 회원가입 시 웹사이트가 상업적 목적이 아닌 개인 포트폴리오 목적의 웹사이트인 것을 인지한 것으로 간주됩니다.  <br>

                                제 3 조 (약관외 준칙)<br>

                                1. 이 약관은 회사가 제공하는 개별서비스에 관한 이용안내(이하 서비스별 안내라 합니다)와 함께 적용합니다.<br>
                                2. 이 약관에 명시되지 아니한 사항에 대해서는 관계법령 및 서비스별 안내의 취지에 따라 적용할 수 있습니다.<br>

                                제 4 조 (용어의 정의)<br>

                                1. 이 약관에서 사용하는 용어의 정의는 다음과 같습니다. <br>
                                (1) '이용고객'이라 함은 회원제서비스를 이용하는 이용자를 말합니다.<br>
                                (2) '이용계약'이라 함은 서비스 이용과 관련하여 회사와 이용고객 간에 체결 하는 계약을 말합니다.<br>
                                (3) '이용자번호(ID)'라 함은 이용고객의 식별과 이용고객의 서비스 이용을 위하여 이용고객이 선정하고 회사가 부여하는 문자와 숫자의 조합을
                                말합니다.<br>
                                (4) '비밀번호'라 함은 이용고객이 부여 받은 이용자번호와 일치된 이용고객 임을 확인하고 이용고객의 권익보호를 위하여 이용고객이 선정한 문자와 숫자의 조합을
                                말합니다.<br>
                                (5) '단말기'라 함은 회사가 제공하는 서비스를 이용하기 위해 이용고객이 설치한 개인용 컴퓨터 및 모뎀 등을 말합니다.<br>
                                (6) '해지'라 함은 회사 또는 회원이 이용계약을 해약하는 것을 말합니다.<br>

                                2. 이 약관에서 사용하는 용어의 정의는 제1항에서 정하는 것을 제외하고는 관계법령 및 서비스별 안내에서 정하는 바에 의합니다.<br><br>

                                제 2 장 이용계약 체결<br><br>

                                제 5 조 (이용 계약의 성립)<br>

                                1. 이용계약은 이용고객의 본 이용약관 내용에 대한 동의와 이용신청에 대하여 회사의 이용승낙으로 성립합니다.<br>
                                2. 본 이용약관에 대한 동의는 이용신청 당시 해당 웹사이트의 '동의함' 버튼을 누름으로써 의사표시를 합니다.<br>

                                제 6 조 (서비스 이용 신청)<br>

                                1. 회원으로 가입하여 본 서비스를 이용하고자 하는 이용고객은 회사에서 요청하는 제반정보(이름, 연락처 등)를 제공하여야 합니다.<br>
                                2. 회원가입은 반드시 실명으로만 가입할 수 있으며 회사는 실명확인조치를 할 수 있습니다.<br>
                                3. 타인의 명의(이름)를 도용하여 이용신청을 한 회원의 모든 ID는 삭제되며, 관계법령에 따라 처벌을 받을 수 있습니다.<br>
                                4. 회사는 본 서비스를 이용하는 회원에 대하여 등급별로 구분하여 이용시간, 이용회수, 서비스 메뉴 등을 세분하여 이용에 차등을 둘 수 있습니다.<br>

                                제 7 조 (개인정보의 보호 및 사용)<br>

                                회사는 관계법령이 정하는 바에 따라 이용자 등록정보를 포함한 이용자의 개인정보를 보호하기 위해 노력합니다. 이용자 개인정보의 보호 및 사용에 대해서는 관련법령
                                및 회사의 개인정보 보호정책이 적용됩니다. 단, 회사의 공식사이트이외의 웹에서 링크된 사이트에서는 회사의 개인정보 보호정책이 적용되지 않습니다. 또한 회사는
                                이용자의 귀책사유로 인해 노출된 정보에 대해서 일체의 책임을 지지 않습니다. <br>

                                제 8 조 (이용 신청의 승낙과 제한)<br>

                                1. 회사는 제 6조의 규정에 의한 이용신청고객에 대하여 업무 수행상 또는 기술상 지장이 없는 경우에 원칙적으로 접수순서에 따라 서비스 이용을
                                승낙합니다.<br>
                                2. 회사는 아래사항에 해당하는 경우에 대해서 승낙하지 아니 합니다. <br>
                                (1) 실명이 아니거나 타인의 명의를 이용하여 신청한 경우<br>
                                (2) 이용계약 신청서의 내용을 허위로 기재한 경우<br>
                                (3) 사회의 안녕과 질서, 미풍양속을 저해할 목적으로 신청한 경우<br>
                                (4) 부정한 용도로 본 서비스를 이용하고자 하는 경우<br>
                                (5) 영리를 추구할 목적으로 본 서비스를 이용하고자 하는 경우<br>
                                (6) 기타 규정한 제반사항을 위반하며 신청하는 경우<br>
                                (7) 본 서비스와 경쟁관계에 있는 이용자가 신청하는 경우<br>
                                (8) 기타 규정한 제반사항을 위반하며 신청하는 경우<br>

                                3. 회사는 서비스 이용신청이 다음 각 호에 해당하는 경우에는 그 신청에 대하여 승낙 제한사유가 해소될 때까지 승낙을 유보할 수 있습니다. <br>
                                (1) 회사가 설비의 여유가 없는 경우<br>
                                (2) 회사의 기술상 지장이 있는 경우<br>
                                (3) 기타 회사의 귀책사유로 이용승낙이 곤란한 경우<br>

                                4. 회사는 이용신청고객이 관계법령에서 규정하는 미성년자일 경우에 서비스별 안내에서 정하는 바에 따라 승낙을 보류할 수 있습니다.<br>

                                제 9 조 (이용자ID 부여 및 변경 등)<br>

                                1. 회사는 이용고객에 대하여 약관에 정하는 바에 따라 이용자 ID를 부여합니다.<br>
                                2. 이용자ID는 원칙적으로 변경이 불가하며 부득이한 사유로 인하여 변경 하고자 하는 경우에는 해당 ID를 해지하고 재가입해야 합니다.<br>
                                3. 이용자ID는 다음 각 호에 해당하는 경우에는 이용고객 또는 회사의 요청으로 변경할 수 있습니다. <br>
                                (1) 이용자ID가 이용자의 전화번호 등으로 등록되어 사생활침해가 우려되는 경우<br>
                                (2) 타인에게 혐오감을 주거나 미풍양속에 어긋나는 경우<br>
                                (3) 기타 합리적인 사유가 있는 경우<br>

                                4. 서비스 이용자ID 및 비밀번호의 관리책임은 이용자에게 있습니다. 이를 소홀이 관리하여 발생하는 서비스 이용상의 손해 또는 제3자에 의한 부정이용 등에
                                대한 책임은 이용자에게 있으며 회사는 그에 대한 책임을 일절 지지 않습니다.<br>
                                5. 기타 이용자 개인정보 관리 및 변경 등에 관한 사항은 서비스별 안내에 정하는 바에 의합니다.<br><br>

                                제 3 장 계약 당사자의 의무<br><br>

                                제 10 조 (회사의 의무)<br>

                                1. 회사는 이용고객이 희망한 서비스 제공 개시일에 특별한 사정이 없는 한 서비스를 이용할 수 있도록 하여야 합니다.<br>
                                2. 회사는 계속적이고 안정적인 서비스의 제공을 위하여 설비에 장애가 생기거나 멸실된 때에는 부득이한 사유가 없는 한 지체없이 이를 수리 또는
                                복구합니다.<br>
                                3. 회사는 개인정보 보호를 위해 보안시스템을 구축하며 개인정보 보호정책을 공시하고 준수합니다.<br>
                                4. 회사는 이용고객으로부터 제기되는 의견이나 불만이 정당하다고 객관적으로 인정될 경우에는 적절한 절차를 거쳐 즉시 처리하여야 합니다. 다만, 즉시 처리가
                                곤란한 경우는 이용자에게 그 사유와 처리일정을 통보하여야 합니다.<br>

                                제 11 조 (이용자의 의무)<br>

                                1. 이용자는 회원가입 신청 또는 회원정보 변경 시 실명으로 모든 사항을 사실에 근거하여 작성하여야 하며, 허위 또는 타인의 정보를 등록할 경우 일체의 권리를
                                주장할 수 없습니다.<br>
                                2. 회원은 본 약관에서 규정하는 사항과 기타 회사가 정한 제반 규정, 공지사항 등 회사가 공지하는 사항 및 관계법령을 준수하여야 하며, 기타 회사의 업무에
                                방해가 되는 행위, 회사의 명예를 손상시키는 행위를 해서는 안됩니다. <br>
                                3. 회원은 주소, 연락처, 전자우편 주소 등 이용계약사항이 변경된 경우에 해당 절차를 거쳐 이를 회사에 즉시 알려야 합니다.<br>
                                4. 회사가 관계법령 및 '개인정보 보호정책'에 의거하여 그 책임을 지는 경우를 제외하고 회원에게 부여된 ID의 비밀번호 관리소홀, 부정사용에 의하여 발생하는
                                모든 결과에 대한 책임은 회원에게 있습니다.<br>
                                5. 회원은 회사의 사전 승낙 없이 서비스를 이용하여 영업활동을 할 수 없으며, 그 영업활동의 결과에 대해 회사는 책임을 지지 않습니다. 또한 회원은 이와
                                같은 영업활동으로 회사가 손해를 입은 경우, 회원은 회사에 대해 손해배상의무를 지며, 회사는 해당 회원에 대해 서비스 이용제한 및 적법한 절차를 거쳐 손해배상
                                등을 청구할 수 있습니다. <br>
                                6. 회원은 회사의 명시적 동의가 없는 한 서비스의 이용권한, 기타 이용계약상의 지위를 타인에게 양도, 증여할 수 없으며 이를 담보로 제공할 수
                                없습니다.<br>
                                7. 회원은 회사 및 제 3자의 지적 재산권을 침해해서는 안됩니다.<br>
                                8. 회원은 다음 각 호에 해당하는 행위를 하여서는 안되며, 해당 행위를 하는 경우에 회사는 회원의 서비스 이용제한 및 적법 조치를 포함한 제재를 가할 수
                                있습니다. <br>
                                (1) 회원가입 신청 또는 회원정보 변경 시 허위내용을 등록하는 행위<br>
                                (2) 다른 이용자의 ID, 비밀번호를 도용하는 행위<br>
                                (3) 이용자 ID를 타인과 거래하는 행위<br>
                                (4) 회사의 운영진, 직원 또는 관계자를 사칭하는 행위<br>
                                (5) 회사로부터 특별한 권리를 부여받지 않고 회사의 클라이언트 프로그램을 변경하거나, 회사의 서버를 해킹하거나, 웹사이트 또는 게시된 정보의 일부분 또는
                                전체를 임의로 변경하는 행위<br>
                                (6) 서비스에 위해를 가하거나 고의로 방해하는 행위<br>
                                (7) 본 서비스를 통해 얻은 정보를 회사의 사전 승낙 없이 서비스 이용 외의 목적으로 복제하거나, 이를 출판 및 방송 등에 사용하거나, 제 3자에게 제공하는
                                행위<br>
                                (8) 공공질서 및 미풍양속에 위반되는 저속, 음란한 내용의 정보, 문장, 도형, 음향, 동영상을 전송, 게시, 전자우편 또는 기타의 방법으로 타인에게
                                유포하는 행위<br>
                                (9) 모욕적이거나 개인신상에 대한 내용이어서 타인의 명예나 프라이버시를 침해할 수 있는 내용을 전송, 게시, 전자우편 또는 기타의 방법으로 타인에게 유포하는
                                행위<br>
                                (10) 다른 이용자를 희롱 또는 위협하거나, 특정 이용자에게 지속적으로 고통 또는 불편을 주는 행위<br>
                                (11) 회사의 승인을 받지 않고 다른 사용자의 개인정보를 수집 또는 저장하는 행위<br>
                                (12) 범죄와 결부된다고 객관적으로 판단되는 행위<br>
                                (13) 본 약관을 포함하여 기타 회사가 정한 제반 규정 또는 이용 조건을 위반하는 행위<br>
                                (14) 기타 관계법령에 위배되는 행위<br><br>

                                4 장 서비스의 이용<br><br>

                                제 12 조 (서비스 이용 시간)<br>

                                1. 서비스 이용은 회사의 업무상 또는 기술상 특별한 지장이 없는 한 연중무휴, 1일 24시간 운영을 원칙으로 합니다. 단, 회사는 시스템 정기점검, 증설 및
                                교체를 위해 회사가 정한 날이나 시간에 서비스를 일시중단할 수 있으며, 예정되어 있는 작업으로 인한 서비스 일시중단은 웹사이트를 통해 사전에
                                공지합니다.<br>
                                2. 회사는 긴급한 시스템 점검, 증설 및 교체 등 부득이한 사유로 인하여 예고없이 일시적으로 서비스를 중단할 수 있으며, 새로운 서비스로의 교체 등 회사가
                                적절하다고 판단하는 사유에 의하여 현재 제공되는 서비스를 완전히 중단할 수 있습니다.<br>
                                3. 회사는 국가비상사태, 정전, 서비스 설비의 장애 또는 서비스 이용의 폭주 등으로 정상적인 서비스 제공이 불가능할 경우, 서비스의 전부 또는 일부를
                                제한하거나 중지할 수 있습니다. 다만 이 경우 그 사유 및 기간 등을 회원에게 사전 또는 사후에 공지합니다.<br>
                                4. 회사는 회사가 통제할 수 없는 사유로 인한 서비스중단의 경우(시스템관리자의 고의,과실없는 디스크장애, 시스템다운 등)에 사전통지가 불가능하며
                                타인(PC통신회사, 기간통신사업자 등)의 고의,과실로 인한 시스템중단 등의 경우에는 통지하지 않습니다.<br>
                                5. 회사는 서비스를 특정범위로 분할하여 각 범위별로 이용가능시간을 별도로 지정할 수 있습니다. 다만 이 경우 그 내용을 공지합니다. <br>

                                제 13 조 (이용자ID 관리)<br>

                                1. 이용자ID와 비밀번호에 관한 모든 관리책임은 회원에게 있습니다.<br>
                                2. 회사는 이용자 ID에 의하여 제반 이용자 관리업무를 수행 하므로 회원이 이용자 ID를 변경하고자 하는 경우 회사가 인정할 만한 사유가 없는 한 이용자
                                ID의 변경을 제한할 수 있습니다.<br>
                                3. 이용고객이 등록한 이용자 ID 및 비밀번호에 의하여 발생되는 사용상의 과실 또는 제 3자에 의한 부정사용 등에 대한 모든 책임은 해당 이용고객에게
                                있습니다.<br>

                                제 14 조 (게시물의 관리)<br>

                                회사는 다음 각 호에 해당하는 게시물이나 자료를 사전통지 없이 삭제하거나 이동 또는 등록 거부를 할 수 있습니다.<br>
                                1. 다른 회원 또는 제 3자에게 심한 모욕을 주거나 명예를 손상시키는 내용인 경우<br>
                                2. 공공질서 및 미풍양속에 위반되는 내용을 유포하거나 링크시키는 경우<br>
                                3. 불법복제 또는 해킹을 조장하는 내용인 경우<br>
                                4. 영리를 목적으로 하는 광고일 경우<br>
                                5. 범죄와 결부된다고 객관적으로 인정되는 내용일 경우<br>
                                6. 다른 이용자 또는 제 3자의 저작권 등 기타 권리를 침해하는 내용인 경우<br>
                                7. 회사에서 규정한 게시물 원칙에 어긋나거나, 게시판 성격에 부합하지 않는 경우<br>
                                8. 기타 관계법령에 위배된다고 판단되는 경우<br>

                                제 15 조 (게시물에 대한 저작권)<br>

                                1. 회원이 서비스 화면 내에 게시한 게시물의 저작권은 게시한 회원에게 귀속됩니다. 또한 회사는 게시자의 동의 없이 게시물을 상업적으로 이용할 수 없습니다.
                                다만 비영리 목적인 경우는 그러하지 아니하며, 또한 서비스내의 게재권을 갖습니다.<br>
                                2. 회원은 서비스를 이용하여 취득한 정보를 임의 가공, 판매하는 행위 등 서비스에 게재된 자료를 상업적으로 사용할 수 없습니다.<br>
                                3. 회사는 회원이 게시하거나 등록하는 서비스 내의 내용물, 게시 내용에 대해 제 14조 각 호에 해당된다고 판단되는 경우 사전통지 없이 삭제하거나 이동 또는
                                등록 거부할 수 있습니다.<br>

                                제 16 조 (정보의 제공)<br>

                                1. 회사는 회원에게 서비스 이용에 필요가 있다고 인정되는 각종 정보에 대해서 전자우편이나 서신우편 등의 방법으로 회원에게 제공할 수 있습니다.<br>
                                2. 회사는 서비스 개선 및 회원 대상의 서비스 소개 등의 목적으로 회원의 동의 하에 추가적인 개인 정보를 요구할 수 있습니다.<br>

                                제 17 조 (광고게재 및 광고주와의 거래)<br>

                                1. 회사가 회원에게 서비스를 제공할 수 있는 서비스 투자기반의 일부는 광고게재를 통한 수익으로부터 나옵니다. 회원은 서비스 이용시 노출되는 광고게재에 대해
                                동의합니다.<br>
                                2. 회사는 서비스상에 게재되어 있거나 본 서비스를 통한 광고주의 판촉활동에 회원이 참여하거나 교신 또는 거래를 함으로써 발생하는 손실과 손해에 대해 책임을
                                지지 않습니다.<br><br>

                                제 5 장 계약 해지 및 이용 제한<br><br>

                                제 18 조 (계약 변경 및 해지)<br>

                                회원이 이용계약을 해지하고자 하는 때에는 회원 본인이 GS파워 고객센터로 유선연락을 하여야 합니다 (02-1111-1111) <br>

                                제 19 조 (서비스 이용제한)<br>

                                1. 회사는 회원이 서비스 이용내용에 있어서 본 약관 제 11조 내용을 위반하거나, 다음 각 호에 해당하는 경우 서비스 이용을 제한할 수 있습니다. <br>
                                (1) 미풍양속을 저해하는 비속한 ID 및 별명 사용<br>
                                (2) 타 이용자에게 심한 모욕을 주거나, 서비스 이용을 방해한 경우<br>
                                (3) 기타 정상적인 서비스 운영에 방해가 될 경우<br>
                                (4) 정보통신 윤리위원회 등 관련 공공기관의 시정 요구가 있는 경우<br>
                                (5) 3개월 이상 서비스를 이용한 적이 없는 경우<br>
                                (6) 불법 홈페이지인 경우 <br>
                                ① 상용소프트웨어나 크랙파일을 올린 경우 <br>
                                ② 정보통신윤리 위원회의 심의 세칙 제 7조에 어긋나는 음란물을 게재한 경우 <br>
                                ③ 반국가적 행위의 수행을 목적으로 하는 내용을 포함한 경우 <br>
                                ④ 저작권이 있는 글을 무단 복제하거나 mp3를 홈계정에 올린 경우<br>

                                2. 상기 이용제한 규정에 따라 서비스를 이용하는 회원에게 서비스 이용에 대하여 별도 공지 없이 서비스 이용의 일시정지, 초기화, 이용계약 해지 등을
                                불량이용자 처리규정에 따라 취할 수 있습니다.<br><br>

                                제 6 장 손해배상 및 기타사항<br><br>

                                제 20 조 (손해배상)<br>

                                회사는 서비스에서 무료로 제공하는 서비스의 이용과 관련하여 개인정보보호정책에서 정하는 내용에 해당하지 않는 사항에 대하여는 어떠한 손해도 책임을 지지
                                않습니다.<br>

                                제 21 조 (면책조항)<br>

                                1. 회사는 천재지변, 전쟁 및 기타 이에 준하는 불가항력으로 인하여 서비스를 제공할 수 없는 경우에는 서비스 제공에 대한 책임이 면제됩니다.<br>
                                2. 회사는 기간통신 사업자가 전기통신 서비스를 중지하거나 정상적으로 제공하지 아니하여 손해가 발생한 경우 책임이 면제됩니다.<br>
                                3. 회사는 서비스용 설비의 보수, 교체, 정기점검, 공사 등 부득이한 사유로 발생한 손해에 대한 책임이 면제됩니다.<br>
                                4. 회사는 회원의 귀책사유로 인한 서비스 이용의 장애 또는 손해에 대하여 책임을 지지 않습니다.<br>
                                5. 회사는 이용자의 컴퓨터 오류에 의해 손해가 발생한 경우, 또는 회원이 신상정보 및 전자우편 주소를 부실하게 기재하여 손해가 발생한 경우 책임을 지지
                                않습니다.<br>
                                6. 회사는 회원이 서비스를 이용하여 기대하는 수익을 얻지 못하거나 상실한 것에 대하여 책임을 지지 않습니다.<br>
                                8. 회사는 회원이 서비스를 이용하면서 얻은 자료로 인한 손해에 대하여 책임을 지지 않습니다. 또한 회사는 회원이 서비스를 이용하며 타 회원으로 인해 입게
                                되는 정신적 피해에 대하여 보상할 책임을 지지 않습니다.<br>
                                9. 회사는 회원이 서비스에 게재한 각종 정보, 자료, 사실의 신뢰도, 정확성 등 내용에 대하여 책임을 지지 않습니다.<br>
                                10. 회사는 이용자 상호간 및 이용자와 제 3자 상호 간에 서비스를 매개로 발생한 분쟁에 대해 개입할 의무가 없으며, 이로 인한 손해를 배상할 책임도
                                없습니다.<br>
                                11. 회사에서 회원에게 무료로 제공하는 서비스의 이용과 관련해서는 어떠한 손해도 책임을 지지 않습니다.<br>

                                제 21 조 (재판권 및 준거법)<br>

                                1. 이 약관에 명시되지 않은 사항은 전기통신사업법 등 관계법령과 상관습에 따릅니다.<br>
                                2. 회사의 정액 서비스 회원 및 기타 유료 서비스 이용 회원의 경우 회사가 별도로 정한 약관 및 정책에 따릅니다.<br>
                                3. 서비스 이용으로 발생한 분쟁에 대해 소송이 제기되는 경우 회사의 본사 소재지를 관할하는 법원을 관할 법원으로 합니다.<br>

                                &lt;부칙&gt;<br>

                                (시행일) 본 약관은 2017년 02월 01일부터 적용됩니다.
                            </div>
                    
                            <!--          e.서비스 이용약관             -->
                            <!--          s.개인정보 수집 및 이용에 대한 안내             -->
                            <h4>개인정보 수집 및 이용에 대한 안내</h4>
                            <div class="policy">
                                수집하는 개인정보의 항목 및 수집방법<br><br>

                                가. 수집하는 개인정보의 항목<br>

                                - 필수항목 : 성명, 아이디, 비밀번호, 본인확인 문답, 이메일주소, 주소, 연락처<br>
                                - 자동수집항목 : 서비스 이용기록 등<br>

                                나. 개인정보 수집방법<br>

                                회사는 다음과 같은 방법으로 개인정보를 수집합니다.<br>
                                - 홈페이지 (회원가입, Contact Us 작성 등)<br>
                                - 서면양식, 팩스, 전화, 이메일, 이벤트 응모<br>
                                - 협력회사로부터의 제공<br>
                                - 로그 분석 프로그램을 통한 생성정보 수집
                            </div>
                   
                            <!--          e.개인정보 수집 및 이용에 대한 안내             -->
                            <!--          s.개인정보의 수집 및 이용목적             -->
                            <h4>개인정보의 수집 및 이용목적</h4>
                            <div class="policy">
                                개인정보의 수집 및 이용목적<br><br>

                                회사는 다음과 같은 목적을 위하여 개인정보를 수집하고 있습니다.<br>
                                (1)회사 사이트의 각종서비스를 이용하는데 있어 원활한 서비스 신청 및 회원이 편리하고 유익한 정보를 제공하기 위한 최소한의 정보를 필수 사항으로
                                수집합니다.<br>
                                (2)회사는 신제품 또는 이벤트의 정보안내 서비스와 마케팅활동 및 업무수행을 위한 텔레마케팅 서비스 또는 온라인 마케팅서비스을 위해 개인정보를 수집합니다.
                                <br>
                                (3)회사는 이용자의 기본적 인권 침해의 우려가 있는 민감한 개인정보(인종 및 민족, 사상 및 신조, 출신지 및 본적지, 정치적 성향 및 범죄기록, 건강상태
                                및 성생활 등)는 수집하지 않습니다 . <br>
                                (4)회원이 제공하신 모든 정보는 상기 목적에 필요한 용도 이외로는 사용되지 않으며 수집 정보의 범위나 사용 목적, 용도가 변경될 시에는 반드시 회원께 사전
                                동의를 구할 것입니다.
                            </div>
                       
                            <!--          e.개인정보의 수집 및 이용목적             -->
                            <!--          s.개인정보의 보유 및 이용기간          -->
                            <h4>개인정보의 보유 및 이용기간</h4>
                            <div class="policy">
                                개인정보의 보유 및 이용기간<br><br>

                                (1)회사 사이트의 서비스 제공을 위해 제공받는 회원 정보는 성명, 주소, 전화번호, 휴대전화번호, 희망 ID, 비밀번호, e-mail 주소, 기타 회사가
                                필요하다고 인정하는 사항 입니다. 회원이 회사 사이트의 회원으로서 회사에서 제공하는 서비스를 이용하는 동안 회사는 회원의 개인정보를 계속적으로 보유하며 서비스
                                제공 등을 위해 이용합니다. 회원의 개인정보는 회원가입을 탈퇴하거나, 회원에서 제명된 때, 개인정보의 수집목적 또는 제공받은 목적이 달성되면 파기됩니다.
                                <br>
                                (2)상기 조항에도 불구하고 완료되지 않은 업무수행을 위해서나, 관계 법령의 규정에 따라 보존할 필요성이 있을 경우에는 회원의 개인정보를 계속 관리할 수
                                있습니다.<br>
                                이와 다른 목적으로 회원의 개인정보를 계속 보유하여야 할 필요가 있을 경우에는 회원의 동의를 받겠습니다. <br>
                                (3)회사는 귀중한 회원의 개인정보를 안전하게 처리하며, 유출을 방지하기 위하여 다음과 같은 방법을 통하여 개인정보를 파기합니다. <br>
                                ①종이에 출력된 개인정보는 분쇄기로 분쇄하거나 소각을 통하여 파기합니다.<br>
                                ②전자적 파일 형태로 저장된 개인정보는 재생할 수 없는 기술적 방법을 사용하여 삭제합니다.<br>
                                - 계약 또는 청약철회 등에 관한 기록: 5년 <br>
                                - 대금결제 및 재화 등의 공급에 관한 기록: 5년 <br>
                                - 소비자의 불만 또는 분쟁처리에 관한 기록: 3년 <br>
                                - 방문에 관한 기록 : 3개월 <br>
                                - 보유기간을 이용자에게 미리 고지하거나 개별적으로 이용자의 동의를 받은 경우: 고지하거나 개별 동의한 기간
                            </div>

                            <!--          e.개인정보의 보유 및 이용기간          -->
                            <!--          s.개인정보의 취급 위탁          -->
                            <h4>개인정보의 취급 위탁</h4>
                            <div class="policy">
                                개인정보의 취급 위탁<br><br>

                                회사는 서비스 향상을 위해서 이용자들의 개인정보를 외부전문업체에 위탁하여 처리할 수 있습니다. 개인정보의 처리를 위탁하는 경우에는 미리 그 사실을 이용자들에게
                                공지할 것입니다. 또한 위탁계약 등을 통하여 서비스제공자의 개인정보보호 관련 지시엄수, 개인정보에 관한 비밀유지, 제3자 제공의 금지 및 사고시의 책임부담
                                등을 명확히 규정하고 당해 계약내용을 서면 또는 전자적으로 보관하여 이용자의 권익을 보호하고 있습니다.
                            </div>


                        </div>
                        <div
                            class="flex flex-wrap items-center justify-end flex-shrink-0 p-4 border-t border-gray-200 modal-footer rounded-b-md">
                            <button type="button"
                                class="inline-block px-6 py-2.5 bg-gray-400 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-500 hover:shadow-lg focus:bg-gray-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-800 active:shadow-lg transition duration-150 ease-in-out"
                                data-bs-dismiss="modal">
                                닫기
                            </button>
                            <button type="button" id="agreeBtn" onclick="termsAgree()" data-bs-dismiss="modal"
                                class="inline-block  px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-800 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                                동의 후 닫기
                            </button>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>


    <?
    //   include "../sub1/common/sub_footer.html" 
    ?>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>


    <script>
        const termsAgree = function () {
            $('input[type="checkbox"]').attr('checked', true);
        }
    </script>
</body>

</html>


