<?php
$connection = mysqli_connect('52.78.0.158', 'remoteJO', 'remoteJO', 'happyTogether', 56946);

//url로 전달된 main카테고리 내용을 받아온다.
$main_category_name = $_GET['main_category_name'];

//현재 메인카테고리에 해당되는 서브 카테고리 가져오기
$query_sub = "select sub_category_name from sub_category where main_category = '$main_category_name'";

//현재 메인카테고리에 해당되는 서브 카테고리 개수 받아오기.
$count_query_sub = "select count(*) from sub_category where main_category = '$main_category_name'";

//현재의 메인 카테고리를 받아오기
$query_main = "select main_category_name from main_category";

//메인 카테고리의 개수를 가져온다.
$count_query_main = "select count(*) from main_category";

function query_select($query)
{
  global $connection;

  $result = mysqli_query($connection, $query);

  $data  = mysqli_fetch_all($result);

  return $data;
}


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

$query_class = "select class_idx, class_title, class_place,
      class_leader_id, total_member, write_date, sub_category from class where sub_category = '$sub_category'";

$class_count_query = "select count(*) from class where sub_category = '$sub_category'";
$result_class_count = mysqli_query($connection, $class_count_query);
$class_count = mysqli_fetch_array($result_class_count);

$result_class = mysqli_query($connection, $query_class);
$class = mysqli_fetch_array($result_class);
?>
<!DOCTYPE html>
<html lang="ko">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php
  echo "
    <title>모임 페이지-🌟{$main_category_name}🌟</title>
    " ?>
    <link rel="stylesheet" href="test.css" />
    <script>
    document.addEventListener("DOMContentLoaded", () => {
        // 모임 글(리스트) 배열 형태!
        let subItem = document.querySelectorAll(".subItem");
        // sub_category_name 초기 값 DB의 첫 번째 값으로 초기화한 변수
        let sub_category_name = document.querySelector(".sub_category_name").value;
        // GET으로 가져온 sub_category_name 변수
        let sub_category = document.querySelector(".sub_category").value;
        // main_category_name GET으로 가져온 것
        let main_category_name = document.querySelector(".main_category_name").value;

        // 초기값 설정하기!
        if(sub_category == sub_category_name){
            subItem[0].style.backgroundColor = "#b4c3ac";
            subItem[0].style.transform = "scale(1.2)";
            // current.innerHTML = sub_cate[0].innerText;
        }else {
            for(let i=0; i < subItem.length; i++){
                if(sub_category == subItem[i].innerText){
                    subItem[i].style.transform = "scale(1.2)";
                    subItem[i].style.backgroundColor = "#b4c3ac"; 
                }
            }
        //     // current.innerHTML = sub_category;
        }

        for (let i=0; i < subItem.length; i++) {
            subItem[i].addEventListener("click", function(){
                location = 'mainClassList.php?main_category_name='+main_category_name+'&sub_category_name='+subItem[i].innerText;
                })
            }
        
    })
    </script>
  </head>

  <body>
    <input type="hidden" class="main_category_name" value="<?=$main_category_name ?>">
    <input type="hidden" class="sub_category" value="<?=$sub_category ?>">
    <input type="hidden" class="sub_category_name" value="<?=$sub_category_db[0]?>">
    <div class="container">
      <header>
        <div class="logo">
          <a href="./index.php">
            <img src="./image/logo.png" alt="HATO" />
          </a>
        </div>
        <div class="mainCategoryBox">
          <ul>
            <?php
          //main_category를 여기에 표현
          for ($i = 0; $i < $main_count[0]; $i++) {
            echo "
            <li class='mainItem $main_category_db[0] main$i'>{$main_category_db['main_category_name']}</li>
            ";
            $main_category_db = mysqli_fetch_array($result_main);
          }
          ?>
          </ul>
        </div>
        <div class="myPage">
          <a href="#">마이페이지</a>
        </div>
      </header>
      <section>
        <div class="subCategoryBox">
          <!-- sub_category 노출 -->
          <ul>
            <?php
          for ($i = 0; $i < $sub_count[0]; $i++) {
            echo "
              <li class='subItem'>$sub_category_db[0]</li>
             ";
            $sub_category_db = mysqli_fetch_array($result_sub);
          }
          ?>
          </ul>
        </div>
        <main>
          <ul class="classList">
            <?php
          for ($i = 0; $i < $class_count[0]; $i++) {
            echo "
              <li class='classItem'>
                <h3 class='title'>$class[1]</h3>
                <div class='category'>$sub_category / $main_category_name</div>
                <span class='nickname'>$class[3]</span>
                <span class='peopleNum'>$class[4]</span>
              </li>
            ";
          }

          ?>
            <!-- <li class="classItem" id="1">
              <h3 class="title">제목</h3>
              <div class="category">축구/풋살</div>
              <span class="nickname">닉네임</span>
              <span class="peopleNum">1/100</span>
            </li> -->
          </ul>
          <div class="makerBtn">
            <a href="./maker.html">
              <button>
                <img src="./image/plus.png" alt="">
                <span>모임 만들기</span>
              </button>
            </a>
          </div>
        </main>
      </section>

      <footer>
        <div class="copyright">copyright 천지창조</div>
      </footer>
    </div>
    <?php
  echo "
        <script>
          const MainCategory = document.querySelector('.{$main_category_name}');
        </script>
      "
  ?>
   
  </body>

</html>