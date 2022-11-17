<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원목록</title>
    <style type="text/css">
        body{font-size:16px}
        a{text-decoration:none;color:rgb(0, 132, 255)}
        a:hover{color:rgb(255, 153, 0)}
        table{width:1328px;border-collapse:collapse}
        td{padding:10px 15px;text-align:center}
        .title{border-top:3px solid #999;border-bottom:2px solid #999;background:#eee;font-weight:bold}
        .brd{border-bottom:1px solid #999}
        table a{text-decoration:none;color:#000;border:1px solid #333;display:inline-block;padding:3px 5px;font-size:12px;border-radius:5px}
        table a:hover{border:0 none;background:rgb(0, 132, 255);color:#fff}
    </style>
    <script type="text/javascript">
        function del_check(idx){
            var i = confirm("정말 삭제하시겠습니까?\n삭제한 아이디는 복원하실 수 없습니다.");

            if(i == true){
                // alert("delete.php?u_idx="+idx);
                location.href = "delete.php?u_idx="+idx;
            };
        };
    </script>
</head>
<body>
<h2>* 관리자 페이지 *</h2>
    <p>"<?php echo $s_name; ?>"님, 안녕하세요.</p>
    <p>
        <a href="admin.php" class="bar" >홈으로 |</a>
        <a href="admin_user.php" class="bar">게시판 관리 |</a>
        <a href="admin_user.php" class="bar">회원 관리 |</a>
        <a href="admin_user.php" class="bar">카테고리 관리 |</a>
        <a href="admin_user.php" class="bar">공지사항 관리 |</a>
        <a href="logout.php" class="bar">로그아웃</a>
    </p>
    <hr>
    <p>총 <?php echo $num; ?>명</p>
    <table>
        <tr class="title">
            <td>번호</td>
            <td>이름</td>
            <td>아이디</td>
            <td>생년월일</td>
            <td>주소</td>
            <td>이메일</td>
            <td>전화번호</td>
            <td>가입일</td>
            <td>수정</td>
            <td>삭제</td>
        </tr>
    </table>   
  
</body>
</html>