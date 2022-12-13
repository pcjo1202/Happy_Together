<?php include("./connect.php")?>

<?php

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
// 검색하기 get으로 가져온다.
$search_select = $_GET['search_select'];
// $search_text = $_GET['search_text'];

// 
if($_GET['search_text']){
  $search_text = $_GET['search_text'];
}else{
  $search_text = null;
}



// 검색하였을 경우와 하지 않았을 경우를 나누어야 한다.
if(!$search_text){
  $class_total = "select count(*) from class where sub_category = '$sub_category'";
  // 모임 개수 구하기 페이징 처리에 필요한 모임 총 개수
  
}

if($search_text) {
  if(!strcmp($search_select, "제목")){
    $class_total = "select count(*) from class where sub_category = '$sub_category' and class_title like '%$search_text%'";

  } else if(!strcmp($search_select, "내용")){
    $class_total = "select count(*) from class where sub_category = '$sub_category' and class_contents like '%$search_text%'";

  } else if(!strcmp($search_select, "작성자")){
    $class_total = "select count(*) from class where sub_category = '$sub_category' and class_leader_id like '%$search_text%'";
    }
  
}
// 총 모임 개수 $class_total
$class_total_result = mysqli_query($connection, $class_total);
$class_total = mysqli_fetch_array($class_total_result);
// 페이징 처리
/* paging : 한 페이지 당 데이터 개수 */
$list_num = 6;

/* paging : 한 블럭 당 페이지 수 */
$page_num = 5;

/* paging : 현재 페이지 */
$page = isset($_GET["page"])? $_GET["page"] : 1;

/* paging : 전체 페이지 수 = 전체 데이터 / 페이지당 데이터 개수, ceil : 올림값, floor : 내림값, round : 반올림 */
$total_page = ceil($class_total[0] / $list_num);
// echo "전체 페이지 수 : .$total_page ,,, $class_total";

/* paging : 전체 블럭 수 = 전체 페이지 수 / 블럭 당 페이지 수 */
$total_block = ceil($total_page / $page_num);
/* paging : 현재 블럭 번호 = 현재 페이지 번호 / 블럭 당 페이지 수 */
$now_block = ceil($page / $page_num);

/* paging : 블럭 당 시작 페이지 번호 = (해당 글의 블럭번호 - 1) * 블럭당 페이지 수 + 1 */
$s_pageNum = ($now_block - 1) * $page_num + 1;
// 데이터가 0개인 경우
if($s_pageNum <= 0){
    $s_pageNum = 1;
};

/* paging : 블럭 당 마지막 페이지 번호 = 현재 블럭 번호 * 블럭 당 페이지 수 */
$e_pageNum = $now_block * $page_num;
// 마지막 번호가 전체 페이지 수를 넘지 않도록
if($e_pageNum > $total_page){
    $e_pageNum = $total_page;
};

/* paging : 시작 번호 = (현재 페이지 번호 - 1) * 페이지 당 보여질 데이터 수 */
$start = ($page - 1) * $list_num;
/* paging : 글번호 */
$cnt = $start + 1;



// 검색하였을 경우와 하지 않았을 경우를 나누어야 한다.
if(!$search_text){
  /* paging : 쿼리 작성 - limit 몇번부터, 몇개 */
  $query_class = "select class_idx, class_title, class_place, class_leader_id, total_member, write_date, 
  sub_category from class where sub_category='$sub_category' order by class_idx desc limit $start, $list_num";

}
else {
  if(!strcmp($search_select, "제목")){
    $query_class = "select class_idx, class_title, class_place, class_leader_id, total_member, write_date, 
    sub_category from class where sub_category='$sub_category' and class_title like '%$search_text%' order by class_idx desc limit $start, $list_num";

  } else if(!strcmp($search_select, "내용")){
    $query_class = "select class_idx, class_title, class_place, class_leader_id, total_member, write_date, 
    sub_category from class where sub_category='$sub_category' and class_contents like '%$search_text%' order by class_idx desc limit $start, $list_num";

  } else if(!strcmp($search_select, "작성자")){
    $query_class = "select class_idx, class_title, class_place, class_leader_id, total_member, write_date, 
    sub_category from class where sub_category='$sub_category' and class_leader_id like '%$search_text%' order by class_idx desc limit $start, $list_num";
  }
  
}

/* paging : 쿼리 전송 */
$result_class = mysqli_query($connection, $query_class);
$class = mysqli_fetch_array($result_class);
$class_count = mysqli_num_rows($result_class);

// echo "$e_pageNum  ,,,,  ,$s_pageNum";
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
    <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-size: 21px;
    }

    body {
      background-color: #dadde2;
      height: 100vh;

      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    ul {
      list-style: none;
    }

    a {
      text-decoration: none;
    }

    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 1100px;
      height: 100vh;
      padding: 0.5rem 0;
    }

    header {
      padding: 1rem 0.7rem;
      width: 100%;
      height: 130px;
      border-bottom: 2px solid #000;

      display: flex;
      gap: 1rem;
      justify-content: space-around;
      align-items: center;
    }

    .logo a img {
      width: 150px;
    }

    .mainCategoryBox {
      flex: 1;
    }

    /*
  배경 #DADDE2
  버튼 #B1BDC5
   */

    .mainCategoryBox>ul {
      display: flex;
      justify-content: space-around;
      align-items: center;
    }

    .mainCategoryBox>ul .mainItem {
      background-color: #B1BDC5;
      border: 1px solid #00000015;
      padding: 0.5rem 1rem;
      border-radius: 6px;
      transition: transform 0.5s ease;
      cursor: pointer;
    }

    .mainCategoryBox>ul .mainItem:hover {
      background-color: #889fa5;
      transform: scale(1.2);
    }

    section {
      width: 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
      flex: 1;
    }

    .subCategoryBox {
      width: 100%;
      padding: 1rem 0;
    }

    .subCategoryBox ul {
      width: 100%;
      display: flex;
      justify-content: flex-start;
      align-items: center;
      padding-left: 3rem;
      gap: 3rem;
    }

    .subCategoryBox ul>.subItem {
      background-color: #B1BDC5;
      padding: 0.5rem 1rem;
      border-radius: 8px;
      transition: all 200ms ease-out;
      cursor: pointer;
    }

    .subCategoryBox ul>.subItem:hover,
    :focus {
      background-color: #889fa5;
      transform: scale(1.2);
    }

    main {
      padding: 1rem;
      width: 100%;
      height: 100%;
      display: flex;
      align-items: flex-start;
      justify-content: center;
      position: relative;
    }

    main .classList {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      align-items: center;
      gap: 1rem;
      width: 80%;
      height: 450px;
      overflow: auto;
    }

    main .classList .classItem {
      background-color: #B1BDC5;
      border-radius: 10px;
      padding: 1rem 1.5rem;

      display: grid;
      grid-template-columns: 2fr 1fr;
      grid-template-rows: 1fr 1fr;
      column-gap: 1rem;
      row-gap: 2rem;
      cursor: pointer;
      transition: all 0.2s ease-in;
    }

    main .classList .classItem .title {
      text-overflow: ellipsis;
      overflow: hidden;
      white-space: nowrap;
    }

    main .classList .classItem:hover {
      background-color: #c9c9c9;
      cursor: pointer;
    }

    .makerBtn {
      position: fixed;
      right: 5%;
      bottom: 5%;
      transition: all 200ms ease-in;
    }

    .makerBtn button {
      display: flex;
      justify-content: space-around;
      align-items: center;
      padding: 1rem;
      gap: 0.6rem;
      color: #c9c9c9;
      border: none;
      border-radius: 10px;
      background-color: #43655A;
      cursor: pointer;
      transition: all 200ms ease-in;
    }

    .makerBtn button img {
      width: 30px;
    }

    .makerBtn button:hover {
      background-color: #889fa5;
    }

    .makerBtn button:active {
      transform: scale(0.9);
    }

    footer {
      width: 100%;
      border-top: 1px solid gray;
      text-align: center;
    }

    .pager {
      display: block;
    }

    footer .copyright {
      padding: 0.5rem 0;
    }
    </style>
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
      if (sub_category == sub_category_name) {
        subItem[0].style.backgroundColor = "#b4c3ac";
        subItem[0].style.transform = "scale(1.2)";
        // current.innerHTML = sub_cate[0].innerText;
      } else {
        for (let i = 0; i < subItem.length; i++) {
          if (sub_category == subItem[i].innerText) {
            // subItem[i].classList.add('mainFocus');
            subItem[i].style.transform = "scale(1.2)";
            subItem[i].style.backgroundColor = "#b4c3ac";
          }
        }
        //     // current.innerHTML = sub_category;
      }

      for (let i = 0; i < subItem.length; i++) {
        subItem[i].addEventListener("click", function() {
          location = 'mainClassList.php?main_category_name=' + main_category_name + '&sub_category_name=' +
            subItem[i].innerText;
        })
      }

      // 게시글 클릭 시
      let classItem = document.querySelectorAll(".classItem");
      let idx = document.querySelectorAll(".idx");

      for (let i = 0; i < classItem.length; i++) {
        classItem[i].addEventListener("click", function() {
          location = 'classContent.php?class_idx=' + idx[i].value;
        })
      }

      // main_category 클릭했을 때
      let mainItem = document.querySelectorAll(".mainItem");
      // console.log(main_category_name, mainItem)


      mainItem.forEach(item => {

        if (main_category_name == item.innerText) {
          item.style.transform = "scale(1.2)";
          item.style.backgroundColor = "#b4c3ac";
        }
        item.addEventListener("click", function() {
          location = 'mainClassList.php?main_category_name=' + item.innerText;

        })
      })

      // 검색어를 입력하지 않고 버튼을 클릭 시
      let search_text = document.querySelector(".search_text");
      let search_btn = document.querySelector(".search_btn");
      let form = document.search_form;
      search_btn.addEventListener("click", function() {
        if (search_text.value.length == 0) {
          alert("검색어를 입력해 주세요");
          return;
        }
        form.submit();
      })
    })
    </script>
  </head>

  <body>
    <!-- sub_category 초기값 설정한 것 -->
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
          <a href="mypage.php">마이페이지</a>
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
            $cnt ++;
          }
          ?>
          </ul>

        </div>
        <!-- 검색 기능 -->
        <div class="search">
          <form action="mainClassList.php" method="get" name="search_form">
            <!-- main_category_name get으로 가져온 것 -->
            <input type="hidden" class="main_category_name" name="main_category_name" value="<?=$main_category_name ?>">
            <!-- sub_category get으로 가져온 것 -->
            <input type="hidden" class="sub_category" name="sub_category_name" value="<?=$sub_category ?>">
            <select name="search_select" class="search_select">
              <option value="제목">제목</option>
              <option value="내용">내용</option>
              <option value="작성자">작성자</option>
            </select>
            <input type="text" name="search_text" class="search_text" placeholder="검색어 입력">
            <input type="button" class="search_btn" value="검색">
          </form>
        </div>

        <main>
          <ul class="classList">
            <?php
            if($class_total[0] == 0){
              echo "<h3>모임이 존재하지 않습니다.</h3>";
            }else {
              for ($i = 0; $i < $class_count; $i++) {
                echo "
                  <li class='classItem'>
                    <input type='hidden' class='idx' value='$class[0]'>
                    <h3 class='title'>$class[1]</h3>
                    <div class='category'>$sub_category / $main_category_name</div>
                    <span class='nickname'>$class[3]</span>
                    <span class='peopleNum'>$class[4]</span>
                  </li>
                ";
                $class = mysqli_fetch_array($result_class);
              }
            }
          
          ?>
          </ul>
          <!-- 모임 만들기 버튼 -->
          </p>
          <div class="makerBtn">
            <a href="maker.php?main_category_name=<?=$main_category_name?>&sub_category_name=<?=$sub_category?>">
              <button>
                <img src="./image/plus.png" alt="">
                <span>모임 만들기</span>
              </button>
            </a>
          </div>
        </main>
        <!-- 페이징 처리 -->
        <p class="pager">
          <?php
            /* paging : 이전 페이지 */
            if($page <= 1){
              if(!$search_text){
                echo "<a href='mainClassList.php?main_category_name=$main_category_name&sub_category_name=$sub_category&page=1'>◁</a>";
              }else{
                echo "<a href='mainClassList.php?main_category_name=$main_category_name&sub_category_name=$sub_category&search_select=$search_select&search_text=$search_text&page=1'>◁</a>";
              }
            ?>
          <?php } else{ 
              if(!$search_text){?>
          <a
            href="mainClassList.php?main_category_name=<?=$main_category_name?>&sub_category_name=<?=$sub_category?>&page=<?=$page-1?>">◁</a>
          <?php }else{ ?>
          <a
            href="mainClassList.php?main_category_name=<?=$main_category_name?>&sub_category_name='<?=$sub_category?>'&search_select='<?=$search_select?>'&search_text='<?=$search_text?>'&page='<?=$page-1?>'">◁</a>
          <?php } ?>

          <?php };?>

          <?php
            /* pager : 페이지 번호 출력 */
            for($print_page = $s_pageNum; $print_page <=$e_pageNum; $print_page++){
              if(!$search_text){
                echo "<a href='mainClassList.php?main_category_name=$main_category_name&sub_category_name=$sub_category&page=$print_page'>$print_page</a>";
              }else {
                echo "<a href='mainClassList.php?main_category_name=$main_category_name&sub_category_name=$sub_category&search_select=$search_select&search_text=$search_text&page=$print_page'>$print_page</a>";
              }
            ?>

          <?php };?>

          <?php
            /* paging : 다음 페이지 */
            if($page >= $total_page){
              if(!$search_text) {
                echo "<a href='mainClassList.php?main_category_name=$main_category_name&sub_category_name=$sub_category&page=$total_page'>▷</a>";
              }else {
                echo "<a href='mainClassList.php?main_category_name=$main_category_name&sub_category_name=$sub_category&search_select=$search_select&search_text=$search_text&page=$total_page'>▷</a>";
              }
            ?>
          <?php } else{ 
              if(!$search_text) {?>
          <a
            href='mainClassList.php?main_category_name=<?=$main_category_name?>&sub_category_name=<?=$sub_category?>&page=<?=($page+1)?>'>▷</a>
          <?php } else {?>
          <a
            href='mainClassList.php?main_category_name=<?=$main_category_name?>&sub_category_name=<?=$sub_category?>&search_select=<?=$search_select?>&search_text=<?=$search_text?>&page=<?=($page+1)?>'>▷</a>
          <?php }
              ?>
          <?php };?>
      </section>

      <footer>
        <div class="copyright">copyright 천지창조</div>
      </footer>
    </div>
  </body>

</html>