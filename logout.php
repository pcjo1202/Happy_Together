<?php session_start(); include("./connect.php")?>

<?php 
    echo "<script>alert('로그아웃 되었습니다.'); history.back();</script>";
    session_destroy();
?>