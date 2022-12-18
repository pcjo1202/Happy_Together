<?php include('./connect.php') ?>
<?php 
    $contents = $_POST['contents'];
    $send_id = $_POST['send_id'];
    $receive_id = $_POST['receive_id'];

    $message_insert_query = "insert into message(contents, send_id, receive_id) values(
                                '$contents', '$send_id', '$receive_id')";
    $message_insert_result = mysqli_query($connection, $message_insert_query);
?>
<script>
    alert('쪽지가 전달되었습니다.');
    window.close();
    location='mypage.php';
</script>