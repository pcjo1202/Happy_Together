<?php  include('./connect.php')  ?>

<?php
    $register_idx = $_GET['register_idx'];
    $delete_query = "delete from register_class where register_idx = '$register_idx'";
    $delete_result = mysqli_query($connection,$delete_query);

    echo "<script>
            alert('모임 신청에서 제외 되었습니다.');
            location = 'mypage.php';
            </script>";

?>