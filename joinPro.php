<?php 
 header("Content-Type:text/html;charset=utf-8");
 $connection = mysqli_connect('52.78.0.158','remoteJO','remoteJO','happyTogether',56946);
 

 $id = $_POST['id'];
 $password = $_POST['password'];
 $name = $_POST['name'];
 $nickname = $_POST['nickname'];
 $gender = $_POST['gender'];
 $birth = $_POST['birth'];
 $phone = $_POST['phone'];
 $email = $_POST['email'];
 
echo "$id, $password, $name, $nickname, $gender, $birth, $phone, $email";
 $query = "insert into member(id, password, name, nickname, gender, birth, phone, email)
            values('$id', '$password', '$name', '$nickname', '$gender', '$birth', '$phone', '$email')";
 $result = mysqli_query($connection, $query);

 $query2  = "select * from member where id = '$id'";
 $result2 = mysqli_query($connection, $query2);
 $joinCheck = mysqli_fetch_array($result2);
 if($joinCheck[0]) {
    echo "<script>
    alert('회원가입에 성공하였습니다.!!!!!');
    location = 'login.html';
</script>";
 }else {
    echo "<script>
    alert('회원가입에 실패하였습니다.!!!!!');
    location = 'index.php';
</script>";
 }
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
 mysqli_close($connection);
=======
 mysqli_close($connection);
?>
>>>>>>> 6e7e4ba (모임 상세보기 수정, 삭제, 신청 완료)
=======
 mysqli_close($connection);
>>>>>>> 45f04bb (코드가 꼬여서 일단 그냥 커밋..)
=======
 mysqli_close($connection);
=======
?>
<script>
alert("회원가입에 성공하였습니다.!!!!!");
location = "login.html";
</script>
>>>>>>> f6eadd8 (메인 게시글 DB 연결 및 카테고리 화면  노출 성공)
>>>>>>> c408d92 (메인 게시글 DB 연결 및 카테고리 화면  노출 성공)
=======
 mysqli_close($connection);
>>>>>>> 749def1 (파일 다시 리셋!! 아몰라)
