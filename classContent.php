<<<<<<< HEAD
<<<<<<< HEAD
<?php session_start();?>
=======

>>>>>>> 6e7e4ba (모임 상세보기 수정, 삭제, 신청 완료)
=======
<?php session_start();?>
>>>>>>> 108a217 (Merge branch 'donghyun' of https://github.com/pcjo1202/Happy_Together into donghyun)
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
<<<<<<< HEAD
<<<<<<< HEAD
      input[type="button"], input[type="submit"] {
=======
      input[type="button"] {
>>>>>>> 6e7e4ba (모임 상세보기 수정, 삭제, 신청 완료)
=======
      input[type="button"], input[type="submit"] {
>>>>>>> 108a217 (Merge branch 'donghyun' of https://github.com/pcjo1202/Happy_Together into donghyun)
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
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 108a217 (Merge branch 'donghyun' of https://github.com/pcjo1202/Happy_Together into donghyun)
    <script>
      document.addEventListener("DOMContentLoaded", function() {
        let befBtn = document.querySelector(".befBtn");
        let updBtn = document.querySelector(".updBtn");
        let delBtn = document.querySelector(".delBtn");
<<<<<<< HEAD
        let regBtn = document.querySelector(".regBtn");
        let leader_id = document.querySelector(".leader_id").value;
        let session_id = document.querySelector(".session_id").value;
        let idx = document.querySelector(".idx");
        

        if(session_id == leader_id){
          regBtn.style.display = 'none';
        }else if(session_id.length==0){
          updBtn.style.display='none';
          delBtn.style.display='none';
          regBtn.style.display = 'none';
        }else if(session_id != leader_id){
          updBtn.style.display='none';
          delBtn.style.display='none';
        }

=======
        let idx = document.querySelector(".idx");
>>>>>>> 108a217 (Merge branch 'donghyun' of https://github.com/pcjo1202/Happy_Together into donghyun)

        befBtn.addEventListener("click", function() {
          history.back();
        })
        // 삭제 기능 완료
        delBtn.addEventListener("click", function() {
          location = 'classDeletePro.php?class_idx=' + idx.value;
        })
<<<<<<< HEAD
        // 신청 기능 
        regBtn.addEventListener("click", function(){
          location = 'classRegisterPro.php?class_idx=' + idx.value+'&class_leader_id='+leader_id;
        }) 

      })
    </script>
  </head>
=======
=======

      })
    </script>
>>>>>>> 108a217 (Merge branch 'donghyun' of https://github.com/pcjo1202/Happy_Together into donghyun)
  </head>

>>>>>>> 6e7e4ba (모임 상세보기 수정, 삭제, 신청 완료)
  <body>
  <?php 
    $connection = mysqli_connect('52.78.0.158','remoteJO','remoteJO','happyTogether',56946);
    
    $class_idx = $_GET['class_idx'];
<<<<<<< HEAD
<<<<<<< HEAD
    $current_id = $_SESSION['id'];

    $class_query = "select * from class where class_idx = '$class_idx'";
    $class_result = mysqli_query($connection, $class_query);
=======
=======
    $current_id = $_SESSION['id'];
>>>>>>> 108a217 (Merge branch 'donghyun' of https://github.com/pcjo1202/Happy_Together into donghyun)

    $class_query = "select * from class where class_idx = '$class_idx'";
    
    $class_result = mysqli_query($connection, $class_query);

>>>>>>> 6e7e4ba (모임 상세보기 수정, 삭제, 신청 완료)
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
<<<<<<< HEAD
<<<<<<< HEAD
          <form class="formBox" action="classUpdatePro.php" method="post">
            <input type="hidden" value="<?=$classPro[0]?>" class="idx" name="class_idx">
            <input type="hidden" value="<?=$classPro[4]?>" class="leader_id" name="leader_id">
            <input type="hidden" value="<?=$current_id?>" class="session_id">
=======
          <form class="formBox" action="#" method="post">
            <input type="hidden" value="<?=$classPro[0] ?>" name="class_idx">
>>>>>>> 6e7e4ba (모임 상세보기 수정, 삭제, 신청 완료)
=======
          <form class="formBox" action="classUpdatePro.php" method="post">
            <input type="hidden" value="<?=$classPro[0] ?>" class="idx" name="class_idx">
>>>>>>> 108a217 (Merge branch 'donghyun' of https://github.com/pcjo1202/Happy_Together into donghyun)
            <div class="title">
              <span>제목</span>
              <input type="text" value="<?=$classPro[1]?>" name="title" />
            </div>
            <div class="category">
              <span>카테고리</span>
<<<<<<< HEAD
<<<<<<< HEAD
              <input type="text" value="<?=$classPro[6]?>" name="mainCategory" readonly/> &ensp;/
              <input type="text" value="<?=$classPro[7]?>" name="subCategory" readonly/>
=======
              <input type="text" value="<?=$classPro[6]?>" name="mainCategory" /> /
              <input type="text" value="<?=$classPro[7]?>" name="subCategory" />
>>>>>>> 6e7e4ba (모임 상세보기 수정, 삭제, 신청 완료)
=======
              <input type="text" value="<?=$classPro[6]?>" name="mainCategory" readonly/> &ensp;/
              <input type="text" value="<?=$classPro[7]?>" name="subCategory" readonly/>
>>>>>>> 108a217 (Merge branch 'donghyun' of https://github.com/pcjo1202/Happy_Together into donghyun)
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
<<<<<<< HEAD
<<<<<<< HEAD

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
            <input class='updBtn' type='submit' value='수정' />
            <input class='delBtn' type='button' value='삭제' />
            <input class='regBtn' type='button' value='신청' />
            <input class='befBtn' type='button' value='이전' />
            
=======
            <input class="regBtn" type="button" value="신청" />
            <input class="updBtn" type="button" value="수정" />
            <input class="delBtn" type="button" value="삭제" />
=======

            <!-- 수정 삭제 신청 이전 버튼 css 수정 필요!!!!!!!!!!!!!!!!!! -->
            <?php
            if (!strcmp($classPro[4], $current_id)){
              echo "<input class='updBtn' type='submit' value='수정' />
                <input class='delBtn' type='button' value='삭제' />";
            } else {
              echo "<input class='regBtn' type='button' value='신청' />";
            }?>
>>>>>>> 108a217 (Merge branch 'donghyun' of https://github.com/pcjo1202/Happy_Together into donghyun)
            <input class="befBtn" type="button" value="이전" />
>>>>>>> 6e7e4ba (모임 상세보기 수정, 삭제, 신청 완료)
          </form>
        </div>
      </main>

      <footer>copyright 천지창조</footer>
    </div>
  </body>
</html>