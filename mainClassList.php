<script>
addEventListener("DOMContentLoaded", function() {

  // li 배열로 만든 거임 querySelectorAll!
  let sub_cate = document.querySelectorAll(".sub_cate");
  let sub_category_name = document.querySelector(".sub_category_name").value;
  let current = document.querySelector(".current");
  let main_category_name = document.querySelector(".main_category_name").innerText;
  let sub_category = document.querySelector(".sub_category").value;

  // 초기값 설정하기!
  if (sub_category == sub_category_name) {
    sub_cate[0].style.color = "blue";
    sub_cate[0].style.fontWeight = "bold";
    sub_cate[0].style.backgroundColor = "#a8adb4";
    current.innerHTML = sub_cate[0].innerText;
  } else {
    for (let i = 0; i < sub_cate.length; i++) {
      if (sub_category == sub_cate[i].innerText) {
        sub_cate[i].style.color = "blue";
        sub_cate[i].style.fontWeight = "bold";
        sub_cate[i].style.backgroundColor = "#a8adb4";
      }
    }
    current.innerHTML = sub_category;
  }


  // 배열로 클릭한 걸 알기 위해 for문을 이용 + 
  // 기존 선택된 거 있을 시 현재 클릭한 걸로 효과 넣기!!
  for (let i = 0; i < sub_cate.length; i++) {
    sub_cate[i].addEventListener("click", function() {
      // for(let j=0; j < sub_cate.length; j++) {
      //     if(sub_cate[j].style.color == "blue"){
      //         sub_cate[j].style.color = "black";
      //         sub_cate[j].style.fontWeight = "normal";
      //         sub_cate[j].style.backgroundColor = "#d2d6d9";
      //     }
      // }       
      // sub_cate[i].style.color = "blue";ㅖ
      // sub_cate[i].style.fontWeight="bold";
      // sub_cate[i].style.backgroundColor = "#a8adb4"; 
      // if(sub_cate[i].style.color == "blue"){
      //     current.innerHTML = sub_category_name;
      // }
      location = 'board.php?main_category_name=' + main_category_name + '&sub_category_name=' +
        sub_cate[i]
        .innerText;

      for (let j = 0; j < sub_cate.length; j++) {
        if (sub_cate[j].style.color == "blue") {
          sub_cate[j].style.color = "black";
          sub_cate[j].style.fontWeight = "normal";
          sub_cate[j].style.backgroundColor = "#d2d6d9";

        }
      }
      sub_cate[i].style.color = "blue";
      sub_cate[i].style.fontWeight = "bold";
      sub_cate[i].style.backgroundColor = "#a8adb4";
      if (sub_cate[i].style.color == "blue") {
        current.innerHTML = sub_cate[i].innerText;
      }


    })
  }
});
</script>
<?php
// $connection = mysqli_connect('localhost','happy','together','happytogether');
$connection = mysqli_connect('52.78.0.158:56946', 'remoteJO', 'remoteJO', 'happyTogether');

$main_category_name = $_GET['main_category_name'];

//현재 메인카테고리에 해당되는 서브 카테고리 가져오기
$query_sub = "select sub_category_name from sub_category where main_category = '$main_category_name'";

//현재 메인카테고리에 해당되는 서브 카테고리 개수 받아오기.
$count_query_sub = "select count(*) from sub_category where main_category = '$main_category_name'";

//현재의 메인 카테고리를 받아오기
$query_main = "select main_category_name from main_category";

$count_query_main = "select count(*) from main_category";


//쿼리문 대한 결과 mysqli_result 반환
$result_sub = mysqli_query($connection, $query_sub);
$count_result = mysqli_query($connection, $count_query_sub);
$result_main = mysqli_query($connection, $query_main);
$result_count_main = mysqli_query($connection, $count_query_main);

//값 가져오기
$sub_category_db = mysqli_fetch_array($result_sub);
$sub_count = mysqli_fetch_array($count_result);
$main_category_db = mysqli_fetch_array($result_main);
$main_count = mysqli_fetch_array($result_count_main);

//URL을 통해 전달된 파라미터 값을 가져온다.
$sub_category = $_GET['sub_category_name'];

if (!$sub_category) {
  $sub_category = $sub_category_db[0];
}

$query_class = "select class_idx, class_title, class_place, class_date,
      class_user_id, total_member, write_date, sub_category from class where sub_category = '$sub_category'";

$result_class = mysqli_query($connection, $query_class);
$classInfo = mysqli_fetch_array($result_class);

// echo "
//    <script>
//      console.log('{$main_category_db['main_cate_idx']}');
//    </script>
//   ";

// foreach ($main_category_db as $main) {
//   echo "$main[0]";
//   // echo "
//   //   <script>
//   //     console.log('{$main['main_cate_idx']}');
//   //   </script>
//   //  ";
// }

?>
<!DOCTYPE html>
<html lang="ko">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php
  echo "
    <title>모임 페이지-$main_category_name</title>
    " ?>
    <link rel="stylesheet" href="test.css" />
  </head>

  <body>
    <div class="container">
      <header>
        <div class="logo">
          <a href="./index.php">
            <img src="./image/logo.png" alt="HATO" />
          </a>
        </div>
        <div class="mainCategoryBox">
          <ul>
            <?php //main_category를 여기에 표현
          // echo count($main_category_db);
          // foreach ($main_category_db as $main) {
          //   echo "$main";
          //   // echo "
          //   // <li class='mainItem'>$main</li>";
          //   $main_category_db = mysqli_fetch_array($result_main);
          // }
          // echo count($main_count);
          for ($i = 0; $i < $main_count[0]; $i++) {

            // echo "모야 ";
            echo "
            <li class='mainItem main'>$main_category_db[0]</li>
            ";
            $main_category_db = mysqli_fetch_array($result_main);
          }

          ?>
            <!-- <li class="mainItem">운동</li>
            <li class="mainItem">게임</li>
            <li class="mainItem">스터디</li>
            <li class="mainItem">자유게시판</li> -->
          </ul>
        </div>
        <div class="myPage">
          <a href="#">마이페이지</a>
        </div>
      </header>
      <section>
        <div class="subCategoryBox">
          <!-- php for loop를 통해 가져온 데이터를 보여줘야할 듯-->
          <ul>
            <?php

          // echo "$sub_category";
          // foreach ($sub_category_db as $sub) {
          //   echo "
          //     <li class='subItem'>$sub</li>
          //   ";
          // }
          for ($i = 0; $i < $sub_count[0]; $i++) {
            echo "
              <li class='subItem'>$sub_category_db[0]</li>
             ";
            $sub_category_db = mysqli_fetch_array($result_sub);
          }
          ?>
            <!-- <li class="subItem">농구</li>
            <li class="subItem">배드민턴</li> -->
          </ul>
        </div>
        <main>
          <ul class="classList">
            <?php
          // foreach ($classInfo as $class) {
          //   echo "
          //       <li class='classItem' id='{$class['class_idx']}'>
          //         <h3 class='title'>{$class['class_title']}</h3>
          //         <div class='category'>{$class['sub_category']}</div>
          //         <span class='nickname'>{$class['class_user_id']}</span>
          //         <span class='peopleNum'>{$class['total_member']}</span>
          //     </li>
          //       ";
          // }
          ?>
            <li class="classItem" id="1">
              <h3 class="title">제목</h3>
              <div class="category">축구/풋살</div>
              <span class="nickname">닉네임</span>
              <span class="peopleNum">1/100</span>
            </li>
          </ul>
        </main>
      </section>

      <footer>
        <div class="copyright">copyright 천지창조</div>
      </footer>
    </div>
    <script>
    // const focusMainCategory = document.querySelector('')
    //페이지가 로드될 때 url로 전달된 카테고리 받아오기
    window.addEventListener("DOMContentLoaded", () => {
      console.log("로드됨")
    })
    </script>
  </body>

</html>