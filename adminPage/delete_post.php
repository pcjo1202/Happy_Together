<?php
    header("Content-Type:text/html;charset=utf-8");
    $connection = mysqli_connect('52.78.0.158','remoteJO','remoteJO','happyTogether',56946);

    $post_idx = $_GET['post_idx'];
    $delete_query = "delete from post where post_idx = '$post_idx'";
    $delete_result = mysqli_query($connection, $delete_query);


?>
 <script>
    alert('공지사항이 삭제되었습니다.');
    location = 'admin_post.php';
</script>