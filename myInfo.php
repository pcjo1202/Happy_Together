<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>마이페이지</title>
    <style>
        .mp{
            font-size: 50px;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
        }
        
        .content{
            display:flex;
            
        }
        table{
            
            
            border: 3px solid white;
            border-collapse: collapse;
            text-align: left;
            margin-top: 30px;
            margin-left: auto;
            margin-right: auto;
            
            width: 500px;
            height: 400px;
        }
        td{
            font-size: 25px;
            color : blue;
           
        }
        th{
            text-decoration:underline;
            text-underline-position:under;
        }
        .content2 {
            padding: 20px;
          margin-top: 60px;
          margin-left: 100px;
          margin-right:600px;
          border: 2px solid blue;
          font-size: 20px;
          font-weight: bold;
          border-radius: 30px;
        }
        hr {
            border: none;
            border-top: 3px dotted pink;
            color: #fff;
            background-color: #fff;
            height: 1px;
            
        }
    </style>
</head>
<body>
    <?php 
        $connection = mysqli_connect('localhost','happy','together','happytogether');
        if(!isset($_SESSION['id'])){
            echo "<script>alert('로그인을 하시오.'); location ='login.html';</script>";
            return;
        }
        $id = $_SESSION['id'];
        $query = "select name, gender, phone, nickname, birth, email  from member where id ='$id'";
        $result = mysqli_query($connection, $query);
        $myInfo = mysqli_fetch_array($result);
    
    ?>

    <a href = "login.html" class="a_home">HATO</a>
    <div class ="mp">마이페이지</div>            
    <div class="content">
        
    <table>
       
        <tr><td>이름(아이디)</td><th><?=$myInfo[0] ?>(<?=$id?>)</th></tr>
        <tr><td>성별</td><th><?=$myInfo[1] ?></th></tr>
        <tr><td>전화번호</td><th><?=$myInfo[2] ?></th></tr>
    </table>
     
    <table>
        <tr><td>닉네임</td><th><?=$myInfo[3] ?></th></tr>
        <tr><td>생일</td><th><?=$myInfo[4] ?></th></tr>
        <tr><td>이메일</td><th><?=$myInfo[5] ?></th></tr>
    </table>
    </div>
    <div class="content2">
        내가 만든 모임<br>
        <hr>
        축구할사람 구해요<br>
        ...<br>
        ...<br>
        ...
        <hr>
        참여중인 모임<br>
        <hr>
       농구할사람 구해요<br>
       ...<br>
        ...<br>
        ...
    </div>
</body>
</html>