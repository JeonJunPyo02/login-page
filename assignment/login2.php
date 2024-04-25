<?php 
// DB 접속 정보 가져오기
require_once("../function/dbconn.php");

// 사용자 입력 정보 받아오기
$userid = $_POST['userid'];
$userpw = $_POST['userpw'];

// 쿼리 작성
$sql = "select name from users where userid='$userid' and userpw='$userpw'";

// 쿼리 실행 값 저장
$result = mysqli_query($conn, $sql);

// 첫 번째 row 값 저장
$row = mysqli_fetch_array($result);

if($row) {
    echo "환영합니다. " . $row['name'] . "님";
} else {
    echo "유효하지 않은 사용자입니다.";
}
?>