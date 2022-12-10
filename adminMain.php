<?php  session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>관리자 페이지</title>
    <style>
        button {
            font-size: 40px;
        }

        h1 {
            text-align: center;
        }

        body {
            font-size: 16px;
        }

        a {
            text-decoration: none;
            color: rgb(0, 132, 255);
            font-size: 40px;
            cursor :pointer;
        }
        button {
            cursor: pointer;
        }

        a:hover {
            color: rgb(255, 153, 0)
        }

        .container {
            height: 200px;
            position: relative;
        }

        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100px;
        }
    </style>
</head>
<body>
    <?php 
        $connection = mysqli_connect('52.78.0.158','remoteJO','remoteJO','happyTogether',56946);        
        if(!isset($_SESSION['id'])){
            echo "<script>alert('관리자 권한이 없습니다.'); location='admin_login.html';</script>";
        }
    ?>
    <div class="container">
        <div class="center">
            <a href="#">관리자 페이지 </a>
        </div>
        <div class="center">
            <button type="button" onclick="location.href='admin_user.php' ">유저관리 페이지</button>
        </div>
        <div class="center">
            <button type="button" onclick="location.href='admin_category.php' ">카테고리 페이지</button>
        </div>
        <div class="center">
            <button type="button" onclick="location.href='admin_meet.php' ">게시판 페이지</button>
        </div>
        <div class="center">
            <button type="button" onclick="location.href='admin_post.php' ">공지사항 페이지</button>
        </div>
    </div>
</body>

</html>