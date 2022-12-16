<?php session_start(); ?>
<?php include("./connect.php")?>

<?php

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

  /* 공지사항 */
  .post_wrapper {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    padding: 0.5rem 1rem;
    background-color: #889FA5;

    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: all 5s ease;
  }

  .none {
    top: -100%;
  }

  .post_wrapper .post_title {
    font-size: 1.5rem;
  }

  .post_contents {
    flex: 1;
    align-self: center;
  }

  .exitBtn {
    flex-basis: 50px;
    cursor: pointer;
    transition: all 200ms ease;

    width: 30px;
    height: 7px;
    background-color: #000;
    transform: rotate(45deg);
  }

  .exitBtn:hover {
    transform: rotate(225deg);
  }

  .exitBtn::after {
    position: absolute;
    top: 0;
    left: 0;
    content: "";
    width: 100%;
    height: 7px;
    background-color: #000;
    transform: rotate(90deg);
  }




  /*  */

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

  .category_list {
    width: 900px;
    list-style-type: none;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
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
    <div class="post_wrapper">
      <?php
        $post_query = "select * from post order by write_date desc";
        $post_result = mysqli_query($connection, $post_query);
        $post_data = mysqli_fetch_array($post_result);

      // print_r($post_data);
        echo "
          <h1 class='post_title'>$post_data[0]</h1>
          <p class='post_contents'>$post_data[2]</p>
          <div class='exitBtn' onclick='exitPost()'></div>
        "
      ?>

    </div>
    <header>
      <sub>우리들의 모임 플랫폼</sub>
      <h1 class="title">Happy Together</h1>
    </header>
    <ul class="category_list">
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

      for (let i = 0; i < category.length; i++) {
        category[i].addEventListener("click", function() {
          location = "mainClassList.php?main_category_name=" + category[i].innerText;
        })
      }

    });

    const exitPost = (event) => {
      const post = document.querySelector('.post_wrapper');
      console.log(post)
      post.classList.add("none");
    }
    </script>
</body>

</html>