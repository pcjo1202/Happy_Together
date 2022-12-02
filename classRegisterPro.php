<?php
    $connection = mysqli_connect('52.78.0.158','remoteJO','remoteJO','happyTogether',56946);

    $idx = $_POST['class_idx'];
    $id = $_SESSION['id'];

    $leader_query = "select class_leader_id from class where class_idx = '$idx'";
    $leader_result = mysqli_query($connection, $leader_query);
    $leaderPro = mysqli_fetch_array($leader_result);

    $insert_query = "insert into register_class(class_idx, leader_id, register_id) 
                        values('$idx', '$leaderPro[0]', '$id')";
    $insert_result = mysqli_query($connection, $insert_query);

    $cate_query = "select main_category, sub_category from class where class_idx='$idx'";

    echo "<script>
            alert('신청 완료.');
            location = 'board.php?main_category=$cate_query[0]&sub_category=$cate_query[1]';
        </script>";

?>