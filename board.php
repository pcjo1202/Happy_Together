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
            margin-top : 50px;
            }
            div .top {
                display : inline;
            }
            .home {
                text-decoration : none;
                font-size: 1.5rem;
                color : blue;
                font-weight : bold;
            }
        ul {
            list-style-type: none;
            display: flex;
            gap: 2rem;
            }
        div .sub_cate {
            border : 1px solid black;
            padding: 10px 20px;
            font-size: 1.5rem;
            cursor: pointer;
            background-color : #d2d6d9;
        }
        .current { 
            color : blue;
            font-weight : bold;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // li 배열로 만든 거임 querySelectorAll!
            let sub_cate = document.querySelectorAll(".sub_cate");
            let current = document.querySelector(".current");
            // 초기값 설정하기!
            sub_cate[0].style.color = "blue";
            sub_cate[0].style.fontWeight="bold";
            sub_cate[0].style.backgroundColor = "#a8adb4"; 
            current.innerHTML = sub_cate[0].innerText;
            // 배열로 클릭한 걸 알기 위해 for문을 이용 + 
            // 기존 선택된 거 있을 시 현재 클릭한 걸로 효과 넣기!!
            for (let i=0; i < sub_cate.length; i++) {
                sub_cate[i].addEventListener("click", function(){
                    for(let j=0; j < sub_cate.length; j++) {
                        if(sub_cate[j].style.color == "blue"){
                            sub_cate[j].style.color = "black";
                            sub_cate[j].style.fontWeight = "normal";
                            sub_cate[j].style.backgroundColor = "#d2d6d9";
                        }
                    }       
                    sub_cate[i].style.color = "blue";
                    sub_cate[i].style.fontWeight="bold";
                    sub_cate[i].style.backgroundColor = "#a8adb4"; 
                    if(sub_cate[i].style.color == "blue"){
                        current.innerHTML = sub_cate[i].innerText;
                    }
                })
            }
        });
    </script>

</head>
<body>
    <?php 
        $connection = mysqli_connect('localhost','happy','together','happytogether');

        $main_category_name = $_GET['main_category_name'];
        $query = "select sub_category_name from sub_category where main_category = '$main_category_name'";
        $query2 = "select count(*) from sub_category where main_category = '$main_category_name'";
        
        $result = mysqli_query($connection, $query);
        $result2 = mysqli_query($connection, $query2);
        
        $sub_category = mysqli_fetch_array($result); 
        $sub_count = mysqli_fetch_array($result2);
    ?>
    <div class="container">
        <div class="top"><a href="index.php" class="home">HATO</a>
        <h1><?=$main_category_name ?>&ensp; 게시판</h1></div>
        <ul class="board_ul">
             <?php
                 for($i=0; $i < $sub_count[0]; $i++) {
                     echo "<li><div class='sub_cate'> $sub_category[0]</div></li>";
                     $sub_category = mysqli_fetch_array($result);
                }
            ?>
        </ul>
        <h3>현재 게시글 : <span class="current"> </span></h3>
    </div>

</body>
</html>