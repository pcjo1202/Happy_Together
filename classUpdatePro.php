<?php 
<<<<<<< HEAD
<<<<<<< HEAD
header("Content-Type:text/html;charset=utf-8");
session_start();
=======
>>>>>>> 6e7e4ba (모임 상세보기 수정, 삭제, 신청 완료)
=======
header("Content-Type:text/html;charset=utf-8");
session_start();
>>>>>>> 108a217 (Merge branch 'donghyun' of https://github.com/pcjo1202/Happy_Together into donghyun)
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
<<<<<<< HEAD
<<<<<<< HEAD
                     class_place='$place',total_member='$total_member'
=======
                     class_place='$place', class_leader_id='$id', total_member='$total_member',
                     main_category='$main_category', sub_category='$sub_category' from class 
>>>>>>> 6e7e4ba (모임 상세보기 수정, 삭제, 신청 완료)
=======
                     class_place='$place',total_member='$total_member'
>>>>>>> 108a217 (Merge branch 'donghyun' of https://github.com/pcjo1202/Happy_Together into donghyun)
                     where class_idx= '$idx'";
    $update_result = mysqli_query($connection, $update_query);

    echo "<script>
            alert('수정되었습니다.');
<<<<<<< HEAD
<<<<<<< HEAD
            location = 'classContent.php?class_idx=$idx';
=======
            location = 'board.php?main_category=$main_category&sub_category=$sub_category';
>>>>>>> 6e7e4ba (모임 상세보기 수정, 삭제, 신청 완료)
=======
            location = 'classContent.php?class_idx=$idx';
>>>>>>> 108a217 (Merge branch 'donghyun' of https://github.com/pcjo1202/Happy_Together into donghyun)
         </script>";
?>
