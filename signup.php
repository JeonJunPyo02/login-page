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
$name = $_POST['name'];
$email = $_POST['email'];

// main 페이지
$link_url = "index.php";
$link_text = "메인 페이지로 돌아가기";

// SQL 쿼리 작성
// userid=? -> 입력받을 파라미터
$sql = $conn->prepare("INSERT INTO users(userid,userpw,name,email,created) VALUES(?, ?, ?, ?, NOW())");
// 입력받을 파라미터 -> 문자열이면 "s" 정수면 "i"
$sql->bind_param("ssss", $userid, $userpw, $name, $email);

// 쿼리 실행
$sql->execute();

// 영향 받은 행 개수 확인
$result = $sql->affected_rows;

// 결과 확인
if ($result > 0) {
    
    // 회원가입 성공
    echo "회원가입 성공!";

    // index.php 페이지로 돌아가기
    echo "<p><a href='$link_url'>$link_text</a></p>";

} else {
    // 회원가입 실패
    echo "회원가입 실패..";

    // index.php 페이지로 돌아가기
    echo "<p><a href='$link_url'>$link_text</a></p>";
}

// 연결 닫기
$sql->close();
$conn->close();
?>