<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원목록</title>
    <style type="text/css">
        .container {
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
      }
        body{font-size:16px}
        a{text-decoration:none; color:rgb(0, 132, 255); font-size:40px; align:center;}
        a:hover{color:rgb(255, 153, 0)}
        table{width:1328px;border-collapse:collapse}
        td{padding:10px 15px;text-align:center}
        .title{border-top:3px solid #999;border-bottom:2px solid #999;background:#eee;font-weight:bold}
        .brd{border-bottom:1px solid #999}
        table a{text-decoration:none;color:#000;border:1px solid #333;display:inline-block;padding:3px 5px;font-size:12px;border-radius:5px}
        table a:hover{border:0 none;background:rgb(0, 132, 255);color:#fff}
        h1{color:rgb(0, 132, 255)}
 </style>
</head>
<body>
    <div class="container">
    <a href="admin.html">* 관리자 페이지 *</a>  
    </div>
   
    <hr>
    <p>총 <?php echo $num; ?>명</p>
    <table>
        <tr class="title">
            <td>아이디</td>
            <td>비밀번호</td>
            <td>이름</td>
            <td>닉네임</td>
            <td>성별</td>
            <td>생일</td>
            <td>전화번호</td>
            <td>이메일주소</td>
            <td>가입일</td>
            <td>번호</td>
        </tr>
    </table>   
  <?php
    $database = "happytogether";
    $connect=mysql_connect('localhost','happy', 'hato')or die("mySQL 서버 연결 Error!");
    mysql_select_db($database, $connect);
    $query = "select * from member";
    $result = mysql_query($query,$connect);

    $num = mysql_num_rows($result);

    print "<table>";

    for($i=0; $i<$num; $i++) {
        $ans = mysql_fetch_row($result);       
        print "<tr class='title'><td>".$ans[0]."</td><td>".$ans[1]."</td><td>".$ans[2];
        print "</td><td>".$ans[3]."</td><td>".$ans[4]."</td><td>".$ans[5]."</td><td>".$ans[6]."</td><td>".$ans[7]."</td><td>".$ans[8]."</td><td>".$ans[9]."</td></tr><br>";
        
    }

    print "</table>"

  ?>
</body>
</html>