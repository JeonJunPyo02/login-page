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
?>