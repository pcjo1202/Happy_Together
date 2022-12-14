<?php 
header("Content-Type:text/html;charset=utf-8");
    $connection = mysqli_connect('52.78.0.158','remoteJO','remoteJO','happyTogether',56946);

    $userId = $_GET['userId'];
    echo "<script>console.log($userId);</script>";
    $delete_query = "delete from member where id = '$userId'";
    $delete_result = mysqli_query($connection, $delete_query);
    
    echo "<script>alert('삭제되었습니다.'); location='admin_user.php';</script>";
   
?>
