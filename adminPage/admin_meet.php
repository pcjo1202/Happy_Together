<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시글페이지</title>
    <style type="text/css">
    @import url(./reset.css);

    .container {
      text-align: center;
    }

    .left {
      width: 400px;
      margin: auto 0;
    }

    .center {
      flex: 3;
      text-align: center;
    }

    .right {
      width: 400px;
      text-align: right;
      margin: auto 0;
    }

    button {
      background-color: black;
      border: none;
      color: white;
      cursor: pointer;
    }

    .button:hover {
      background-color: red;
      border: none;
      color: black;
    }

    body {
      font-size: 16px;
      background: #EEFFF1;
    }

    a {
      text-decoration: none;
      color: rgb(0, 132, 255);
      font-size: 40px;
      align: center;
    }

    a:hover {
      color: rgb(255, 153, 0)
    }

    table {
      width: 1328px;
      border-collapse: collapse;
      margin-left: auto;
      margin-right: auto;
    }

    td {
      padding: 10px 15px;
      text-align: center
    }

    .title {
      border-top: 3px solid #1AAB8A;
      border-bottom: 2px solid #1AAB8A;
      background: #1AAB8A;
      font-weight: bold;
      color: white;
    }

    .data {
      border-top: 3px solid #1AAB8A;
      border-bottom: 2px solid #1AAB8A;
      background: #fff;
      ;
      font-weight: bold;
    }

    .brd {
      border-bottom: 1px solid #999
    }

    table a {
      text-decoration: none;
      color: #000;
      border: 1px solid #333;
      display: inline-block;
      padding: 3px 5px;
      font-size: 12px;
      border-radius: 5px
    }

    table a:hover {
      border: 0 none;
      background: rgb(0, 132, 255);
      color: #fff
    }

    h1 {
      color: rgb(0, 132, 255)
    }

    hr {
      height: 2px;
      background-color: #1AAB8A;
    }
    </style>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
      let button = document.querySelectorAll(".button");
      let class_idx = document.querySelectorAll(".class_idx");


      for (let i = 0; i < button.length; i++) {
        button[i].addEventListener("click", function() {
          let delete_confirm = confirm('정말 삭제하시겠습니까?\n영구적으로 삭제됩니다.');
          if (delete_confirm) {
            location = 'delete_class.php?class_idx=' + class_idx[i].innerText;
          }
        })
      }

    })
    </script>
  </head>

  <body>
    <div class="container">
      <a href="adminMain.php"> 관리자 페이지 </a>
      <br>
      <h2>게시판 관리</h2>
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
                <td class='class_idx'>$class[0]</td>
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