<?php 
require_once("function/session.php");
if(!isset($_SESSION['userid'])) {
	echo "<script>alert('로그인이 필요한 게시판 입니다.');</script>";
	echo "<script>location.replace('index.php')</script>";
}

$conn = mysqli_connect('127.0.0.1', 'user', 'user1234', 'board');
$sql = "select * from post order by idx desc limit 0,10";
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='viewport' content='width=device-width, intial-scale=1.0'>

    <link rel="stylesheet" href="/css/board.css">

    <title>게시판</title>
</head>

<body>
    <a href="index.php"><h1>Alioth's Web Page</h1></a>

    <div class="board_area">
        <h3>게시판 목록</h3>
    
        <table class="middle">
            <thead>
                <tr align=center>
                    <th width=70>글 번호</th>
                    <th width=300>제목</th>
                    <th width=120>작성자</th>
                    <th width=150>작성일</th>
                    <th width=70>조회수</th>
                </tr>
            </thead>
            <?php
            $res = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_array($res)){
            ?>
            <tbody>
                <tr align=center>
                    <td><?php echo $row['idx'];?></td>
                    <td><a href="read.php?idx=<?=$row['idx']?>"><?php echo $row['title'];?></a></td>
                    <td><?php echo $row['writer'];?></td>
                    <td><?php echo $row['created'];?></td>
                    <td><?php echo $row['hit'];?></td>
                </tr>
            </tbody>

            <?php
            }
            ?>
        </table>
        <div class="write_btn">
        <a href="write.php"><button>글쓰기</button></a>
        </div>
    </div>
</body>

</html>