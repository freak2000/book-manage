<!doctype html>
<?php
require_once("conn.php");
?>
<html>

<head>
  <meta charset="utf-8">
  <title>首页</title>
  <link href="style/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style/book_detail.css">
</head>

<body>

  <header>
    <div class="logo">
      <img class="logo-img" src="imgs/book.png" alt="">
      <span class="logo-text">图书管理系统</span>
    </div>
    <div class="nav">
      <ul>
        <li><a href="">图书管理</a></li>
        <li><a href="">读者管理</a></li>
        <li><a href="">借还管理</a></li>
        <li><a href="">密码修改</a></li>
      </ul>
    </div>
    <!-- <div class="resign">
            <button id="resign-btn">注册</button>
        </div> -->
    <div class="btn">
      <button id="logout-btn">退出</button>
    </div>
  </header>
  <form action="">
    <div class="mb-3 row detail">
      <?php
        $sql = "SELECT * FROM book_info where book_id={$_GET['id']} ;";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        mysqli_close($conn);
      ?>
      <div class="title">
        书籍详情
      </div>
      <label for="staticEmail" class="col-sm-2 col-form-label">书号</label>
      <div class="col-sm-9">
        <input type="text" readonly disabled class="form-control-plaintext" id="staticEmail" value="<?php echo $row['book_id']; ?>">
      </div>
      <label for="staticEmail" class="col-sm-2 col-form-label">书名</label>
      <div class="col-sm-9">
        <input type="text" readonly disabled class="form-control-plaintext" id="staticEmail" value="<?php echo $row['name']; ?>">
      </div>
      <label for="staticEmail" class="col-sm-2 col-form-label">作者</label>
      <div class="col-sm-9">
        <input type="text" readonly disabled class="form-control-plaintext" id="staticEmail" value="<?php echo $row['author']; ?>">
      </div>
      <label for="staticEmail" class="col-sm-2 col-form-label">出版社</label>
      <div class="col-sm-9">
        <input type="text" readonly disabled class="form-control-plaintext" id="staticEmail" value="<?php echo $row['publish']; ?>">
      </div>
      <label for="staticEmail" class="col-sm-2 col-form-label">isbn</label>
      <div class="col-sm-9">
        <input type="text" readonly disabled class="form-control-plaintext" id="staticEmail" value="<?php echo $row['ISBN']; ?>">
      </div>
      <label for="staticEmail" class="col-sm-2 col-form-label">语言</label>
      <div class="col-sm-9">
        <input type="text" readonly disabled class="form-control-plaintext" id="staticEmail" value="<?php echo $row['language']; ?>">
      </div>
      <label for="staticEmail" class="col-sm-2 col-form-label">价格</label>
      <div class="col-sm-9">
        <input type="text" readonly disabled class="form-control-plaintext" id="staticEmail" value="<?php echo $row['price']; ?>">
      </div>
      <label for="staticEmail" class="col-sm-2 col-form-label">出版日期</label>
      <div class="col-sm-9">
        <input type="text" readonly disabled class="form-control-plaintext" id="staticEmail" value="<?php echo $row['pub_date']; ?>">
      </div>
      <label for="staticEmail" class="col-sm-2 col-form-label">剩余</label>
      <div class="col-sm-9">
        <input type="text" readonly disabled class="form-control-plaintext" id="staticEmail" value="<?php echo $row['number']; ?>">
      </div>
      <div class="intro">
        简介
      </div>
      <div class="intro-body">
        <textarea class="form-control" aria-label="With textarea">
          <?php echo $row['introduction']; ?>
        </textarea>
      </div>
    </div>
    <div class="commit">
        <button type="button" class="btn btn-primary">
          <a href="home.php">返回</a>
        </button>
      </div>
  </form>
</body>

</html>