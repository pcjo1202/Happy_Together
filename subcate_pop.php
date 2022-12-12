    <html>
    <head>
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
        </style>
    </head>
    <body>
        <p class='mainmessage'>
        서브 카테고리 추가하기
        </p>

        <form name="form" method="post" action="./custom_input.php" class='container'>
        <span class='message'
            >1. 메인 카테고리 선택   </span
        ><select name="month" style="width: 100px ;">
        <option >선택</option>
        <?php
        $i = 0;
            $arr = array("축구","농구","야구");
            foreach ($arr as $value) 
            {
                $i= $i + 1;
                echo "<option value= $i>".$value."</option>";
            }
        ?>
        </select>
        <span class='message'
            >2. 서브 카테고리 입력 </span
        ><input type="textarea" name="sub_category" class='textarea' />
        <br />
        <input type="submit" value="입력"  class='button' />
        <input type="reset" value="취소" class='button' />
        </form>
    </body>
    <html></html>
    </html>
