<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>메인 카테고리 추가</title>
  <style>
    .button{
      background-color:#CCEEFF;
      border: 1;
      border-color:#CCEEFF;
      width:100px;
      margin:20px;
    }
    .textarea {
      background-color: #EEFBFF;
      border: 1;
      border-color: #CCEEFF;
      width: 150px;
      margin: 10px;
    }
    .container {
      text-align: center;
    }
    .message{
      font-weight: 800; 
        font-size: 18px; 
        color: rgb(0, 6, 128);
        margin: 30px;
    }
    .mainmessage{
            font-size:50px;
            text-align: center;
            font-weight: 600;
            margin:50px;
        }
  </style>
</head>

<body>
  <div class="container"></div>
  <p class='mainmessage'>
    메인 카테고리 추가하기
  </p>
  <div class='container'>
  <form name="form" method="post" action="./admin_category.php">
    <span class='message' >1. 메인 카테고리 이름을 입력하세요 :  </span><input
      type="text" name="main_category" class='textarea' />
      <br>
    <input type="submit" value="추가하기" class="button"/>
    <input type="button" value="닫기" class="button" />
  </form>
  </div>
</body>
</html>
