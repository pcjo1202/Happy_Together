<?php session_start();
header("refresh: 2;");?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>카테고리 페이지</title>
    <style type="text/css">
        .container {
        display: flex; }
        .left{width: 400px;  margin: auto 0;}
        .center{flex:3; text-align: center;}
        .right{width:400px; text-align:right; margin: auto 0;}

        a {
            text-decoration: none;
            color: rgb(0, 132, 255);
            font-size: 40px;
            align: center;
        }
        a:hover{color:rgb(255, 153, 0);}

        body {
            font-size: 16px;
            background:#EEFFF1;
        }

        .title {
            border-top: 3px solid #999;
            border-bottom: 2px solid #999;
            background: #eee;
            font-weight: bold
        }

        h1 {
            color: rgb(0, 132, 255)
        }

        .category {
            margin-right: 10%;
            margin-left: 10%;
            background-color: white;
            border: 4px double green;
            padding: 10px;
        }

        button {
            height: 50px;
            margin-left: 30px;
            font-size: 25px;
            background-color: #ff9c57;
            border: none;
            color: white;
        }

        h1 {
            text-align: center
        }

        p {
            text-align: center;
            font-size: 50px;
            color: #ff9c57;
        }

        .plus {
            img src="image/plus.png" width="50" height="60"
        }
        .plus_image {
            float: right;
            margin-right : 20px;
            cursor: pointer;
        }
        hr {
            height: 2px;
            background-color: #1AAB8A;
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let main_category_image = document.querySelector(".main_category_image");
            let sub_category_image = document.querySelector(".sub_category_image");

            main_category_image.addEventListener("click",function() {
                window.open(
                    "maincate_pop.html",
                    "Child",
                    "width=800, height=500, top=200, left=320"
                );

            })
            sub_category_image.addEventListener("click",function() {
                window.open(
                    "subcate_pop.php",
                    "Child",
                    "width=800, height=500, top=200, left=320"
                );

            })

        })
    </script>
</head>

<body>
    <?php 
    
         $connection = mysqli_connect('52.78.0.158','remoteJO','remoteJO','happyTogether',56946);        
         if(!isset($_SESSION['id'])){
             echo "<script>alert('관리자 권한이 없습니다.'); location='admin_login.html';</script>";
         }
        //  메인 카테고리 데이터
         $main_category_query = "select main_category_name from main_category";
         $main_category_result = mysqli_query($connection, $main_category_query);
         $main_category = mysqli_fetch_array($main_category_result);

        //  메인 카테고리 총 데이터 개수
         $main_category_count = mysqli_num_rows($main_category_result);

        // 서브 카테고리 데이터 
        $sub_category_query = "select sub_category_name from sub_category";
        $sub_category_result = mysqli_query($connection, $sub_category_query);
        $sub_category = mysqli_fetch_array($sub_category_result);
 
        //  서브 카테고리 총 데이터 개수
        $sub_category_count = mysqli_num_rows($sub_category_result);
        
    ?>
<div class="container">
    <div class="left">   </div>
    <div class="center"><a href="adminMain.php">관리자 페이지 </a> <br> <h2>카테고리</h2> </div>
    <div class="right"> </div>
</div>  
<hr>
    <p> 메인 카테고리 </p>
    <div class="category">
        <?php
            for($i=0; $i < $main_category_count; $i++){
                echo "<button>$main_category[0]</button>";
                $main_category = mysqli_fetch_array($main_category_result);
            }
        ?>
        <img src="image/plus.png" class="plus_image main_category_image" width="48" height="48">
    </div>
    <br>
    <p> 서브 카테고리 </p>
    <div class="category">
        <?php
            for($i=0; $i < $sub_category_count; $i++){
                echo "<button>$sub_category[0]</button>";
                $sub_category = mysqli_fetch_array($sub_category_result);
            }
        ?>
        <img src="image/plus.png" class="plus_image sub_category_image" width="48" height="48">
    </div>

</body>

</html>