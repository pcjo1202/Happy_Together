<?php
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
header("Content-Type:text/html;charset=utf-8");

$connection = mysqli_connect('52.78.0.158', 'remoteJO', 'remoteJO', 'happyTogether', 56946);
=======
 header("Content-Type:text/html;charset=utf-8");
 $connection = mysqli_connect('52.78.0.158','remoteJO','remoteJO','happyTogether',56946);
  
>>>>>>> 6e7e4ba (모임 상세보기 수정, 삭제, 신청 완료)
=======
=======
>>>>>>> c408d92 (메인 게시글 DB 연결 및 카테고리 화면  노출 성공)
header("Content-Type:text/html;charset=utf-8");
$connection = mysqli_connect('52.78.0.158', 'remoteJO', 'remoteJO', 'happyTogether', 56946);
>>>>>>> 45f04bb (코드가 꼬여서 일단 그냥 커밋..)

=======
 header("Content-Type:text/html;charset=utf-8");

 $connection = mysqli_connect('localhost','happy','together','happytogether');

  $id = $_POST['id'];
  $password = $_POST['password'];
  $query = "select id, password, name from member where id='$id'";

  $result = mysqli_query($connection, $query);
  $loginPro = mysqli_fetch_array($result); 
>>>>>>> f6eadd8 (메인 게시글 DB 연결 및 카테고리 화면  노출 성공)

$id = $_POST['id'];
$password = $_POST['password'];
$query = "select id, password, name from member where id='$id'";
<<<<<<< HEAD

$result = mysqli_query($connection, $query);

$loginPro = mysqli_fetch_array($result);


=======
$result = mysqli_query($connection, $query);
$loginPro = mysqli_fetch_array($result);

>>>>>>> 45f04bb (코드가 꼬여서 일단 그냥 커밋..)
if ($loginPro[0]) {
  if ("$password" == "$loginPro[1]") {
    echo "<script> 
        alert('로그인 성공'); 
        location.href='index.php';
      </script>";
<<<<<<< HEAD

=======
>>>>>>> 45f04bb (코드가 꼬여서 일단 그냥 커밋..)
    session_start();
    $_SESSION['id'] = $id;
    $_SESSION['name'] = $loginPro[2];
  } else {
    echo "<script>alert('비밀번호가 다릅니다.'); history.back();</script>";
  }
} else {
  echo "<script>alert('아이디가 다릅니다.'); history.back();</script>";
<<<<<<< HEAD
}

?>
=======
}
>>>>>>> 45f04bb (코드가 꼬여서 일단 그냥 커밋..)
