<?php include("./connect.php")?>

<?php 
 $id = $_POST['id'];
 $password = $_POST['password'];
 $name = $_POST['name'];
 $nickname = $_POST['nickname'];
 $gender = $_POST['gender'];
 $birth = $_POST['birth'];
 $phone = $_POST['phone'];
 $email = $_POST['email'];
 
 $query = "insert into member(id, password, name, nickname, gender, birth, phone, email)
            values('$id', '$password', '$name', '$nickname', '$gender', '$birth', '$phone', '$email')";
 $result = mysqli_query($connection, $query);

 $query2  = "select * from member where id = '$id'";
 $result2 = mysqli_query($connection, $query2);
 $joinCheck = mysqli_fetch_array($result2);
 if($joinCheck[0]) {
    echo "<script>
    alert('회원가입에 성공하였습니다.!!!!!');
</script>";
 }else {
    echo "<script>
    alert('회원가입에 실패하였습니다.!!!!!');
</script>";
 } echo "<script>location = 'login.html';</script>";
 mysqli_close($connection);