<?php 
<<<<<<< HEAD
header("Content-Type:text/html;charset=utf-8");
    $connection = mysqli_connect('52.78.0.158','remoteJO','remoteJO','happyTogether',56946);

    $idx = $_GET['class_idx'];

    $cate_query = "select main_category, sub_category from class where class_idx='$idx'";
    $cate_result = mysqli_query($connection, $cate_query);
    $catePro = mysqli_fetch_array($cate_result);

=======
    $connection = mysqli_connect('52.78.0.158','remoteJO','remoteJO','happyTogether',56946);

    $idx = $_POST['class_idx'];
>>>>>>> 6e7e4ba (모임 상세보기 수정, 삭제, 신청 완료)

    // 삭제하기
    $delete_query = "delete from class where class_idx = '$idx'";
    $delte_result = mysqli_query($connection, $delete_query);

<<<<<<< HEAD
    $confirm_delete_query = "select * from class where class_idx = '$idx'";
    $confirm_result = mysqli_query($connection, $confirm_delete_query);
    $delete_confirm = mysqli_fetch_array($confirm_result);
    
    if(!$delete_confirm[0]){
        echo "<script>
            alert('모임이 삭제되었습니다.');
            location = 'mainClassList.php?main_category_name=$catePro[0]&sub_category_name=$catePro[1]';
        </script>";
    } else {
        echo "<script>
            alert('모임이 삭제에 실패하였습니다.');
            location = 'mainClassList.php?main_category_name=$catePro[0]&sub_category_name=$catePro[1]';
        </script>";
    }



    
=======
    $cate_query = "select main_category, sub_category from class where class_idx='$idx'";
    echo "<script>
            alert('모임이 삭제되었습니다.');
            location = 'board.php?main_category=$cate_query[0]&sub_category=$cate_query[1]';
        </script>";
>>>>>>> 6e7e4ba (모임 상세보기 수정, 삭제, 신청 완료)
?>