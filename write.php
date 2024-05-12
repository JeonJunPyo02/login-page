<?php 
require_once("function/session.php");
?>

<!DOCTYPE html>
<html lang="ko">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='viewport' content='width=device-width, intial-scale=1.0'>

	<link rel="stylesheet" href="">
	<title>글쓰기</title>

</head>
<body>
	<h2>게시글 작성</h2>

    <form action="writeup.php" method="post">
        <label for="author">작성자 : <?php echo $name?></label> 
		<input type="hidden" name="name" value=<?php echo $name?>><br><br>
        
        <label for="title">제목 :</label>
        <input type="text" id="title" name="title" required><br><br>
        
        <label for="content">내용 :</label><br>
        <textarea id="content" name="content" rows="10" required></textarea><br><br>
        
        <input type="submit" value="글쓰기">
    </form>

</body>
</html>