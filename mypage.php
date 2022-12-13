<?php session_start();?>
<?php include("./connect.php")?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>마이페이지</title>
    <link rel="stylesheet" href="./myInfo.css" />
  </head>
  <?php 
        // 마이 페이지에서 자기 정보 보기
        if(!isset($_SESSION['id'])){
            echo "<script>alert('로그인을 하시오.'); location ='login.html';</script>";
            return;
        }
        $id = $_SESSION['id'];
    ?>

  <body>
    <div class="container">
      <!--  -->
      <header>
        <div class="logo">
          <a href="./index.php">
            <img src="./image/logo.png" alt="HATO" />
          </a>
        </div>
        <h1 class="title">마이페이지</h1>
        <div class="goBack">
          <a onclick="history.go(-1)">돌아가기</a>
        </div>
      </header>
      <!--  -->
      <section class="userInfo">
        <?php
          $myInfo_query = "select name, gender, phone, nickname, birth, email  from member where id ='$id'";
          $myInfo_result = mysqli_query($connection, $myInfo_query);
          $myInfo = mysqli_fetch_array($myInfo_result);
          
          $name = $myInfo[0];
          $gendor = $myInfo[1];
          $phone = $myInfo[2];
          $nickname = $myInfo[3];
          $birth = $myInfo[4];
          $email = $myInfo[5];
        ?>
        <ul class="userInfo_Wrapper">
          <li class="info_box nameBox">
            <div class="info_name">이름(아이디)</div>
            <div class="info_data"><?=$name?> / ( <?=$id?> )</div>
          </li>
          <li class="info_box nicknameBox">
            <div class="info_name">닉네임</div>
            <div class="info_data"><?=$nickname?></div>
          </li>
          <li class="info_box gendorBox">
            <div class="info_name">성별</div>
            <div class="info_data"><?=$gendor?></div>
          </li>
          <li class="info_box birthBox">
            <div class="info_name">생년월일</div>
            <div class="info_data"><?=$birth?></div>
          </li>
          <li class="info_box phoneBox">
            <div class="info_name">연락처</div>
            <div class="info_data"><?=$phone?></div>
          </li>
          <li class="info_box emailBox">
            <div class="info_name">이메일</div>
            <div class="info_data"><?=$email?></div>
          </li>
        </ul>
      </section>
      <!--  -->
      <section class="myclassList_wrapper">
        <div class="myClassList">
          <article class="myMadeList">
            <h2>내가 만든 모임</h2>
            <ul class="list_header">
              <li class="item_title list_index">No.</li>
              <li class="item_title list_title">Title</li>
              <li class="item_title list_field">분야</li>
              <li class="item_title list_date">일자</li>
            </ul>
            <!--  -->
            <ul class="list_wrapper">
              <?php 
                // 주최하는 모임 출력!
                $lead_query = "select * from class where class_leader_id = '$id'";
                $lead_result = mysqli_query($connection, $lead_query);
                $lead_count = mysqli_num_rows($lead_result); 
                
                for($i=0; $i < $lead_count; $i++) {
                  $leadClass = mysqli_fetch_array($lead_result);
                  
                  $index = $leadClass[0];
                  $title = $leadClass[1];
                  $main = $leadClass[6];
                  $sub = $leadClass[7];
                  $date = $leadClass[8];
                  
                  echo "
                  <li class='classList_item'>
                    <div class='item_data list_index'>$index</div>
                    <div class='item_data list_title'>$title</div>
                    <div class='item_data list_field'>$main/$sub</div>
                    <div class='item_data list_date'>$date</div>
                  </li>
                  ";
                  
                } ?>
            </ul>
          </article>
          <!--  -->
          <article class="joinList">
            <h2>참여 중인 모임</h2>

            <ul class="list_header">
              <li class="item_title list_index">No.</li>
              <li class="item_title list_title">Title</li>
              <li class="item_title list_field">분야</li>
              <li class="item_title list_date">일자</li>
            </ul>
            <!--  -->
            <ul class="list_wrapper">
              <?php
              // "select * from class where";
              // $register_query = "select class_idx from register_class where register_id = '$id'";
              // $register_result = mysqli_query($connection, $register_query);
              // $register_count = mysqli_num_rows($register_result);
              // // $registerClass = mysqli_fetch_array($register_result);

              //   for($i=0; $i < $register_count; $i++) {
              //     $registerClass = mysqli_fetch_array($lead_result);
                 
              //     $index = $registerClass[0];
              //     echo "
              //      <li class='classList_item'>
              //        <div class='item_data list_index'>$index</div>
              //        <div class='item_data list_title'>축구 할 사람!</div>
              //        <div class='item_data list_field'>운동/축구</div>
              //        <div class='item_data list_date'>일자</div>
              //      </li>
              //     ";
                 
              //  } 
               ?>
              <li class="classList_item">
                <div class="item_data list_index">1</div>
                <div class="item_data list_title">축구 할 사람!</div>
                <div class="item_data list_field">운동/축구</div>
                <div class="item_data list_date">일자</div>
              </li>
              <!--  -->

              <!--  -->
            </ul>
          </article>
        </div>

        <!--  -->
      </section>
    </div>
    <script>
    document.querySelectorAll('.list_wrapper').forEach((list) => {
      const list_item = list.querySelectorAll('li');
      list_item.forEach((item, key) => {

        // 내가 만든, 참여중인 list에서 게시글이 번갈아가며 색이 구분될 수 있도록 
        if (key % 2 == 1) {
          item.classList.add('color');
        }

        // 클릭했을 때, 해당 리스트에 해당되는 게시글로 이동
        item.addEventListener('click', () => {
          const item_index = item.querySelector('.list_index').innerHTML;
          location = `classContent.php?class_idx=${parseInt(item_index)}`;
        })

      });
    });

    //
    </script>
  </body>

</html>