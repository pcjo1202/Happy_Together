<?php session_start(); ?>

<?php
// $connection = mysqli_connect('localhost','happy','together','happytogether');
$connection = mysqli_connect('52.78.0.158', 'remoteJO', 'remoteJO', 'happyTogether', 56946);

$query = "select main_category_name from main_category";
$query2 = "select count(*) from main_category";
$result2 = mysqli_query($connection, $query2);
$category_count = mysqli_fetch_array($result2);
$result = mysqli_query($connection, $query);
$category = mysqli_fetch_array($result);
?>

<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <title>우리들 모임 플랫폼 - Happy Together</title>
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

  /*
  배경 #DADDE2
  버튼 #B1BDC5
   */

  body {
    background-color: #DADDE2;
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

  header {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: baseline;
  }

  header>sub {
    color: #628281;
  }

  header>.title {
    font-size: 4rem;
    color: #43655A;
  }

  .loginBox {
    margin-top: 40px;
    width: 200px;
    height: 50px;
    text-align: center;
  }

  .a_login,
  .a_join {
    color: #628281;
    transition: all 200ms;
  }

  .a_login:hover,
  .a_join:hover {
    color: #43655A;
    font-weight: bold;
  }

  ul {
    list-style-type: none;
    display: flex;
    gap: 2rem;
  }

  .cateItem {
    background-color: #B1BDC5;
    border: none;
    border-radius: 10px;
    padding: 0.5rem 2rem;
    font-size: 1.5rem;
    transition: all 200ms;
    cursor: pointer;
  }

  .cateItem:hover {
    background-color: #889FA5;
    transform: scale(1.1);
    color: #DADDE2;
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

</head>

<body>


  <div class="container">
    <header>
      <sub>우리들의 모임 플랫폼</sub>
      <h1 class="title">Happy Together</h1>
    </header>
    <ul>
      <?php for ($i = 0; $i < $category_count[0]; $i++) {
        echo "<li>
          <button class='cateItem category'>$category[0]</button>
        </li>";
        $category = mysqli_fetch_array($result);
      } ?>
    </ul>
    <?php
    if (!isset($_SESSION['id'])) {
      echo "
        <div class='loginBox'>
          <a href='login.html' class='a_login'>로그인</a>&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp
          <a href='join.html' class='a_join'>회원가입</a>
        </div>";
    } else {
      $name = $_SESSION['name'];
      echo "
        <p>
          <span class='span_id'>
            <a class='a_myInfo' href='mypage.php'>$name</a>
          </span>님 환영합니다.
        </p>
        <br>";
      echo "
        <a href='logout.php' class='a_logout'>로그아웃</a>
        ";
    }
    ?>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
      let category = document.querySelectorAll(".category");

      for(let i =0; i<category.length; i++) {
        category[i].addEventListener("click", function() {
          location = "mainClassList.php?main_category_name=" + category[i].innerText;
        })
      }

    });
    </script>
</body>

</html>