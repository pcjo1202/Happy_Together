<?php session_start(); include("./connect.php")?>

<?php

    $title = $_POST['title'];
    if(!isset($_SESSION['id'])){
        echo "<script>alert('로그인하십시오'); location='login.html';</script>";
        return;
    }
    $id = $_SESSION['id'];
    $mainCategory = $_POST['mainCategory'];
    $subCategory = $_POST['subCategory'];
    $memberCount = $_POST['memberCount'];
    $place = $_POST['place'];
    $contents = $_POST['contents'];
    
    // 모임 글 추가하기!!
    $query = "insert into class(class_title, class_contents, class_place, 
    class_leader_id, total_member,main_category,sub_category)
    values('$title', '$contents', '$place', '$id', '$memberCount', '$mainCategory', '$subCategory')";
    $result = mysqli_query($connection, $query);

    echo "<script>alert('모임 작성을 완료하였습니다.'); location = 'mainClassList.php?main_category_name=$mainCategory&sub_category_name=$subCategory';</script>";

  
  mysqli_close($connect);
?>