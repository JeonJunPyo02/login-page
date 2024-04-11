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

// require("lib/connect.php");

// HTML에서 전달된 사용자 value 가져오기
$userid = $_POST['userid'];
$userpw = $_POST['userpw'];
$name = $_POST['name'];
$email = $_POST['email'];

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
} else {
    // 회원가입 실패
    echo "회원가입 실패..";
}

// 연결 닫기
$sql->close();
$conn->close();
?>