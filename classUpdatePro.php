<?php 
    $connection = mysqli_connect('52.78.0.158','remoteJO','remoteJO','happyTogether',56946);

    $idx = $_POST['class_idx'];
    $title = $_POST['title'];
    $contents = $_POST['contents'];
    $place = $_POST['place'];
    $id = $_SESSION['id'];
    $total_member = $_POST['memberCount'];
    $main_category = $_POST['mainCategory'];
    $sub_category = $_POST['subCategory'];

    $update_query = "update class set class_title = '$title', class_contents='$contents',
                     class_place='$place', class_leader_id='$id', total_member='$total_member',
                     main_category='$main_category', sub_category='$sub_category' from class 
                     where class_idx= '$idx'";
    $update_result = mysqli_query($connection, $update_query);

    echo "<script>
            alert('수정되었습니다.');
            location = 'board.php?main_category=$main_category&sub_category=$sub_category';
         </script>";
?>
