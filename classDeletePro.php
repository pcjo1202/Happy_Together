<?php 
    $connection = mysqli_connect('52.78.0.158','remoteJO','remoteJO','happyTogether',56946);

    $idx = $_POST['class_idx'];

    // 삭제하기
    $delete_query = "delete from class where class_idx = '$idx'";
    $delte_result = mysqli_query($connection, $delete_query);

    $cate_query = "select main_category, sub_category from class where class_idx='$idx'";
    echo "<script>
            alert('모임이 삭제되었습니다.');
            location = 'board.php?main_category=$cate_query[0]&sub_category=$cate_query[1]';
        </script>";
?>