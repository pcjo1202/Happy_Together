<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시글페이지</title>
    <style type="text/css">
        .container {
        display: flex; }
        .left{width: 400px;  margin: auto 0;}
        .center{flex:3; text-align: center;}
        .right{width:400px; text-align:right; margin: auto 0;}
        button{background-color:black; border:none; color:white;}
        .button:hover{background-color:red; border:none; color:black;}
        body{font-size:16px}
        a{text-decoration:none; color:rgb(0, 132, 255); font-size:40px; align:center;}
        a:hover{color:rgb(255, 153, 0)}
        table{width:1328px;border-collapse:collapse; align:center;}
        td{padding:10px 15px;text-align:center}
        .title{border-top:3px solid #999;border-bottom:2px solid #999;background:#eee;font-weight:bold}
        .data{border-top:3px solid #999;border-bottom:2px solid #999;background:#fff;font-weight:bold}
        .brd{border-bottom:1px solid #999}
        table a{text-decoration:none;color:#000;border:1px solid #333;display:inline-block;padding:3px 5px;font-size:12px;border-radius:5px}
        table a:hover{border:0 none;background:rgb(0, 132, 255);color:#fff}
        h1{color:rgb(0, 132, 255)}
 </style>
</head>
<body>
<div class="container">
    <div class="left">  <a href="adminMain.php">* 관리자 페이지 *</a> </div>
    <div class="center"> <h1>게시판 관리</h1> </div>
    <div class="right"> </div>
</div>    
    <hr>
    <table>
        <tr class="title">
            <td>NO</td>
            <td>제목</td>
            <td>주최자</td>
            <td>분야</td>
            <td>기타</td>
        </tr>   
  <?php
    $connection = mysqli_connect('52.78.0.158','remoteJO','remoteJO','happyTogether',56946);
    
    $class_select_query = "select class_idx, class_title, class_leader_id, 
    main_category, sub_category from class order by write_date desc";
    $class_result = mysqli_query($connection, $class_select_query);
    $class = mysqli_fetch_array($class_result);

    // 개수
    $class_count = mysqli_num_rows($class_result);

    for($i=0; $i<$class_count; $i++) {
        echo "<tr class='data'>
                <td>$class[0]</td>
                <td>$class[1]</td>
                <td>$class[2]</td>
                <td>$class[3] / $class[4]</td>
                <td><button class='button'>삭제</button></td>
              </tr>";
        $class = mysqli_fetch_array($class_result);
    }
  ?>
  </table>
</body>
</html>