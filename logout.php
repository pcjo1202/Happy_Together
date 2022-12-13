<?php include("./connect.php")?>

<?php 
header("Content-Type:text/html;charset=utf-8");
    session_start();
    echo "<script>alert('로그아웃 되었습니다.'); history.back();</script>";
    session_destroy();
?>