<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>메인 카테고리 추가</title>
  <style>
    input,
    select,
    textarea {
      background-color: rgb(255, 255, 255);
      border: 1;
      border-color: rgb(255, 255, 255);
    }
    .container {
      text-align: center;
    }
  </style>
</head>

<body>
  <div class="container"></div>
  <p align="center">
    <font size="7"><b>메인 카테고리 추가하기</b></font>
  </p>
  <form name="form" method="post" action="./admin_category.php">
    <span style="font-weight: bold; font-size: 1.5em/1em; color: rgb(0, 6, 128)">1. 메인 카테고리 이름을 입력하시오 : &ensp; </span><input
      type="text" name="main_category" style="width: 100px" margin="20px" />
    <input type="submit" value="추가하기" class="add"/>&emsp;&nbsp;
    <input type="button" value="닫기" class="close" />&ensp;&ensp;
  </form>
</body>
</html>
