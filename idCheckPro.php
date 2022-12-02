<?php
header("Content-Type:text/html;charset=utf-8");


<<<<<<< HEAD
$connection = mysqli_connect('52.78.0.158', 'remoteJO', 'remoteJO', 'happyTogether', 56946);

=======
$connection = mysqli_connect('52.78.0.158','remoteJO','remoteJO','happyTogether',56946);
>>>>>>> 6e7e4ba (모임 상세보기 수정, 삭제, 신청 완료)


$id = $_GET['id'];

$query = "select * from member where id='$id'";
$result = mysqli_query($connection, $query);
$idCheckPro = mysqli_fetch_array($result); 

$result = mysqli_query($connection, $query);
$idCheckPro = mysqli_fetch_array($result);


if (!isset($idCheckPro[0])) {
    echo "<script>alert(`사용 가능한 ID입니다.`); history.back();</script>";
} else {
    echo "<script>alert('이미 사용중인 ID입니다.'); history.back();</script>";
}