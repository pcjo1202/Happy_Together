<?php include('./connect.php')?>

<?php 
    $message_idx = $_GET['message_idx'];

    $update_read_count_query = "update message set read_count = read_count+1 where message_idx = '$message_idx'";
    $update_read_count_result = mysqli_query($connection, $update_read_count_query);

?>
<script>
    history.back();
</script>