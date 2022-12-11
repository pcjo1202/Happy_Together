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
      background-color: #dadde2;
      height: 100%;
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
      font-size: 1.2rem;
    }

    .left {
      /* flex: 1; */
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .left .subTitle {
      font-size: 1.2rem;
      font-weight: bold;
      color: #43655A;
    }

    header button {
      border: none;
      background: none;
    }

    header .logoBox .logo img {
      width: 100px;
    }

    .right {
      flex: 0 0 200px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .right .myPage a {
      cursor: pointer;
      transition: all 200ms;
      color: #628281;
    }

    .right .myPage a:hover {
      color: #43655A;
      font-weight: bold;
    }

    main {
      height: 100%;
      background-color: #b4c1c6;
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
      grid-template-columns: 1fr 1fr;

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
      /* align-self: center;
      grid-area: title; */
      display: flex;
      width: 100%;
    }

    .title>input {
      flex: 1;
    }

    .category {
      /* grid-area: category;
      justify-self: center; */
      display: flex;
      align-items: center;
    }

    .category>input {
      width: 50%;
      /* background-color: red; */
    }

    .members {
      /* grid-area: members;
      justify-self: flex-start; */
      display: flex;
      align-items: center;
      width: 100%;
    }

    .members>input {
      flex: 1;
    }

    .place {
      /* grid-area: place;
      justify-self: flex-start; */
      display: flex;
      align-items: center;
      width: 100%;
    }

    .place>input {
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
      grid-column: 1/3;
      display: flex;
      border: none;
      border-radius: 10px;
      padding: 1rem;
    }

    .btnBox {
      grid-column: 1/3;

      display: flex;
      justify-content: center;
      align-items: center;
      gap: 1rem;
    }

    .btn {
      width: 80%;
      border: none;
      padding: 10px 0;
      border-radius: 8px;
      background-color: #628281;

      transition: all 0.5s;
      cursor: pointer;
    }

    .regBtn {
      flex: 1;
      width: 80%;
    }

    .befBtn {
      flex: 0 0 200px;
      width: 40%;
      background-color: #ffffff;
    }

    .delBtn {
      flex: 0 0 200px;
      background-color: #d5a7a7;
    }

    .btn:hover {
      background-color: #c9c9c9;
    }
    </style>

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
            <a class="logo" href="index.php">
              <img src="./image/logo.png" alt="HATO">
            </a>
          </div>
          <div class="subTitle">모임 상세보기</div>
        </div>
        <div class="right">
          <div class="myPage">
            <a href='./mypage.php'>마이페이지</a>
          </div>
        </div>
      </header>

      <main>
        <div class="wrapper">
          <?php
          $idx = $classPro[0];
          $leader_id = $classPro[4];
          $title = $classPro[1];
          $main = $classPro[6];
          $sub = $classPro[7];
          $numbers = $classPro[5];
          $place = $classPro[3];
          $contents = $classPro[2];
          ?>
          <form class="formBox" action="classUpdatePro.php" method="post">
            <!--  -->
            <input type="hidden" value="<?=$idx?>" class="idx" name="class_idx">
            <input type="hidden" value="<?=$leader_id?>" class="leader_id" name="leader_id">
            <input type="hidden" value="<?=$current_id?>" class="session_id">
            <!--  -->
            <div class="title">
              <span>제목</span>
              <input type="text" value="<?=$title?>" name="title" />
            </div>
            <!--  -->
            <div class="category">
              <span>카테고리</span>
              <input type="text" value="<?=$main?>" name="mainCategory" readonly /> &ensp;/
              <input type="text" value="<?=$sub?>" name="subCategory" readonly />
            </div>
            <!--  -->
            <div class="members">
              <span>모집인원</span>
              <input type="number" name="memberCount" value="<?=$numbers?>" />
            </div>
            <!--  -->
            <div class="place">
              <span>장소</span>
              <input type="text" name="place" value="<?=$place?>" />
            </div>
            <!--  -->
            <textarea class="contents" name="contents" id="" cols="30" rows="10"
              placeholder="모입 시간, 장소, 모집인원"><?=$contents?>
            </textarea>

            <!-- 수정 삭제 신청 이전 버튼 css 수정 필요!!!!!!!!!!!!!!!!!! -->
            <?php
            // if (!strcmp($classPro[4], $current_id)){
            //   echo "<input class='updBtn' type='submit' value='수정' />
            //     <input class='delBtn' type='button' value='삭제' />
            //     <input class='befBtn' type='button' value='이전' />";
            //     return;
            // } else if(!isset($_SESSION['id'])) {
            //   echo "<input class='befBtn' type='button' value='이전' />";
            //   return;
            // }else{
            //   echo "<input class='regBtn' type='button' value='신청' />
            //   <input class='befBtn' type='button' value='이전' />";
            //   return;
            // }
            ?>
            <div class="btnBox">
              <input class='btn delBtn' type='button' value='삭제' />
              <input class='btn updBtn' type='submit' value='수정' />
              <input class='btn regBtn' type='button' value='신청' />
              <input class='btn befBtn' type='button' value='이전' />
            </div>

          </form>
        </div>
      </main>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
      let befBtn = document.querySelector(".befBtn");
      let updBtn = document.querySelector(".updBtn");
      let delBtn = document.querySelector(".delBtn");
      let regBtn = document.querySelector(".regBtn");
      let leader_id = document.querySelector(".leader_id").value;
      let session_id = document.querySelector(".session_id").value;
      let idx = document.querySelector(".idx");


      if (session_id == leader_id) {
        regBtn.style.display = 'none';
      } else if (session_id.length == 0) {
        updBtn.style.display = 'none';
        delBtn.style.display = 'none';
        regBtn.style.display = 'none';
      } else if (session_id != leader_id) {
        updBtn.style.display = 'none';
        delBtn.style.display = 'none';
      }


      befBtn.addEventListener("click", function() {
        history.back();
      })
      // 삭제 기능 완료
      delBtn.addEventListener("click", function() {
        location = 'classDeletePro.php?class_idx=' + idx.value;
      })
      // 신청 기능 
      regBtn.addEventListener("click", function() {
        location = 'classRegisterPro.php?class_idx=' + idx.value + '&class_leader_id=' + leader_id;
      })

    })
    </script>
  </body>

</html>