<?php session_start(); ?>
<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <style>
    * {
      font-size: 20px;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    a {
      text-decoration: none;
    }
    body {
      width: 100%;
      height: 100vh;
    }

    .container {
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      gap: 2rem;
    }

    header>h1 {
      font-size: 4rem;
    }
    .loginBox {
      margin-top : 40px;
      width :200px;
      height : 50px;
      text-align : center;
    }
    .loginBox a {
      color : blue;
    }
    .a_login:hover, .a_join:hover {
      color: black;
      font-weight : bold;
      font-size : 1.05rem;
    }
    /* .loginBox {
      width : 100px;
      height : 40px;
      line-height : 30px;
      text-align: center;
      border: 4px solid black;
    } */
    ul {
      list-style-type: none;
      display: flex;
      gap: 2rem;
    }
    button {
      padding: 10px 20px;
      font-size: 1.5rem;
    }
    .ath:hover, .game:hover, .std:hover, .free:hover {
      font-size: 1.58rem;
      color: blue;
    }
    .span_id{
      color : blue;
      font-weight : bold;
      font-size : 1.08rem;
    }
    .a_logout {
      text-decoration : none;
      color : red;
      margin-left : 45px;
    }
  </style>
</head>

<body>
  <div class="container">
    <header>
      <h1>해피투게더</h1>
    </header>
    <ul>
      <li>
        <button class="ath">운동</button>
      </li>
      <li>
        <button class="game">게임</button>
      </li>
      <li>
        <button class="std">스터디</button>
      </li>
      <li>
        <button class="free">자유게시판</button>
      </li>
    </ul>
    <?php  
      if(!isset($_SESSION['id'])){
        echo "<div class='loginBox'>
          <a href='login.html' class='a_login'>로그인</a>&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp
          <a href='join.html' class='a_join'>회원가입</a>
        </div>";
      }
      else {
        $name = $_SESSION['name'];
        echo "<p><span class='span_id'>$name</span>님 환영합니다.</a><br>";
        echo "<a href='logout.php' class='a_logout'>로그아웃</a>";
      }
    ?>
    
</body>

</html>