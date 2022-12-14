<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>사용자 목록</title>
    <style type="text/css">
        .container {
        text-align:center; }
        .left{width: 400px;  margin: auto 0;}
        .center{flex:3; text-align: center;}
        .right{width:400px; text-align:right; margin: auto 0;}
        button{background-color:black; border:none; color:white; cursor: pointer;}
        .button:hover{background-color:red; border:none; color:black;}
        body{font-size:16px; background:#EEFFF1; }
        a{text-decoration:none; color:rgb(0, 132, 255); font-size:40px; align:center;}
        a:hover{color:rgb(255, 153, 0);}
        table{width:1328px;border-collapse:collapse;  margin-left: auto; 
  margin-right: auto;}
        td{padding:10px 15px;text-align:center;}
        .title{border-top:3px solid #1AAB8A;border-bottom:2px solid #1AAB8A;background:#1AAB8A;font-weight:bold;
        color:white;}
        .data{border-top:3px solid #1AAB8A;border-bottom:2px solid #1AAB8A;background: #fff;;font-weight:bold;}
        .brd{border-bottom:1px solid #999;}
        
        h2{color:rgb(0, 0, 0)}
        hr {
            height: 2px;
            background-color: #1AAB8A;
        }
 </style>
 <script>
    document.addEventListener("DOMContentLoaded", function() {
        let button = document.querySelectorAll(".button");
        let userId = document.querySelectorAll(".userId");

        for(let i=0; i < button.length; i++){
            button[i].addEventListener("click",function() {
                let delete_confirm = confirm('영구적으로 방출됩니다!!!!!\n정말 방출시키시겠습니까?');
                if(delete_confirm) {
                    location = 'admin_user_delete.php?userId='+userId[i].innerText;
                }
            })
        }

    })
 </script>
</head>
<body>
    <?php 
        $connection = mysqli_connect('52.78.0.158','remoteJO','remoteJO','happyTogether',56946);        
        if(!isset($_SESSION['id'])){
            echo "<script>alert('관리자 권한이 없습니다.'); location='admin_login.html';</script>";
        }
    ?>
<div class="container">  
    <a href="adminMain.php"> 관리자 페이지 </a>  
    <br> <h2>유저 설정</h2>    
</div>    
    <hr>
    <table>
        <tr class="title">
            <td>NO</td>
            <td>이름</td>
            <td>ID</td>
            <td>E-MAIL</td>
            <td>가입일자</td>
            <td>기타</td>
        </tr>
     
  <?php
    $connection = mysqli_connect('52.78.0.158','remoteJO','remoteJO','happyTogether',56946);
    
    $select_query = "select name, id, email, signup_date from member order by signup_date desc";
    $select_result = mysqli_query($connection, $select_query);
    $user = mysqli_fetch_array($select_result);
    // 개수
    $select_count = mysqli_num_rows($select_result);
    
    for($i=0; $i < $select_count; $i++) {?>
        <tr class='data'><td><?=$i+1?></td><td><?=$user[0]?></td>
        <td class='userId'><?=$user[1]?></td><td><?=$user[2]?></td><td><?=$user[3]?></td>
        <td><button class='button'>방출</button></td></tr><br>
        <?php $user = mysqli_fetch_array($select_result);
     }
  ?>
  </table>
</body>
</html>