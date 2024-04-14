<?php
session_start();

if(isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    echo "안녕하세요! $userid 님";
    echo '<form action="logout.php" method="post">';
    echo '<input type="submit" value="로그아웃">';
    echo '</form>';
} else {
    echo "login plz...";
}
?>
