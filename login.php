<?php
// MySQL 데이터베이스 연결 정보
$servername = "127.0.0.1"; // MySQL 서버 주소
$username = "user"; // MySQL 계정 이름
$password = "user1234"; // MySQL 계정 비밀번호
$dbname = "account"; // 사용할 DB 이름

// MySQL DB와 연결
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 확인
if ($conn->connect_error) {
    die("연결 실패: " . $conn->connect_error);
} else {
    // echo "Secceed!!!!";
}

// input 태그에서 전달된 사용자 입력 값 가져오기
$userid = $_POST['userid'];
$userpw = $_POST['userpw'];

// SQL 쿼리 작성
// userid=? -> 입력받을 파라미터
$sql = $conn->prepare("SELECT * FROM users WHERE userid=? AND userpw=?");
// 입력받을 파라미터 -> 문자열이면 "s" 정수면 "i"
$sql->bind_param("ss", $userid, $userpw);

// 쿼리 실행
$sql->execute();

// 쿼리 실행 결과로 반환된 레코드의 개수 확인
$result = $sql->get_result();

// 결과 확인
if ($result->num_rows > 0) {

    // 로그인 성공
    // echo "$userid"."님 환영합니다!";

    // 세션 부여
    session_start();
    $_SESSION['userid'] = $userid;
    header("Location: index.php");

} else {
    // 로그인 실패
    // main 페이지로 돌아가기
    // $link_url = "index.php";
    // $link_text = "메인 페이지로 돌아가기";
    // echo "<p><a href='$link_url'>$link_text</a></p>";
}


// 연결 닫기
$sql->close();
$conn->close();

?>

<!--로그인 실패-->
<script>
    alert('유효하지 않은 사용자 정보입니다.')
    location.replace('login.html')
</script>