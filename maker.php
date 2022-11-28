<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Happy Together - 모임 만들기</title>
    <style>
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-size: 20px;
      }
      body {
        background-color: rgba(243, 240, 240, 0.781);
      }

      a {
        text-decoration: none;
      }

      .container {
        display: flex;
        flex-direction: column;
      }

      header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem;
        font-size: 1.2rem;
      }

      .logo img{
        width: 100px;
      }

      .left {
        display: flex;
        align-items: center;
        justify-content: center;
      }

      header button {
        border: none;
        background: none;
      }

      header .logoBox .logo {
        font-size: 2.5rem;
        color: #e3c8c8;
      }

      .right {
        display: flex;
        justify-content: center;
        align-items: center;
      }

      main {
        background-color: #a1bad8;
        padding: 1rem 0;
        flex: 32rem;
        display: flex;
        justify-content: center;
        align-items: center;
      }
      main .wrapper {
        width: 900px;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .formBox {
        padding: 1rem;
        display: grid;
        gap: 0.8rem;
        grid-template-columns: 3fr 2fr;
        grid-template-areas:
          'title title'
          'category members'
          'place date'
          'contents contents'
          'subBtn subBtn';
        align-items: center;
      }
      input[type='text'],
      input[type='number'],
      input[type='date'] {
        flex: 1;
        border: none;
        border-radius: 5px;
        height: 45px;
        padding: 7px;
        margin-left: 10px;
      }
      .title {
        align-self: center;
        grid-area: title;
        display: flex;
        width: 100%;
      }
      .title > input {
        flex: 1;
      }
      .category {
        grid-area: category;
        justify-self: center;
        display: flex;
        align-items: center;
      }
      .category > input {
        width: 50%;
        /* background-color: red; */
      }

      .members {
        grid-area: members;
        justify-self: flex-start;
        display: flex;
        align-items: center;
        width: 100%;
      }
      .members > input {
        flex: 1;
      }

      .place {
        grid-area: place;
        justify-self: flex-start;
        display: flex;
        align-items: center;
        width: 100%;
      }
      .place > input {
        flex: 1;
      }

      .date {
        grid-area: date;
        justify-self: center;
        display: flex;
        align-items: center;
        width: 100%;
      }
      .contents {
        grid-area: contents;
        display: flex;
        border: none;
        border-radius: 10px;
      }
      .subBtn {
        width: 80%;
        grid-area: subBtn;
        border: none;
        justify-self: center;
        padding: 10px 0;
        border-radius: 8px;
        background-color: #fff9ce;
        transition: all 0.5s;
        cursor: pointer;
      }
      .subBtn:hover {
        background-color: #e0ffc8;
      }

      .footer {
      }
    </style>
  </head>
  <body>
    <?php 
        $main_category_name = $_GET['main_category_name'];
        $sub_category_name = $_GET['sub_category_name'];
    ?>
    <div class="container">
      <header>
        <div class="left">
          <div class="logoBox">
            <a class="logo" href="mainClassList.php?main_category_name=<?=$main_category_name?>&sub_category_name=<?=$sub_category_name?>">
            <img src="./image/logo.png" alt="" srcset=""></a>
          </div>
          <div class="subTitle">모임만들기</div>
        </div>
        <div class="right">
          <div class="myPage">
            <button>마이페이지</button>
          </div>
        </div>
      </header>

      <main>
        <?php ?>
        <div class="wrapper">
          <form class="formBox" action="makerPro.php" method="post">
            <div class="title">
              <span>제목</span>
              <input type="text" value="" name="title" />
            </div>
            <div class="category">
              <span>카테고리</span>
              <input type="text" value="<?=$main_category_name?>" name="mainCategory" readonly/> /
              <input type="text" value="<?=$sub_category_name?>" name="subCategory" readonly/>
            </div>
            <div class="members">
              <span>모집인원</span>
              <input type="number" name="memberCount" value="" />
            </div>
            <div class="place">
              <span>장소</span>
              <input type="text" name="place" value="" />
            </div>
            <textarea
              class="contents"
              name="contents"
              id=""
              cols="30"
              rows="10"
              placeholder="모입 시간, 장소, 모집인원"
            ></textarea>
            <input class="subBtn" type="submit" value="저장하기" />
          </form>
        </div>
      </main>

      <footer>copyright 천지창조</footer>
    </div>
  </body>
</html>