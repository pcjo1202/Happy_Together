<?php 
session_start();
include("./connect.php");


    $idx = $_POST['class_idx'];
    $title = $_POST['title'];
    $contents = $_POST['contents'];
    $place = $_POST['place'];
    $id = $_SESSION['id'];
    $total_member = $_POST['memberCount'];
    $main_category = $_POST['mainCategory'];
    $sub_category = $_POST['subCategory'];

    $update_query = "update class set class_title = '$title', class_contents='$contents',
                     class_place='$place',total_member='$total_member'
                     where class_idx= '$idx'";
    $update_result = mysqli_query($connection, $update_query);

    echo "<script>
            alert('수정되었습니다.');
            location = 'classContent.php?class_idx=$idx';
         </script>";
?>