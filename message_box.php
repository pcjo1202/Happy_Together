<?php include('./connect.php')?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
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

        main {
            border: 1px solid black;
            width: 100%;
            height: 500px;
            padding: 10px;
        }

        main::-webkit-scrollbar-thumb {}

        .box {
            border: 1px solid black;
            border-collapse: collapse;
            cursor: pointer;
            padding : 10px;
        }

        .box:hover {
            background-color: #628281;
            
        }

        .message_list {
            text-align: center;
            color: #628281;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php
    $receive_id = $_GET['receive_id'];

    $message_select_query = "select * from message where receive_id='$receive_id'";
    $message_select_result = mysqli_query($connection,$message_select_query);
    $message = mysqli_fetch_array($message_select_result);

    $message_count = mysqli_num_rows($message_select_result);
?>
    <div class="container">
        <header>
            <img src="image/message.png">
            <h1>쪽지함</h1>
        </header>
        <main>
            <?php
            if(!$message_count){
                echo "<div class='message_list'>받은 쪽지가 존재하지 않습니다.</div>";
            }else{
                for($i=0; $i < $message_count; $i++) {
                    echo "<div class='box'>
                    <input type='hidden' value='$message[0]' class='message_idx'>
                    <input type='hidden' value='$message[4]' class='read_count'>
                    <div class='title'> 내용 : $message[1]</div>
                    <div class='send_id'>발신자 : $message[3]</div>
                    <div class='send_date'>일자 : $message[5]</div>
                  </div>";
                  $message = mysqli_fetch_array($message_select_result);
                } 
            }
                
            ?>
        </main>
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let box = document.querySelectorAll(".box");
        let read_count = document.querySelectorAll(".read_count");
        let message_idx = document.querySelectorAll(".message_idx");
        for (let i = 0; i < box.length; i++) {
            box[i].addEventListener("click", function () {
                location = 'update_read_count.php?message_idx=' + message_idx[i].value;
            })
        }
    })
</script>

</html>