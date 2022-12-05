<?php
<<<<<<< HEAD
<<<<<<< HEAD
header("Content-Type:text/html;charset=utf-8");
session_start();
<<<<<<< HEAD
    $connection = mysqli_connect('52.78.0.158','remoteJO','remoteJO','happyTogether',56946);

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
=======
=======
header("Content-Type:text/html;charset=utf-8");
>>>>>>> 108a217 (Merge branch 'donghyun' of https://github.com/pcjo1202/Happy_Together into donghyun)
=======
>>>>>>> fdef4e9 (신청하기 완료)
    $connection = mysqli_connect('52.78.0.158','remoteJO','remoteJO','happyTogether',56946);

    // 모임 상세 보기에서 가져온 것 class_Idx, class_leader_id
    $idx = $_GET['class_idx'];
    $leader_id = $_GET['class_leader_id'];
    if(!isset($_SESSION['id'])){
        echo "<script>alert('로그인을 하시오.'); location='login.html';</script>";
        return;
    }
    $id = $_SESSION['id'];

    $confirm_over_qeury = "select * from register_class where register_id='$id'";
    $confirm_over_result = mysqli_query($connection, $confirm_over_qeury);
    $confirm_over_pro = mysqli_fetch_array($confirm_over_result);
    if($confirm_over_pro[0]){
        echo "<script>alert('이미 신청한 모임입니다.'); history.back();</script>";
        return;
    }

    $insert_query = "insert into register_class(class_idx, leader_id, register_id) 
                        values('$idx', '$leader_id', '$id')";
    $insert_result = mysqli_query($connection, $insert_query);

    $cate_query = "select main_category, sub_category from class where class_idx='$idx'";
    $cate_result = mysqli_query($connection, $cate_query);
    $catePro = mysqli_fetch_array($cate_result);

<<<<<<< HEAD

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
    

>>>>>>> 6e7e4ba (모임 상세보기 수정, 삭제, 신청 완료)
=======
    echo "<script>
        alert('신청 완료.');
        location = 'mainClassList.php?main_category_name=$catePro[0]&sub_category_name=$catePro[1]';
    </script>";
>>>>>>> fdef4e9 (신청하기 완료)
?>