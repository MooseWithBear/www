<?
	session_start();
    @extract($_GET); 
    @extract($_POST); 
    @extract($_SESSION);  
?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>아이디찾기</title>
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">

    <!-- <link rel="stylesheet" href="./css/login_common.css"> -->
    <link rel="stylesheet" href="./css/login.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <script src="../common/js/prefixfree.min.js"></script>
    <script src="../common/js/jquery-1.12.4.min.js"></script>
    <script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
    <script>
        $(document).ready(function() {

            $(".find").click(function() {           // 비밀번호찾기 버튼 클릭, id입력 상자에 id값 입력시
                var id = $('#find_id').val();       // green2
                var name = $('#find_name').val();   // 홍길동
                var hp1 = $('#hp1').val();          // 010
                var hp2 = $('#hp2').val();          // 1111
                var hp3 = $('#hp3').val();          // 2222

                $.ajax({
                    type: "POST",
                    url: "find2.php",   // 매개변수인 check_id.php파일을 post방식으로 넘기세요
                    data: "id="+ id+ "&name="+ name+ "&hp1="+hp1+ "&hp2="+hp2+ "&hp3="+hp3, // 매개변수id도 같이 넘겨줌
                    cache: false, 
                    success: function(data) // 이 메소드가 완료되면 data라는 변수 안에 echo문이 들어감
                    {
                        $("#loadtext").html(data);  // span안에 있는 태그를 사용할것이기 때문에 html 함수사용
                    }
                });
                
                // $("#loadtext").addClass('loadtexton'); // css 변경

                $(document).on('click', '#loadtext .close, .loadtext_bg', function(){
                    
                    $('#loadtext').fadeOut();
                    $('.loadtext_bg').fadeOut();
                });

            }); 

        });
    </script>
</head>
<body class="flex flex-col h-full font-sans text-gray-900">
    <article id="content">
        <div class="flex justify-center px-6 pb-16 mt-20 sm:mt-32 sm:px-0">
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
                            <h2 class="px-2 text-orange-500 bg-white">패스워드 찾기</h2>
                        </div>
                    </div>
                    <form class="mt-8 space-y-6" name="find" method="post" action="find2.php">
                        <div class="space-y-6 rounded-md ">
                            <div><label for="find_name" class="block text-sm font-medium text-gray-700">이름</label>
                                <div class="mt-1"><input id="find_name" name="name"  type="text" placeholder="이름을 입력하세요"
                                        class="block bg-gray-50 border border-2 border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-300 focus:border-sky-300 block w-full p-2.5 "
                                        >
                                </div>
                            </div>
                            <div class="space-y-6 rounded-md ">
                            <div><label for="find_id" class="block text-sm font-medium text-gray-700 find_id">아이디</label>
                                <div class="mt-1"><input id="find_id" name="id" type="text" placeholder="아이디를 입력하세요"
                                        class="block bg-gray-50 border border-2 border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-300 focus:border-sky-300 block w-full p-2.5 "
                                        >
                                </div>
                            </div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 ">연락처</label>
                            <div style="margin-top: 0.3rem;" class="flex justify-between">
                                <label class="hidden" for="hp1">전화번호앞3자리</label>

                                <select
                                    class="text-center bg-gray-50 border border-2 border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-1/4 p-2.5 "
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
                                    class=" bg-gray-50 border border-2 border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-1/3 p-2.5 "
                                    type="text" class="hp" name="hp2" id="hp2" required>
                                <label class="hidden" for="hp3">전화번호끝4자리</label>
                                <input
                                    class=" bg-gray-50 border border-2 border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-1/3 p-2.5 "
                                    type="text" class="hp" name="hp3" id="hp3" required>
                            </div>
                        </div>
                        <div class="flex items-center justify-end">
                            <div class="ml-4 space-x-2 text-sm">
                                <a class="text-orange-500 hover:text-orange-400" href="./id_find.php">아이디 찾기</a>
                            </div>
                        </div>
                        <button type="button"
                            class="relative flex justify-center w-full px-4 py-2 mt-8 text-sm font-medium text-white bg-orange-500 border border-transparent rounded-md find hover:bg-orange-600 focus:outline-none">패스워드
                            찾기</button>
                        <p class="flex items-center justify-center space-x-1 text-sm text-gray-500"><span>패스워드가
                                기억나셨나요?</span><a
                                class="flex items-center text-orange-500 underline hover:text-orange-400"
                                href="../login/login_form.php">로그인</a>
                        </p>
                        <div id="loadtext"></div>
                        <div class="loadtext_bg"></div>
                    </form>
                </div>
            </div>
        </div>
    </article>

    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>

</body>




</html>