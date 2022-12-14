<?php 
header("Content-Type:text/html;charset=utf-8");
$connection = mysqli_connect('52.78.0.158','remoteJO','remoteJO','happyTogether',56946);
session_start();

$title = $_POST['title'];
$contents = $_POST['contents'];
$admin = $_SESSION['id'];


$insert_query = "insert into post(post_title, post_contents, write_admin) 
                    values('$title', '$contents', '$admin')";
$insert_result = mysqli_query($connection,$insert_query);
?>
<script>
    alert('공지사항이 등록되었습니다.');
    location = 'admin_post.php';
</script>
