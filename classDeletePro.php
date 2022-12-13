<?php include("./connect.php")?>

<?php 
header("Content-Type:text/html;charset=utf-8");

    $idx = $_GET['class_idx'];

    $cate_query = "select main_category, sub_category from class where class_idx='$idx'";
    $cate_result = mysqli_query($connection, $cate_query);
    $catePro = mysqli_fetch_array($cate_result);


    // 삭제하기
    $delete_query = "delete from class where class_idx = '$idx'";
    $delte_result = mysqli_query($connection, $delete_query);

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



    
?>