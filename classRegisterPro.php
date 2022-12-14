<?php session_start(); include("./connect.php")?>

<?php
    // 모임 상세 보기에서 가져온 것 class_Idx, class_leader_id
    $idx = $_GET['class_idx'];
    $leader_id = $_GET['class_leader_id'];
    if(!isset($_SESSION['id'])){
        echo "<script>alert('로그인을 하시오.'); location='login.html';</script>";
        return;
    }
    $id = $_SESSION['id'];

    // 중복 신청 막기!!!!!
    $confirm_over_qeury = "select * from register_class where class_idx = '$idx' and register_id='$id'";
    $confirm_over_result = mysqli_query($connection, $confirm_over_qeury);
    $confirm_over_pro = mysqli_fetch_array($confirm_over_result);
    if($confirm_over_pro[0]){
        echo "<script>alert('이미 신청한 모임입니다.'); history.back();</script>";
        return;
    }

    $insert_query = "insert into register_class(class_idx, leader_id, register_id) 
                        values('$idx', '$leader_id', '$id')";
    $insert_result = mysqli_query($connection, $insert_query);

    // 카테고리 찾기
    $cate_query = "select main_category, sub_category from class where class_idx='$idx'";
    $cate_result = mysqli_query($connection, $cate_query);
    $catePro = mysqli_fetch_array($cate_result);

    echo "<script>
        alert('신청 완료.');
        location = 'mainClassList.php?main_category_name=$catePro[0]&sub_category_name=$catePro[1]';
    </script>";
?>