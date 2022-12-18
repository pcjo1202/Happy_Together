<?php session_start();?>
<?php include("./connect.php")?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Happy Together - 모임 만들기</title>
    <style>
    @import url(./reset.css);

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

    ul,
    li {
      list-style: none;
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
      width: 100%;
      height: 100%;
      background-color: #b4c1c6;
      padding: 1rem;
      flex: 32rem;
      display: flex;
      justify-content: center;
    }

    .wrapper {
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 0.5rem;
    }

    main .classData_wrapper {
      width: 900px;
      flex: 1;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: baseline;
    }

    main .memberStatus_wrapper {
      flex: 0 0 400px;
      height: 600px;
      border-radius: 10px;
      background-color: #fff;

      display: flex;
      flex-direction: column;
      display: none;
    }

    main .memberStatus_wrapper .attendor_status {
      flex: 0 0 400px;
      padding: 0.5rem 1rem;
      border-bottom: 3px solid #43655A;
      overflow: auto;
    }

    main .memberStatus_wrapper .applicant_status {
      flex: 0 0 200px;
      padding: 0.5rem 1rem;
    }

    .member_title {
      font-size: 1.2rem;
    }

    main .memberStatus_wrapper .member_list {
      padding: 0.3rem 0;
      display: flex;
      flex-direction: column;
      gap: 0.5rem;

      overflow: auto;
    }

    main .memberStatus_wrapper .member_list::-webkit-scrollbar-thumb {
      background-color: #43655A;
    }

    .attendor_list {
      width: 100%;
      flex-wrap: wrap;
    }

    .attendor_list>li {}

    .applicant_list {
      height: 150px;
    }

    .member_list li {
      padding: 0.3rem;
      display: flex;
      align-items: center;
      /* cursor: pointer; */
    }

    .member_list li .member_name {
      background-color: #e9eaea;
      border-radius: 15px;
      text-align: center;
      padding: 0.2rem 0.5rem;
      flex: 1;
    }

    .member_list li .member_btn {
      flex: 0 0 60%;

      display: flex;
      justify-content: flex-end;
      gap: 0.7rem;
    }

    .member_list li .member_btn>span {
      background-color: wheat;
      padding: 0.1rem 0.5rem;
      border-radius: 10px;
      font-size: 0.9rem;
      transition: all 200ms;
      cursor: pointer;
    }

    .member_list li .member_btn>span:hover {
      background-color: #b4c1c6;
    }

    .member_list li .member_btn .refuse {
      background-color: #ffc5c5;
    }

    /*  */

    .formBox {
      width: 90%;
      padding: 0.5rem;
      display: grid;
      gap: 1.5rem;
      grid-template-columns: 1fr 1fr;

      align-items: center;
    }

    .subject>span {
      align-self: center;
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
      grid-column: 1/3;
      display: flex;
      width: 100%;
    }

    .title>input {
      flex: 1;
    }

    .category {
      grid-column: 1/3;

      display: flex;
      align-items: center;
    }

    .category>input {
      width: 50%;
    }

    .members {
      display: flex;
      align-items: center;
      width: 100%;
    }

    .members>input {
      flex: 1;
    }

    .place {

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
          <div class="classData_wrapper">
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
              <div class="subject title">
                <span>제목</span>
                <input type="text" value="<?=$title?>" name="title" readonly />
              </div>
              <!--  -->
              <div class="subject category">
                <span>카테고리</span>
                <input type="text" value="<?=$main?>" name="mainCategory" readonly /> &ensp;/
                <input type="text" value="<?=$sub?>" name="subCategory" readonly />
              </div>
              <!--  -->
              <div class="subject members">
                <span>모집인원</span>
                <input type="number" name="memberCount" value="<?=$numbers?>" readonly />
              </div>
              <!--  -->
              <div class="subject place">
                <span>장소</span>
                <input type="text" name="place" value="<?=$place?>" readonly />
              </div>
              <!--  -->
              <textarea class="contents" name="contents" id="" cols="30" rows="10" placeholder="모입 시간, 장소, 모집인원"
                readonly><?=$contents?>
              </textarea>

              <div class="btnBox">
                <input class='btn delBtn' type='button' value='삭제' />
                <input class='btn updBtn' type='button' value='수정' />
                <input class='btn regBtn' type='button' value='신청' />
                <input class='btn befBtn' type='button' value='이전' />
              </div>

            </form>
          </div>
          <!-- 신청자, 참여자 현황 :: 모임의 리더만 볼 수 있게...
              -> 평소에 display : none 상태이고, 
              if( 모임 리더 id == 로그인 중인 id) 이면 display: block;
         -->
          <div class="memberStatus_wrapper">
            <!-- attendor 참여자 목록-->
            <div class="attendor_status">
              <h3 class="member_title attendor_title">참여자 목록</h3>
              <ul class="member_list attendor_list">
                <?php
                  // 참여자 목록 불러오기
                  $join_member_query = "select join_id from join_class where class_idx = '$class_idx'";
                  $join_result = mysqli_query($connection, $join_member_query);

                  while($join_member = mysqli_fetch_array($join_result)){
                    echo "
                    <li class='member'>
                      <span class='member_name'>$join_member[0]</span>
                    </li>";
                  }
                  
                ?>
              </ul>
            </div>
            <!-- applicant 신청자 현황<-->
            <div class="applicant_status">
              <h3 class="member_title applicant_title">신청자 현황</h3>
              <ul class="member_list applicant_list">

                <?php
                // 신청자 현황 받아오기
                $register_member_query = "select register_idx, register_id from register_class where class_idx = '$class_idx'";
                $register_result = mysqli_query($connection, $register_member_query);
                while($register_member = mysqli_fetch_array($register_result)){
                  echo "
                  <li class='member'>
                  <input type='hidden' value='$register_member[0]' class='register_idx'>
                  <span class='member_name register_member_name'>$register_member[1]</span>
                  <div class='member_btn'>
                    <span class='accept'>수락</span>
                    <span class='refuse'>거절</span>
                  </div>
                  </li>";
                }
                ?>
              </ul>
            </div>
          </div>
        </div>
      </main>
    </div>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
      const befBtn = document.querySelector(".befBtn");
      const updBtn = document.querySelector(".updBtn");
      const delBtn = document.querySelector(".delBtn");
      const regBtn = document.querySelector(".regBtn");
      const leader_id = document.querySelector(".leader_id").value;
      const session_id = document.querySelector(".session_id").value;
      const idx = document.querySelector(".idx");
      const memberStatus = document.querySelector(".memberStatus_wrapper");

      if (session_id == leader_id) {
        regBtn.style.display = 'none';
        memberStatus.style.display = "flex";

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
      // 수정 기능
      updBtn.addEventListener("click", function() {
        location = 'class_getUpdate.php?class_idx=' + idx.value;
      })

      // 수락 누를 시 
      let accept = document.querySelectorAll(".accept");
      let register_member_name = document.querySelectorAll(".register_member_name");
      let refuse = document.querySelectorAll(".refuse");
      let register_idx = document.querySelectorAll(".register_idx");


      for (let i = 0; i < accept.length; i++) {
        accept[i].addEventListener("click", function() {
          let accept_confirm = confirm(`${register_member_name[i].innerText} 님을 모임에 참여하시겠습니까?`);
          if (accept_confirm) {
            location = 'join_class_insert.php?class_idx=' + idx.value + '&leader_id=' + leader_id +
              '&join_id=' + register_member_name[i].innerText;
          }
        })
      }
      // 거절 누를 시
      for (let i = 0; i < accept.length; i++) {
        refuse[i].addEventListener("click", function() {
          let accept_confirm = confirm(`${register_member_name[i].innerText} 님의 모임 신청을 거절하시겠습니까?`);

          if (accept_confirm) {
            location = 'registerDeletePro.php?register_idx=' + register_idx[i].value;
          }
        })
      }

    })
    </script>
  </body>

</html>