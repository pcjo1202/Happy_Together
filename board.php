<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .container {
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      gap: 1rem;
      margin-top: 50px;
    }

    div .top {
      display: inline;
    }

    .home {
      text-decoration: none;
      font-size: 1.5rem;
      color: blue;
      font-weight: bold;
    }

    ul {
      list-style-type: none;
      display: flex;
      gap: 2rem;
    }

    div .sub_cate {
      border: 1px solid black;
      padding: 10px 20px;
      font-size: 1.5rem;
      cursor: pointer;
      background-color: #d2d6d9;
    }

    .current {
      color: blue;
      font-weight: bold;
    }
    </style>
    <script>
    document.addEventListener("DOMContentLoaded", function() {

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
          // sub_cate[i].style.color = "blue";
          // sub_cate[i].style.fontWeight="bold";
          // sub_cate[i].style.backgroundColor = "#a8adb4"; 
          // if(sub_cate[i].style.color == "blue"){
          //     current.innerHTML = sub_category_name;
          // }
          location = 'board.php?main_category_name=' + main_category_name + '&sub_category_name=' + sub_cate[i]
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

<<<<<<< HEAD
  </head>

  <body>
    <?php
  $connection = mysqli_connect('52.78.0.158', 'remoteJO', 'remoteJO', 'happyTogether', 56946);
  $main_category_name = $_GET['main_category_name'];
=======
</head>
<body>
    <?php 
        $connection = mysqli_connect('52.78.0.158','remoteJO','remoteJO','happyTogether',56946);
        $main_category_name = $_GET['main_category_name'];
        
       
        $query = "select sub_category_name from sub_category where main_category = '$main_category_name'";
        $count_query = "select count(*) from sub_category where main_category = '$main_category_name'";
        
>>>>>>> 6e7e4ba (모임 상세보기 수정, 삭제, 신청 완료)


<<<<<<< HEAD
  $query = "select sub_category_name from sub_category where main_category = '$main_category_name'";
  $count_query = "select count(*) from sub_category where main_category = '$main_category_name'";


  $result = mysqli_query($connection, $query);
  $count_result = mysqli_query($connection, $count_query);

  $sub_category_name = mysqli_fetch_array($result);
  $sub_count = mysqli_fetch_array($count_result);

  $sub_category = $_GET['sub_category_name'];
  if (!$sub_category) {
    $sub_category = $sub_category_name[0];
  }
  $query_class = "select class_idx, class_title, class_place,
        class_leader_id, total_member, write_date from class where sub_category = '$sub_category'";
  $result_class = mysqli_query($connection, $query_class);
  $classPro = mysqli_fetch_array($result_class);
  ?>
=======
        $sub_category = $_GET['sub_category_name'];
        if(!$sub_category){
            $sub_category = $sub_category_name[0];
        }
        $query_class = "select class_idx, class_title, class_place,
        class_leader_id, total_member, write_date from class where sub_category = '$sub_category'";
        $result_class = mysqli_query($connection, $query_class);
        $classPro = mysqli_fetch_array($result_class);
    ?>
>>>>>>> 6e7e4ba (모임 상세보기 수정, 삭제, 신청 완료)
    <div class="container">
      <<<<<<< HEAD <input type="hidden" class="sub_category" value="<?= $sub_category ?>">
        <input type="hidden" class="sub_category_name" value="<?= $sub_category_name[0] ?>">
        <div class="top"><a href="index.php" class="home">HATO</a>
          <h1><span class="main_category_name"><?= $main_category_name ?></span>&ensp; 게시판</h1>
        </div>

        <ul class="board_ul">
          <?php
        for ($i = 0; $i < $sub_count[0]; $i++) {
          echo "<li><div class='sub_cate'> $sub_category_name[0]</div></li>";
          $sub_category_name = mysqli_fetch_array($result);
        }
        ?>
          <<<<<<< HEAD </ul>
            <h3>현재 게시글 : <span class="current"> </span></h3>
            <table>
              <tr>
                <th>번호</th>
                <th>제목</th>
                <th>장소</th>
                <th>주최자</th>
                <th>작성 일자</th>
              </tr>
              <?php
            //   if ($classPro[0] .length == 0) {
            //   echo "<tr><td colspan='6'>게시글이 존재하지 않습니다.</td></tr>";
            // } else {
            ?>

              <tr>
                <td><?= $classPro[0] ?></td>
                <td><a href="classContent.php?class_idx=<?= $classPro[0] ?>"><?= $classPro[1] ?></a></td>
                <td><?= $classPro[2] ?></td>
                <td><?= $classPro[3] ?></td>
                <td><?= $classPro[5] ?></td>
              </tr>
              <?php  ?>

            </table>
            =======
            <<<<<<< HEAD <input type="hidden" class="sub_category" value="<?= $sub_category ?>">
              <input type="hidden" class="sub_category_name" value="<?= $sub_category_name[0] ?>">
              <div class="top"><a href="index.php" class="home">HATO</a>
                <h1><span class="main_category_name"><?= $main_category_name ?></span>&ensp; 게시판</h1>
              </div>

              <ul class="board_ul">
                <?php
              for ($i = 0; $i < $sub_count[0]; $i++) {
                echo "<li><div class='sub_cate'> $sub_category_name[0]</div></li>";
                $sub_category_name = mysqli_fetch_array($result);
              }
              ?>
              </ul>
              <h3>현재 게시글 : <span class="current"> </span></h3>
              <<<<<<< HEAD <table>
                <tr>
                  <th>번호</th>
                  <th>제목</th>
                  <th>장소</th>
                  <th>일정</th>
                  <th>주최자</th>
                  <th>작성 일자</th>
                </tr>
                <tr>
                  <td><?= $classPro[0] ?></td>
                  <td><?= $classPro[1] ?></td>
                  <td><?= $classPro[2] ?></td>
                  <td><?= $classPro[3] ?></td>
                  <td><?= $classPro[4] ?></td>
                  <td><?= $classPro[6] ?></td>
                </tr>
                </table>
                =======
                >>>>>>> 2b712e0 (메인 게시글 DB 연결 및 카테고리 화면 노출 성공)
                =======
                <input type="hidden" class="sub_category" value="<?= $sub_category ?>">
                <input type="hidden" class="sub_category_name" value="<?= $sub_category_name[0] ?>">
                <div class="top"><a href="index.php" class="home">HATO</a>
                  <h1><span class="main_category_name"><?= $main_category_name ?></span>&ensp; 게시판</h1>
                </div>

                <ul class="board_ul">
                  <?php
                for ($i = 0; $i < $sub_count[0]; $i++) {
                  echo "<li><div class='sub_cate'> $sub_category_name[0]</div></li>";
                  $sub_category_name = mysqli_fetch_array($result);
                }
                ?>
<<<<<<< HEAD
                </ul>
                <h3>현재 게시글 : <span class="current"> </span></h3>
                <table>
                  <tr>
                    <th>번호</th>
                    <th>제목</th>
                    <th>장소</th>
                    <th>일정</th>
                    <th>주최자</th>
                    <th>작성 일자</th>
                  </tr>
                  <tr>
                    <td><?= $classPro[0] ?></td>
                    <td><?= $classPro[1] ?></td>
                    <td><?= $classPro[2] ?></td>
                    <td><?= $classPro[3] ?></td>
                    <td><?= $classPro[4] ?></td>
                    <td><?= $classPro[6] ?></td>
                  </tr>
                </table>
                >>>>>>> 217a8c0 (게시글 테이블 완성 및 출력 성공)
                >>>>>>> 2af9763 (게시글 테이블 완성 및 출력 성공)
=======
            
            <tr>
                <td><?=$classPro[0]?></td>
                <td><a href="classContent.php?class_idx=<?=$classPro[0]?>"><?=$classPro[1]?></a></td>
                <td><?=$classPro[2]?></td>
                <td><?=$classPro[3]?></td>
                <td><?=$classPro[5]?></td>
            </tr>
            <?php } ?>
        </table>
>>>>>>> 6e7e4ba (모임 상세보기 수정, 삭제, 신청 완료)
    </div>

  </body>

</html>