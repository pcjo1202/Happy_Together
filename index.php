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

    ul {
      list-style-type: none;
      display: flex;
      gap: 2rem;
    }

    button {
      padding: 10px 20px;
      font-size: 1.5rem;
    }

    .ath:hover {
      font-size: 1.58rem;
      color: blue;
    }
    .game:hover {
      font-size: 1.58rem;
      color: blue;
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
        <button>스터디</button>
      </li>
      <li>
        <button>자유게시판</button>
      </li>
    </ul>
    <?php  
      if(!isset($_SESSION['id'])){
        echo "<div class='loginBox'>
          <button><a href='login.html'>Login</a></button>
        </div>
        <div>
          <a href='join.html'>회원가입</a>
        </div>";
      }
      else {
        $id = $_SESSION['id'];
        echo "<p><span class='span_id'>$id</span>님 환영합니다.</a>";
        echo "<a href='logout.php'>로그아웃</a>";
      }
    ?>
    
</body>

</html>