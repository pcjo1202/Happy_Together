<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>관리자 페이지</title>
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
      }
      a {
        text-decoration: none;
        color: rgb(0, 132, 255);
        font-size: 40px;
        align: center;
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
      p{
        
      }
      h1 {
        color: rgb(0, 132, 255);
      }
      textarea {
      font-size: 16px;
      letter-spacing: 1px;
      }
      textarea {
          padding: 10px;
          max-width: 100%;
          line-height: 1.5;
          border-radius: 5px;
          border: 1px solid #ccc;
          box-shadow: 1px 1px 1px #999;
          
      }
      form{
        width: 50%;
        margin-left : 25%

      }
    </style>
  </head>
  <body>
    <div class="container">
      <a href="admin.html">* 관리자 페이지 *</a>
    </div>
    <hr />
    <form name="form" method="post" action="./post.php">
    <p>[제목]</p><textarea  name="title" rows="1" cols="15"></textarea>
    <p>[내용]</p><textarea  name="post" rows="15" cols="100"></textarea>
    <input type="submit" value="입력" />&emsp;&nbsp;
    <input type="reset" value="취소" />&ensp;&ensp;
    </form>

  </body>
</html>
