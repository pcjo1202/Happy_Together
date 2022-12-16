<?php
    header("Content-Type:text/html;charset=utf-8");
    $connection = mysqli_connect('52.78.0.158','remoteJO','remoteJO','happyTogether',56946);        
    
    $main_category_name = $_POST['main_category'];

    $confirm_over_query = "select main_category_name from main_category where main_category_name = '$main_category_name'";
    $confirm_over_result = mysqli_query($connection, $confirm_over_query);
    $confirm_over = mysqli_fetch_array($confirm_over_result);
    if($confirm_over[0]) {
        echo "<script>alert('이미 존재하는 메인 카테고리입니다.'); window.close(); location='admin_category.php';</script>";
        return;
    }


    $insert_query = "insert into main_category(main_category_name) values('$main_category_name')";
    $insert_result = mysqli_query($connection, $insert_query);

    $confirm_query = "select * from main_category where main_category_name = '$main_category_name'";
    $confirm_result = mysqli_query($connection, $confirm_query);
    $confirm = mysqli_fetch_array($confirm_result);

    if($confirm[0]) {
        echo "<script>alert('메인 커테고리가 추가되었습니다.'); window.close(); location='admin_category.php';</script>";
    }else {
        echo "<script>alert('error'); window.close(); location='admin_category.php';</script>";
    }
?>