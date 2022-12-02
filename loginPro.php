<?php
<<<<<<< HEAD
header("Content-Type:text/html;charset=utf-8");

$connection = mysqli_connect('52.78.0.158', 'remoteJO', 'remoteJO', 'happyTogether', 56946);
=======
 header("Content-Type:text/html;charset=utf-8");
 $connection = mysqli_connect('52.78.0.158','remoteJO','remoteJO','happyTogether',56946);
  
>>>>>>> 6e7e4ba (모임 상세보기 수정, 삭제, 신청 완료)


$id = $_POST['id'];
$password = $_POST['password'];
$query = "select id, password, name from member where id='$id'";

$result = mysqli_query($connection, $query);

$loginPro = mysqli_fetch_array($result);


if ($loginPro[0]) {
  if ("$password" == "$loginPro[1]") {
    echo "<script> 
        alert('로그인 성공'); 
        location.href='index.php';
      </script>";

    session_start();
    $_SESSION['id'] = $id;
    $_SESSION['name'] = $loginPro[2];
  } else {
    echo "<script>alert('비밀번호가 다릅니다.'); history.back();</script>";
  }
} else {
  echo "<script>alert('아이디가 다릅니다.'); history.back();</script>";
}

?>
