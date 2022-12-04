    <html>
    <head>
        <title>HTML,PHP,MYSQL 과의 연동</title>
        <style>
        input,
        select { border: 1;}
        textarea {
            background-color: rgb(255, 255, 255);
            border: 1;
            border-color: rgb(0, 0, 0);
        }

        </style>
    </head>
    <body>
        <p align="center">
        <font size="7"><b>카테고리 입력</b></font>
        <br />
        <br />
        </p>

        <form name="form" method="post" action="./custom_input.php">
        <span style="font-weight: bold; font-size: 1.5em/1em; color: rgb(0, 6, 128)"
            >1. 메인 카테고리 선택 : &ensp; </span
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

        <br />
        <br />
        <span style="font-weight: bold; font-size: 1.5em/1em; color: rgb(0, 6, 128)"
            >2. 서브 카테고리 입력 : &ensp;</span
        ><input type="textarea" name="sub_category" style="width: 100px" />
        <br />
        <br />
        <input type="submit" value="입력" />&emsp;&nbsp;
        <input type="reset" value="취소" />&ensp;&ensp;
        </form>
    </body>
    <html></html>
    </html>
