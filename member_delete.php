<?php
session_start();
include("./connect.php");
?>

<?php
    $id = $_GET['id'];

    $delete_query = "delete from member where id = '$id'";
    $delete_result = mysqli_query($connection, $delete_query);
    session_destroy();
?>
<script>
    alert('탈퇴가 성공적으로 처리 되었습니다.');
    location = 'index.php';
</script>