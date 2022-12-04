<?php
header("Content-Type:text/html;charset=utf-8");
    $connection = mysqli_connect('52.78.0.158','remoteJO','remoteJO','happyTogether',56946);

    $idx = $_GET['class_idx'];
    $id = $_SESSION['id'];

    $leader_query = "select class_leader_id from class where class_idx = '$idx'";
    $leader_result = mysqli_query($connection, $leader_query);
    $leaderPro = mysqli_fetch_array($leader_result);

    $insert_query = "insert into register_class(class_idx, leader_id, register_id) 
                        values('$idx', '$leaderPro[0]', '$id')";
    $insert_result = mysqli_query($connection, $insert_query);

    $cate_query = "select main_category, sub_category from class where class_idx='$idx'";
    $cate_result = mysqli($connection, $cate_query);
    $catePro = mysqli_fetch_array($cate_result);


    $insert_confirm_query = "select * from register_class where class_idx=$idx";
    $confirm_result = mysqli_query($connection, $insert_confirm_query);
    $register_confirm = mysqli_fetch_array($confirm_result);
    
    if($register_confirm[0]){
        echo "<script>
            alert('신청 완료.');
            location = 'mainClassList.php?main_category=$catePro[0]&sub_category=$catePro[1]';
        </script>";
    }else {
        echo "<script>
            alert('신청 실패');
            location = 'mainClassList.php?main_category=$catePro[0]&sub_category=$catePro[1]';
        </script>";
    }
    

?>