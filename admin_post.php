<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>공지사항 페이지</title>
    <style type="text/css">
        .container {
        display: flex; }
        .left{width: 400px;  margin: auto 0;}
        .center{flex:3; text-align: center;}
        .right{width:400px; text-align:right; margin: auto 0;}
        button{background-color:white; border:1px solid black; color:black;}
        .addbut{background-color:white; border: 3px solid black; color:black; font-size:30px; }
        .addbut:hover{background-color:gray; border: 3px solid black; color:white; font-size:30px;}
        .delete:hover{background-color:red; border:none; color:black;}
        .fix:hover{background-color:blue; border:none; color:white;}
        body{font-size:16px;}
        a{text-decoration:none; color:rgb(0, 132, 255); font-size:40px;}
        a:hover{color:rgb(255, 153, 0);}
        table{width:1328px;border-collapse:collapse;}
        td{padding:10px 15px;text-align:center;}
        .title{border-top:3px solid #999;border-bottom:2px solid #999;background:#eee;font-weight:bold;}
        .data{border-top:3px solid #999;border-bottom:2px solid #999;background: #fff;;font-weight:bold;}
        .brd{border-bottom:1px solid #999;}
        
        h1{color:black; align:center;}
 </style>
</head>
<body>
<div class="container">
    <div class="left">  <a href="admin.html">* 관리자 페이지 *</a> </div>
    <div class="center"> <h1>공지사항</h1> </div>
    <div class="right"><a href="admin_post.html"><button class="addbut">공지사항 추가하기</button> </a>  </div>
</div>    
    <hr>
    <table>
        <tr class="title">
            <td>NO</td>
            <td>제목</td>
            <td>작성일자</td>
            <td>기타</td>
        </tr>
     
  <?php
    $database = "happytogether";
    $connect=mysql_connect('localhost','happy', 'together')or die("mySQL ?���? ?���? Error!");
    mysql_select_db($database, $connect);
    $query = "select * from member";
    $result = mysql_query($query,$connect);

    $num = mysql_num_rows($result);

    for($i=0; $i<$num; $i++) {
        $ans = mysql_fetch_row($result);       
        print "<tr class='data'><td>".$ans[0]."</td><td>".$ans[1]."</td><td>".$ans[2];
        print "</td><td><button class='fix'>수정</button>&ensp;<button class='delete'>삭제</button></td></tr><br>";
        
    }

    print "</table>"

  ?>
</body>
</html>