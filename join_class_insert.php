<?php
include('./connect.php')
?>

<?php
$class_idx = $_GET['class_idx'];
$leader_id = $_GET['leader_id'];
$join_id = $_GET['join_id'];

$insert_query = "insert into join_class (class_idx, leader_id, join_id) 
            values('$class_idx','$leader_id','$join_id')";
$insert_result = mysqli_query($connection, $insert_query);

$delete_query = "delete from register_class where register_id = '$join_id'";
$delete_result = mysqli_query($connection, $delete_query);

echo "<script>
        alert('추가 되었습니다.');
        location = 'mypage.php';    
    </script>";
?>
