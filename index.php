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
    margin-top: 40px;
    width: 200px;
    height: 50px;
    text-align: center;
  }

  .loginBox a {
    color: blue;
  }

  .a_login:hover,
  .a_join:hover {
    color: black;
    font-weight: bold;
    font-size: 1.05rem;
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
    cursor: pointer;
  }

  .cate0:hover,
  .cate1:hover,
  .cate2:hover,
  .cate3:hover {
    font-size: 1.58rem;
    color: blue;
  }

  .span_id {
    color: blue;
    font-weight: bold;
    font-size: 1.08rem;
  }

  .a_logout {
    text-decoration: none;
    color: red;
    margin-left: 45px;
  }

  .a_myInfo:hover,
  .a_logout:hover {
    font-size: 1.03rem;
    font-weight: bold;
  }
  </style>
  <script>
  document.addEventListener("DOMContentLoaded", function() {
    let cate0 = document.querySelector(".cate0");
    let cate1 = document.querySelector(".cate1");
    let cate2 = document.querySelector(".cate2");
    let cate3 = document.querySelector(".cate3");
    let cate0Value = cate0.innerText;
    let cate1Value = cate1.innerText;
    let cate2Value = cate2.innerText;
    let cate3Value = cate3.innerText;
    cate0.addEventListener("click", function() {
      location = "board.php?main_category_name=" + cate0Value;
    })
    cate1.addEventListener("click", function() {
      location = "board.php?main_category_name=" + cate1Value;
    })
    cate2.addEventListener("click", function() {
      location = "board.php?main_category_name=" + cate2Value;
    })
    cate3.addEventListener("click", function() {
      location = "board.php?main_category_name=" + cate3Value;
    })
  });
  </script>
</head>

<body>
  <?php  
    // $connection = mysqli_connect('localhost','happy','together','happytogether');
    $dbname = 'happyTogether';
    $host = '52.78.0.158:56946';
    $dbuser = 'remoteJO';
    $dbpassword = 'remoteJO';
    
     $connection = mysqli_connect($host, $dbuser, $dbpassword,$dbname);

    $query = "select main_category_name from main_category";
    $query2 = "select count(*) from main_category";
    $result2 = mysqli_query($connection, $query2);
    $category_count = mysqli_fetch_array($result2);
    $result = mysqli_query($connection, $query);
    $category = mysqli_fetch_array($result);
  ?>

  <div class="container">
    <header>
      <h1>해피투게더</h1>
    </header>
    <ul>
      <?php  for($i=0; $i < $category_count[0]; $i++){
        echo "<li>
          <button class='cate$i'>$category[0]</button>
        </li>";
        $category = mysqli_fetch_array($result);
      }?>
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
        echo "<p><span class='span_id'><a class='a_myInfo' href='myInfo.php'>$name</a></span>님 환영합니다.</a><br>";
        echo "<a href='logout.php' class='a_logout'>로그아웃</a>";
      }
    ?>

</body>

</html>