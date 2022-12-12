<?php  session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>관리자 페이지</title>
    <style>
         h1 {
            text-align: center;
        }

        a {
            text-decoration: none;
            color: #000000;
            font-size: 40px;
            cursor: pointer;
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

        hr {
            height: 2px;
            background-color: #1AAB8A;
        }

        /* html,
        body {
            height: 100%;
        }*/
        body {
            text-align: center;
        }

        body:before {
            content: '';
            height: 100%;
            display: inline-block;
            vertical-align: middle;
        }

        button {
            background: #1AAB8A;
            color: #fff;
            border: none;
            position: relative;
            height: 60px;
            font-size: 1.6em;
            padding: 0 2em;
            cursor: pointer;
            transition: 800ms ease all;
            outline: none;
        }

        button:hover {
            background: #fff;
            color: #1AAB8A;
        }

        button:before,
        button:after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            height: 2px;
            width: 0;
            background: #1AAB8A;
            transition: 400ms ease all;
        }

        button:after {
            right: inherit;
            top: inherit;
            left: 0;
            bottom: 0;
        }

        button:hover:before,
        button:hover:after {
            width: 100%;
            transition: 800ms ease all;
        }
    </style>
</head>
<body>
    <?php 
        $connection = mysqli_connect('52.78.0.158','remoteJO','remoteJO','happyTogether',56946);  
        $admin = $_SESSION['id'];      
        if(!$admin){
            echo "<script>alert('관리자 권한이 없습니다.'); location='admin_login.html';</script>";
        }
    ?>
    <div class="container">
        <div class="center">
            <a href="#">관리자 페이지 </a>
        </div>
        <hr>
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