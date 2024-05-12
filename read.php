<?php 
require_once("function/session.php");

$conn = mysqli_connect('127.0.0.1', 'user', 'user1234', 'board');
$idx = $_GET['idx'];
$sql = "select * from post where idx=$idx";
$res = mysqli_fetch_array(mysqli_query($conn, $sql));
$hit = $res['hit'] + 1;
$hit = mysqli_query($conn, "update post set hit=$hit where idx=$idx");

$title = $res['title'];
$content = $res['content'];
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='viewport' content='width=device-width, intial-scale=1.0'>

    <link rel="stylesheet" href="/css/read.css">
    <title>게시글</title>
</head>

<body>
    <a href="index.php"><h1>Alioth's Web Page</h1></a>

    <div class="board_area">
    <?php
    // echo $res['hit'];
    echo "<p>제목 : $title</p>";
    echo "<p>내용 : $content</p>";
    ?>

    </div>

</body>

</html>