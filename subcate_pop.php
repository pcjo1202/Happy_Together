    <html>
    <head>
        <title>����ī�װ�</title>
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
        ���� ī�װ� �߰��ϱ�
        </p>

        <form name="form" method="post" action="./custom_input.php" class='container'>
        <span class='message'
            >1. ���� ī�װ� ����   </span
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
        <span class='message'
            >2. ���� ī�װ� �Է� </span
        ><input type="textarea" name="sub_category" class='textarea' />
        <br />
        <input type="submit" value="�Է�"  class='button' />
        <input type="reset" value="���" class='button' />
        </form>
    </body>
    <html></html>
    </html>
