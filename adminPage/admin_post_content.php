<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>관리자 상세보기 페이지</title>
  <style type="text/css">
    .container {
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    body {
      font-size: 16px;
      background: #EEFFF1;
    }

    a {
      text-decoration: none;
      color: rgb(0, 132, 255);
      font-size: 40px;
      /* align: center; */
    }

    a:hover {
      color: rgb(255, 153, 0);
    }

    .title {
      border-top: 3px solid #999;
      border-bottom: 2px solid #999;
      background: #eee;
      font-weight: bold;
    }

    h1 {
      color: rgb(0, 132, 255);
    }

    textarea {
      font-size: 16px bold;
      letter-spacing: 1px;
    }

    textarea {
      padding: 10px;
      max-width: 100%;
      line-height: 1.5;
      border-radius: 5px;
      border: 1px solid rgb(95, 93, 93);
      box-shadow: 1px 1px 1px #999;
    }

    form {
      width: 50%;
      margin-left: 25%;
    }

    .btns {
      text-align: center;
    }

    .btns [type="submit"],
    .btns [type="button"] {
      width: 80px;
      height: 34px;

    }
    .before {
      cursor: pointer;
    }
  </style>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      let before = document.querySelector(".before");

      before.addEventListener("click", function () {
        history.back();
      })
    })
  </script>
</head>

<body>
    <?php 
        $connection = mysqli_connect('52.78.0.158','remoteJO','remoteJO','happyTogether',56946);
        
        $post_idx = $_GET['post_idx'];
        $select_query = "select post_title, post_contents from post where post_idx = '$post_idx'";
        $select_result = mysqli_query($connection, $select_query);
        $select = mysqli_fetch_array($select_result);
    ?>
  <div class="container">
    <a href="adminMain.php"> 관리자 페이지 </a>
  </div>
  <hr />
  <form action="admin_post_insert.php" name="form" method="post">
    <p>[제목]</p><input type="text" name="title" size="50" value="<?=$select[0]?>" readonly>
    <p>[내용]</p>
    <textarea name="contents" readonly rows="15" cols="100"><?=$select[1]?></textarea>
    <div class="btns">
      <input type="button" class="before" value="이전" />
    </div>
  </form>
</body>

</html>