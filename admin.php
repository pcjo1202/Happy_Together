<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>관리자 페이지</title>
    <style type="text/css">
        body{font-size:16px}
        a{text-decoration:none;color:rgb(0, 132, 255)}
        a:hover{color:rgb(255, 153, 0)}
        
    </style>
</head>
    <h1>관리자 페이지 </h1>
        <p>"<?php echo $s_name; ?>"님, 안녕하세요.</p>
        <p>
            <a href="admin.php" class="bar" >홈으로 </a>
            <a href="admin_user.php" class="bar">게시판 관리 |</a>
            <a href="admin_user.php" class="bar">회원 관리 |</a>
            <a href="admin_user.php" class="bar">카테고리 관리 |</a>
            <a href="admin_user.php" class="bar">공지사항 관리 |</a>
            <a href="logout.php" class="bar">로그아웃</a>
        </p>
        <hr>
</body>
</html>