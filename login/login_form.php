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
	<title>로그인</title>
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">



	<script src="../common/js/jquery-1.12.4.min.js"></script>
	<script src="../common/js/jquery-migrate-1.4.1.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
	<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex flex-col h-full font-sans text-gray-900">


	<div class="flex justify-center px-6 pb-16 mt-20 sm:mt-32 sm:px-0">
		<div class="w-full max-w-md">
			<a href="../index.html"><h1 class="hidden">GS파워로고</h1>
				<img class="w-auto h-24 mx-auto" src="../common/images/gslogo.png" alt="gs파워로고">
			</a>
			<h2 class="mt-6 text-2xl font-bold text-center sm:text-3xl">GS POWER에 오신것을 환영합니다.</h2>
			<p class="mt-2 text-sm text-center text-gray-600">GS 파워는 깨끗한 지구를 만들기 위해 노력하는 친환경 에너지 기업입니다.</p>
			<div class="mx-4 sm:mx-0">


				<br>


				<div class="relative mt-7">
					<div class="absolute inset-0 flex items-center">
						<div class="w-full border-t border-gray-500/30"></div>
					</div>
					<div class="relative flex justify-center text-sm"><h2
							class="px-2 text-gray-500 bg-white">GS파워 아이디로 로그인</h2>
						</div>
				</div>
				
				<form class="mt-8 space-y-6" name="member_form" method="post" action="login.php">
					<div>
						<div class="space-y-6 rounded-md shadow-sm">
							<div><label for="user-id" class="block text-sm font-medium text-gray-700">아이디</label>
								<div class="mt-1"><input id="id" type="text"
										autocomplete="" placeholder="아이디를 입력하세요"
										class="block bg-gray-50 border border-2 border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-300 focus:border-sky-300 block w-full p-2.5 "
										name="id"></div>
							</div>
							<div><label for="email" class="block text-sm font-medium text-gray-700">비밀번호</label>
								<div class="mt-1"><input id="pass" type="password"
										placeholder="비밀번호를 입력하세요"
										class="block bg-gray-50 border border-2 border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-300 focus:border-sky-300 block w-full p-2.5 "
										name="pass"></div>
							</div>

						</div>
					</div>
					
					<div class="flex items-center justify-end">
						<div class="space-x-2 text-sm">
							<a class="text-blue-500 hover:text-blue-400" href="./id_find.php">아이디 찾기</a>
						</div>
						<div class="ml-4 space-x-2 text-sm">
							<a class="text-blue-500 hover:text-blue-400" href="./pw_find.php">비밀번호 찾기</a>
						</div>

					</div>
					<div><button type="submit"
							class="relative flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-blue-500 border border-transparent rounded-md hover:bg-blue-600 focus:outline-none">로그인</button>
					</div>
					<p class="flex items-center justify-center space-x-1 text-sm"><span>아직 회원이 아니신가요?</span><a
							class="flex items-center text-blue-500 underline hover:text-blue-400"
							href="../member/member_form.php">회원가입</a></p>
				</form>
			</div>

		</div>

	</div>

	<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>

</body>

</html>