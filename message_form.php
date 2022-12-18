<?php session_start();
include('./connect.php')?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /*
  배경 #DADDE2
  버튼 #B1BDC5
   */
        body {
            background-color: #DADDE2;

        }

        .container {
            margin: 0 auto;
            width: 90%;
        }

        header {
            text-align: center;
        }

        header h1 {
            margin-left: 10px;
            display: inline-block;
        }
        .receive_id{
            margin-bottom : 10px;
            color : #628281;
            font-weight : bold;
        }

        form {
            text-align: center;
            font-weight: bold;
        }

        form div:nth-child(1),
        div:nth-child(3) {
            margin-bottom: 10px;
        }


        .title {
            border: none;
            border-radius: 10px;
            padding: 5px;
            width: 78%;
        }

        .form_content {
            text-align: left;
            text-indent: 5%;
        }

        .content {
            border: none;
            border-radius: 10px;
            display: inline-block;
            padding: 5px;
            width: 75%;
        }

        .btns {
            text-align: center;
        }

        .btns .btn:nth-child(1) {
            margin-right: 15px;
        }

        .btn {
            width: 16%;
            border: none;
            padding: 10px 0;
            border-radius: 8px;
            background-color: #628281;
            color: white;
            font-weight: bold;
            transition: all 0.5s;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #c2c2c2;
            color: #628281;
        }
    </style>
</head>

<body>
    <?php  
        $receive_id = $_GET['id'];
        $send_id = $_SESSION['id'];
        ?>
    <div class="container">
        <header>
            <img src="image/message.png">
            <h1>쪽지 보내기</h1>
        </header>
        <main>
            <div class="receive_id">받는 이 : <span class="recieve"><?=$receive_id?></span> </div>
            <form action="message_send.php" method="post">
                <input type="hidden" name="send_id" value="<?=$send_id?>">
                <input type="hidden" name="receive_id" value="<?=$receive_id?>">
                <div class="form_content">내용 : </div>
                <div><textarea name="contents" class="content" cols="30" rows="10"></textarea></div>

                <div class="btns">
                    <input type="submit" class="btn" value="전송">
                    <input type="button" class="btn" value="닫기">
                </div>
            </form>
        </main>
    </div>
</body>
<script>
    
</script>
</html>