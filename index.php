<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Alioth's  웹 페이지</title>
</head>
<body>
	<h2>Alioth's Web Page!</h2>
	<?php
	session_start();

	if(isset($_SESSION['userid'])) {
		$userid = $_SESSION['userid'];
		echo "안녕하세요! $userid 님";
		echo '<form action="logout.php" method="post">';
		echo '<input type="submit" value="로그아웃">';
		echo '</form>';
	} else {
		echo '<a href="login.html">로그인</a><br>';
		echo '<a href="signup.html">회원가입</a>';
	}
	?>
</body>
</html>