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
        button{background-color:black; border:none; color:white;}
        .button:hover{background-color:red; border:none; color:black;}
        body{font-size:16px;}
        a{text-decoration:none; color:rgb(0, 132, 255); font-size:40px; align:center;}
        a:hover{color:rgb(255, 153, 0);}
        table{width:1328px;border-collapse:collapse;}
        td{padding:10px 15px;text-align:center;}
        .title{border-top:3px solid #999;border-bottom:2px solid #999;background:#eee;font-weight:bold;}
        .data{border-top:3px solid #999;border-bottom:2px solid #999;background: #fff;;font-weight:bold;}
        .brd{border-bottom:1px solid #999;}
        table a{text-decoration:none;color:#000;border:1px solid #333;display:inline-block;padding:3px 5px;font-size:12px;border-radius:5px;}
        table a:hover{border:0 none;background:rgb(0, 132, 255);color:#fff;}
        h1{color:rgb(0, 132, 255)}
 </style>
</head>
<body>
    <div class="container">
    <a href="admin.html">* 관리자 페이지 *</a>  
    </div>   
    <hr>

    <table>
        <tr class="title">
            <td>NO</td>
            <td>이름(아이디)</td>
            <td>이메일</td>
            <td>가입일자</td>
            <td>기타</td>
        </tr>
     
  <?php
    $database = "happytogether";
    $connect=mysql_connect('localhost','happy', 'hato')or die("mySQL 서버 연결 Error!");
    mysql_select_db($database, $connect);
    $query = "select * from member";
    $result = mysql_query($query,$connect);

    $num = mysql_num_rows($result);

    for($i=0; $i<$num; $i++) {
        $ans = mysql_fetch_row($result);       
        print "<tr class='data'><td>".$ans[0]."</td><td>".$ans[1]."</td><td>".$ans[2];
        print "</td><td>".$ans[3]."</td><td><button class='button'>방출</button></td></tr><br>";
        
    }

    print "</table>"

  ?>
</body>
</html>