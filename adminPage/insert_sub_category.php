<?php
    header("Content-Type:text/html;charset=utf-8");
    $connection = mysqli_connect('52.78.0.158','remoteJO','remoteJO','happyTogether',56946);        

    $main_category_name = $_POST['main_category'];
    $sub_category_name = $_POST['sub_category'];

    $confirm_over_query = "select * from sub_category where main_category = '$main_category_name' and sub_category_name = '$sub_category_name'";
    $confirm_over_result = mysqli_query($connection, $confirm_over_query);
    $confirm_over = mysqli_fetch_array($confirm_over_result);
    if($confirm_over[0]) {
        echo "<script>alert('이미 존재하는 서브 카테고리입니다.'); window.close(); location='admin_category.php';</script>";
        return;
    }

    $insert_sub_category_query = "insert into sub_category(sub_category_name, main_category)
                                values('$sub_category_name', '$main_category_name')";
    $insert_result = mysqli_query($connection, $insert_sub_category_query);

    $confirm_query = "select * from sub_category where sub_category_name= '$sub_category_name'";
    $confirm_result = mysqli_query($connection, $confirm_query);
    $confirm = mysqli_fetch_array($confirm_result);
    if($confirm[0]){
        echo "<script>alert('서브 커테고리가 추가되었습니다.'); window.close(); location='admin_category.php';</script>";
    }else {
        echo "<script>alert('error'); window.close(); location='admin_category.php';</script>";
    }
?>