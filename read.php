<?php 
// 나중에 댓글 작성을 위한 세션 가져오기 + 세션 없으면 게시글 보지 못하게
require_once("function/session.php");

// DB
$conn = mysqli_connect('127.0.0.1', 'user', 'user1234', 'board');

// GET으로 페이지 게시글 idx 받기
$idx = $_GET['idx'];

// idx 값으로 게시글 정보 가져오기
$sql = "select * from post where idx=$idx";
$res = mysqli_fetch_array(mysqli_query($conn, $sql));

// 조회수 적용
$hit = $res['hit'] + 1;
$hit = mysqli_query($conn, "update post set hit=$hit where idx=$idx");

// 출력해줄 정보
$title = $res['title'];
$content = $res['content'];
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='viewport' content='width=device-width, intial-scale=1.0'>

    <link rel="stylesheet" href="/css/board.css">
    <title>게시글</title>
</head>

<body>
    <a href="index.php"><h1>Alioth's Web Page</h1></a>

    <div class="board_area">
    
    <!--간단히 출력-->
    <?php
    // echo $res['hit'];
    echo "<p>제목 : $title</p>";
    echo "<p>내용 : $content</p>";
    ?>

    </div>

</body>

</html>