<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>공지사항 페이지</title>
    <style type="text/css">
    @import url(./reset.css);

    .container {
      display: flex;
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
      background-color: white;
      border: 1px solid black;
      color: black;
    }

    .addbut {
      background-color: white;
      border: 3px solid black;
      color: black;
      font-size: 30px;
      cursor: pointer;
    }

    .addbut:hover {
      background-color: gray;
      border: 3px solid black;
      color: white;
      font-size: 30px;
    }

    .delete:hover {
      background-color: red;
      border: none;
      color: black;
    }

    .fix:hover {
      background-color: blue;
      border: none;
      color: white;
    }

    body {
      font-size: 16px;
      background: #EEFFF1;
    }

    a {
      text-decoration: none;
      color: rgb(0, 132, 255);
      font-size: 40px;
    }

    a:hover {
      color: rgb(255, 153, 0);
    }

    table {
      width: 1328px;
      border-collapse: collapse;
      margin-left: auto;
      margin-right: auto;
    }

    td {
      padding: 10px 15px;
      text-align: center;
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
      border-bottom: 1px solid #999;
    }

    hr {
      height: 2px;
      background-color: #1AAB8A;
    }

    h1 {
      color: black;
      align: center;
    }

    .fix {
      cursor: pointer;
    }

    .post_title {
      cursor: pointer;
    }

    .post_title:hover {
      font-weight: bold;
      color: #1AAB8A;
    }
    </style>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
      let fix = document.querySelectorAll(".fix");
      let post_idx = document.querySelectorAll(".post_idx");

      for (let i = 0; i < fix.length; i++) {
        fix[i].addEventListener("click", function() {
          let delete_confirm = confirm('정말 삭제하시겠습니까?\n영구적으로 삭제됩니다.');
          if (delete_confirm) {
            location = 'delete_post.php?post_idx=' + post_idx[i].innerText;
          }
        })
      }

      let post_title = document.querySelectorAll(".post_title");
      for (let i = 0; i < post_title.length; i++) {
        post_title[i].addEventListener("click", function() {
          location = 'admin_post_content.php?post_idx=' + post_idx[i].innerText;
        })
      }

    })
    </script>
  </head>

  <body>
    <div class="container">
      <div class="left"> </div>
      <div class="center"><a href="adminMain.php"> 관리자 페이지 </a>
        <h2>공지사항</h2>
      </div>
      <div class="right"><a href="admin_post.html"><button class="addbut">공지사항 추가하기</button> </a> </div>
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
    $connection = mysqli_connect('52.78.0.158','remoteJO','remoteJO','happyTogether',56946);

    if(!isset($_SESSION['id'])){
        echo "<script>alert('관리자 권한이 없습니다.'); location='admin_login.html';</script>";
    }

    $query = "select * from post";
    $result = mysqli_query($connection,$query);

    $post = mysqli_fetch_array($result);
    $num = mysqli_num_rows($result);

    for($i=0; $i<$num; $i++) {      
        echo "<tr class='data'>
                <td class='post_idx'>$post[0]</td>
                <td class='post_title'>$post[1]</td>
                <td>$post[4]</td>
                <td><button class='fix'>삭제</button></td>
              </tr>";
        $post = mysqli_fetch_array($result);
    }
  ?>
    </table>
  </body>

</html>