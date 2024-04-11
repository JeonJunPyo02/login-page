<?php
// MySQL 데이터베이스 연결 정보
$servername = "localhost"; // MySQL 서버 주소
$username = "root"; // MySQL 사용자 이름
$password = ""; // MySQL 비밀번호
$dbname = "account"; // 사용할 데이터베이스 이름

// MySQL 데이터베이스와 연결
$conn = new mysqli($servername, $username, $password, $dbname);

// 연결 확인
if ($conn->connect_error) {
    die("연결 실패: " . $conn->connect_error);
} else {
    //echo "Succeed!!!!";
}
?>