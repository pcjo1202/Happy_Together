<?php
    header("Content-Type:text/html;charset=utf-8");
    $connection = mysqli_connect('52.78.0.158','remoteJO','remoteJO','happyTogether',56946);   

    $class_idx = $_GET['class_idx'];
    $delete_query = "delete from class where class_idx = '$class_idx'";
    $delete_result = mysqli_query($connection, $delete_query);
?>
<script>
    alert('게시글이 삭제되었습니다.');
    location = 'admin_meet.php';
</script>