    <html>
    <head>
        <title>HTML,PHP,MYSQL ���� ����</title>
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
        <font size="7"><b>ī�װ� �Է�</b></font>
        <br />
        <br />
        </p>

        <form name="form" method="post" action="./custom_input.php">
        <span style="font-weight: bold; font-size: 1.5em/1em; color: rgb(0, 6, 128)"
            >1. ���� ī�װ� ���� : &ensp; </span
        ><select name="month" style="width: 100px ;">
        <option >����</option>
        <?php
        $i = 0;
            $arr = array("�౸","��","�߱�");
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
            >2. ���� ī�װ� �Է� : &ensp;</span
        ><input type="textarea" name="sub_category" style="width: 100px" />
        <br />
        <br />
        <input type="submit" value="�Է�" />&emsp;&nbsp;
        <input type="reset" value="���" />&ensp;&ensp;
        </form>
    </body>
    <html></html>
    </html>
