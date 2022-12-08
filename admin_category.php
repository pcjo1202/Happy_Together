<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원목록</title>
    <style type="text/css">
        .container {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        a {
            text-decoration: none;
            color: rgb(0, 132, 255);
            font-size: 40px;
            align: center;
        }

        body {
            font-size: 16px
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
    </style>

    <script language="javascript">
        function mainPopup() { window.open("maincate_pop.html", "category_insert", "width=400, height=300, left=100, top=50"); }
        function subPopup() { window.open("subcate_pop.php", "category_insert", "width=400, height=300, left=100, top=50"); }
    </script>
</head>

<body>
    <div class="container">
        <a href="admin.html">* 관리자 페이지 *</a>
    </div>
    <br>
    <hr>
    <p> 메인 카테고리 </p>
    <div class="category">
        <?php
            $arr = array("구기종목","운동","스터디");
            foreach ($arr as $value) 
            {
                echo "<button>".$value."</button>";
            }
        ?>
        <form action="" style="width: 50px; float:right; ">
            <input type="image" src="image/plus.png" alt="plus" width="48" height="48" margine-right="30px"
                onclick="mainPopup();">
        </form>
    </div>
    <br>
    <p> 서브 카테고리 </p>
    <div class="category">
        <?php
            $arr = array("축구","농구","야구");
            foreach ($arr as $value) 
            {
                echo "<button>".$value."</button>";
            }
        ?>
        <form action="" style="width: 50px; float:right; ">
            <input type="image" src="image/plus.png" alt="plus" width="48" height="48" margine-right="30px"
                onclick="subPopup();">
        </form>
    </div>

</body>

</html>