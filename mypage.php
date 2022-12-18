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
        <?php
          $read_count_query = "select read_count from message where receive_id='$id'";
          $read_count_result = mysqli_query($connection, $read_count_query);
          $read_count = mysqli_fetch_array($read_count_result);
          $read_count_count = mysqli_num_rows($read_count_result);
          $cnt =0;
          for($i=0; $i < $read_count_count; $i++) {
            if($read_count[0] == 0) {
              $cnt++;
            }
            $read_count = mysqli_fetch_array($read_count_result);
          }
          if($cnt > 0){
            echo "<div class='image'>
                      <img src='image/newMessage.png' class='message' width='64'>
                    </div>";
          }
          else{
            echo "<div class='image'>
            <img src='image/message.png' class='message' width='64'>
          </div>";
          }
        ?>
        <div class="goBack">
          <a onclick="history.go(-1)">돌아가기</a>
        </div>
      </header>
      <!-- 회원 탈퇴해야 돼 -->
      <section class="userInfo">
        <div class="withdrawBox">
            <input type="hidden" value="<?=$id?>" class="session_id">
            <button class="member_discard">회원탈퇴</button>
        </div>
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
              "select * from class where";
              $join_query = "select * from join_class where join_id = '$id'";
              $join_result = mysqli_query($connection, $join_query);

              while($joinClass = mysqli_fetch_array($join_result)){

                $myclass_query = "select class_title, main_category, sub_category,write_date from class where class_idx = $joinClass[class_idx]";
                
                $myclass_result = mysqli_query($connection, $myclass_query);
                
                while($myClass = mysqli_fetch_array($myclass_result)){
                  
                   echo "
                   <li class='classList_item'>
                     <div class='item_data list_index'>$joinClass[class_idx]</div>
                     <div class='item_data list_title'>$myClass[class_title]</div>
                     <div class='item_data list_field'>$myClass[main_category] / $myClass[main_category]</div>
                     <div class='item_data list_date'>$myClass[write_date]</div>
                   </li>
                  ";
                }
              }

               ?>
            </ul>
          </article>
        </div>

        <!--  -->
      </section>
    </div>
    <script>
    
      document.addEventListener("DOMContentLoaded", function() {
        const member_discard = document.querySelector(".member_discard");
        const session_id = document.querySelector(".session_id");
        member_discard.addEventListener("click", function() {
          const confirm_delete = confirm('정말 탈퇴하시겠습니까??\n복구할 수 없습니다.');
          if(confirm_delete){
            location = 'member_delete.php?id=' + session_id.value;
            return;
          }
        })
        const message = document.querySelector(".message");
        message.addEventListener("click",function() {
          window.open(
            "message_box.php?receive_id=" + session_id.value,
            "child",
            "width=600, height=600, top=200, left=320"
          );
        })

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
      })
      

    

    //
    </script>
  </body>

</html>