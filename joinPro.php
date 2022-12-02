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
 mysqli_close($connection);
?>