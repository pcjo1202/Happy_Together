<html>
<html lang="en">
<head>
    <meta charset="UTF-8">
        <title>서브카테고리</title>
        <style>
        input,
        select { border: 1;}
        .button{
        background-color:#CCEEFF;
        border: 1;
        border-color:#CCEEFF;
        width:100px;
        margin:20px;
        }
            .button{
        background-color:#CCEEFF;
        border: 1;
        border-color:#CCEEFF;

        }
        .textarea {
        background-color: #EEFBFF;
        border: 1;
        border-color: #CCEEFF;
        width: 150px;
        margin: 10px;
        }
        .mainmessage{
            font-size:50px;
            text-align: center;
            font-weight: 600;
            margin:50px;
        }
        .message{
        font-weight: 800; 
        font-size: 18px; 
        color: rgb(0, 6, 128);
        margin: 30px;
        }     
        .container {
        text-align: center;
        }
        .btns {
            margin-top : 40px;
            text-align : center;
        }
        </style>
        <script>
            document.addEventListener("DOMContentLoaded", function(){
                let close = document.querySelector(".close");
                close.addEventListener("click", function() {
                    window.close();
            })
    })
        </script>
    </head>
    <body>
        <?php 
            $connection = mysqli_connect('52.78.0.158','remoteJO','remoteJO','happyTogether',56946);        

            $main_category_query = "select main_category_name from main_category";
            $main_category_result = mysqli_query($connection, $main_category_query);
            $main_category_count = mysqli_num_rows($main_category_result);
            $main_category = mysqli_fetch_array($main_category_result);

        ?>
        <p class='mainmessage'>
        서브 카테고리 추가하기
        </p>

        <form name="form" method="post" action="insert_sub_category.php" class='container'>
        <span class='message'>1. 메인 카테고리 선택</span>
        <select name="main_category" style="width: 100px ;">
        <option >선택</option>
        <?php
            for($i=0; $i < $main_category_count; $i++){
                echo "<option value= $main_category[0]>$main_category[0]</option>";
                $main_category = mysqli_fetch_array($main_category_result);
            }
        ?>
        </select>
        <span class='message'>2. 서브 카테고리 입력 </span>
        <input type="text" name="sub_category" class='textarea' />
        <div class="btns">
            <input type="submit" value="입력"  class='button' />
            <input type="button" value="닫기" class="button close" />
        </div>
        </form>
    </body>
    <html></html>
    </html>