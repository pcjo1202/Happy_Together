<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Happy Together - 모임 만들기</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-size: 20px;
      }
      body {
        background-color: rgba(243, 240, 240, 0.781);
      }

      a {
        text-decoration: none;
      }

      .container {
        display: flex;
        flex-direction: column;
      }

      header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem;
        font-size: 1.2rem;
      }

      .left {
        display: flex;
        align-items: center;
        justify-content: center;
      }

      header button {
        border: none;
        background: none;
      }

      header .logoBox .logo {
        font-size: 2.5rem;
        color: #e3c8c8;
      }

      .right {
        display: flex;
        justify-content: center;
        align-items: center;
      }

      main {
        background-color: #a1bad8;
        padding: 1rem 0;
        flex: 32rem;
        display: flex;
        justify-content: center;
        align-items: center;
      }
      main .wrapper {
        width: 900px;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .formBox {
        padding: 1rem;
        display: grid;
        gap: 0.8rem;
        grid-template-columns: 3fr 2fr;
        grid-template-areas:
          'title title'
          'category members'
          'place date'
          'contents contents'
          'subBtn subBtn';
        align-items: center;
      }
      input[type='text'],
      input[type='number'],
      input[type='date'] {
        flex: 1;
        border: none;
        border-radius: 5px;
        height: 45px;
        padding: 7px;
        margin-left: 10px;
      }
      .title {
        align-self: center;
        grid-area: title;
        display: flex;
        width: 100%;
      }
      .title > input {
        flex: 1;
      }
      .category {
        grid-area: category;
        justify-self: center;
        display: flex;
        align-items: center;
      }
      .category > input {
        width: 50%;
        /* background-color: red; */
      }

      .members {
        grid-area: members;
        justify-self: flex-start;
        display: flex;
        align-items: center;
        width: 100%;
      }
      .members > input {
        flex: 1;
      }

      .place {
        grid-area: place;
        justify-self: flex-start;
        display: flex;
        align-items: center;
        width: 100%;
      }
      .place > input {
        flex: 1;
      }

      .date {
        grid-area: date;
        justify-self: center;
        display: flex;
        align-items: center;
        width: 100%;
      }
      .contents {
        grid-area: contents;
        display: flex;
        border: none;
        border-radius: 10px;
      }
      input[type="button"], input[type="submit"] {
        width: 80%;
        /* grid-area: subBtn; */
        border: none;
        justify-self: center;
        padding: 10px 0;
        border-radius: 8px;
        background-color: #fff9ce;
        transition: all 0.5s;
        cursor: pointer;
      }
      input[type="button"]:hover {
        background-color: #e0ffc8;
      }

      .footer {
      }
    </style>
    <script>
      document.addEventListener("DOMContentLoaded", function() {
        let befBtn = document.querySelector(".befBtn");
        let updBtn = document.querySelector(".updBtn");
        let delBtn = document.querySelector(".delBtn");
        let idx = document.querySelector(".idx");

        befBtn.addEventListener("click", function() {
          history.back();
        })
        // 삭제 기능 완료
        delBtn.addEventListener("click", function() {
          location = 'classDeletePro.php?class_idx=' + idx.value;
        })

      })
    </script>
  </head>

  <body>
  <?php 
    $connection = mysqli_connect('52.78.0.158','remoteJO','remoteJO','happyTogether',56946);
    
    $class_idx = $_GET['class_idx'];
    $current_id = $_SESSION['id'];

    $class_query = "select * from class where class_idx = '$class_idx'";
    
    $class_result = mysqli_query($connection, $class_query);

    $classPro = mysqli_fetch_array($class_result);
?>
    <div class="container">
      <header>
        <div class="left">
          <div class="logoBox">
            <a class="logo" href="index.php">HATO</a>
          </div>
          <div class="subTitle">모임 상세보기</div>
        </div>
        <div class="right">
          <div class="myPage">
            <button><a href='myInfo.php'>마이페이지</a></button>
          </div>
        </div>
      </header>

      <main>
        <div class="wrapper">
          <form class="formBox" action="classUpdatePro.php" method="post">
            <input type="hidden" value="<?=$classPro[0] ?>" class="idx" name="class_idx">
            <div class="title">
              <span>제목</span>
              <input type="text" value="<?=$classPro[1]?>" name="title" />
            </div>
            <div class="category">
              <span>카테고리</span>
              <input type="text" value="<?=$classPro[6]?>" name="mainCategory" readonly/> &ensp;/
              <input type="text" value="<?=$classPro[7]?>" name="subCategory" readonly/>
            </div>
            <div class="members">
              <span>모집인원</span>
              <input type="number" name="memberCount" value="<?=$classPro[5]?>" />
            </div>
            <div class="place">
              <span>장소</span>
              <input type="text" name="place" value="<?=$classPro[3]?>" />
            </div>
            <textarea
              class="contents"
              name="contents"
              id=""
              cols="30"
              rows="10"
              placeholder="
              모입 시간, 장소, 모집인원
              "
            ><?=$classPro[2]?></textarea>

            <!-- 수정 삭제 신청 이전 버튼 css 수정 필요!!!!!!!!!!!!!!!!!! -->
            <?php
            if (!strcmp($classPro[4], $current_id)){
              echo "<input class='updBtn' type='submit' value='수정' />
                <input class='delBtn' type='button' value='삭제' />";
            } else {
              echo "<input class='regBtn' type='button' value='신청' />";
            }?>
            <input class="befBtn" type="button" value="이전" />
          </form>
        </div>
      </main>

      <footer>copyright 천지창조</footer>
    </div>
  </body>
</html>