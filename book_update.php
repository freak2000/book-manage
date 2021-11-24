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
  <?php
      if (isset($_POST['book_id'])) {
        // echo '<p >更新开始</p>';
        $sql = "UPDATE book_info SET name = '{$_POST['name']}',author = '{$_POST['author']}',publish = '{$_POST['publish']}',ISBN = '{$_POST['ISBN']}',language = '{$_POST['language']}',price = '{$_POST['price']}',pub_date = '{$_POST['pub_date']}',number = '{$_POST['number']}' WHERE book_id = '{$_POST['book_id']}';";
        // echo $sql,"\n";
        mysqli_query($conn, $sql);
      }

      $sql = "SELECT * FROM book_info where book_id={$_GET['id']} ;";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result);
      mysqli_close($conn);
    ?>
  <form method="post" action="">
    <div class="mb-3 row detail">
      <div class="title">书籍数据更改</div>
      <label for="staticEmail" class="col-sm-2 col-form-label">书号</label>
      <div class="col-sm-9">
        <input name="book_id" readonly  type="text" class="form-control-plaintext" id="staticEmail" value="<?php echo $row['book_id']; ?>">
      </div>
      <label for="staticEmail" class="col-sm-2 col-form-label">书名</label>
      <div class="col-sm-9">
        <input name="name" type="text" class="form-control-plaintext" id="staticEmail" value="<?php echo $row['name']; ?>">
      </div>
      <label for="staticEmail" class="col-sm-2 col-form-label">作者</label>
      <div class="col-sm-9">
        <input name="author" type="text" class="form-control-plaintext" id="staticEmail" value="<?php echo $row['author']; ?>">
      </div>
      <label for="staticEmail" class="col-sm-2 col-form-label">出版社</label>
      <div class="col-sm-9">
        <input type="text" name="publish" class="form-control-plaintext" id="staticEmail" value="<?php echo $row['publish']; ?>">
      </div>
      <label for="staticEmail" class="col-sm-2 col-form-label">isbn</label>
      <div class="col-sm-9">
        <input type="text" name="ISBN" class="form-control-plaintext" id="staticEmail" value="<?php echo $row['ISBN']; ?>">
      </div>
      <label for="staticEmail" class="col-sm-2 col-form-label">语言</label>
      <div class="col-sm-9">
        <input type="text" name="language" class="form-control-plaintext" id="staticEmail" value="<?php echo $row['language']; ?>">
      </div>
      <label for="staticEmail" class="col-sm-2 col-form-label">价格</label>
      <div class="col-sm-9">
        <input type="text" name="price" class="form-control-plaintext" id="staticEmail" value="<?php echo $row['price']; ?>">
      </div>
      <label for="staticEmail" class="col-sm-2 col-form-label">出版日期</label>
      <div class="col-sm-9">
        <input type="text" name="pub_date" class="form-control-plaintext" id="staticEmail" value="<?php echo $row['pub_date']; ?>">
      </div>
      <label for="staticEmail" class="col-sm-2 col-form-label">剩余</label>
      <div class="col-sm-9">
        <input type="text" name="number" class="form-control-plaintext" id="staticEmail" value="<?php echo $row['number']; ?>">
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
      <button type="submit" name="submit" id="submit" class="btn btn-outline-success">
        更新
      </button>
      <button type="button" class="btn btn-primary">
        <a href="home.php">返回</a>
      </button>
    </div>
</form>  
<?php
	if (isset($_POST['id'])) {
		echo '<p >更新成功</p>';
	}
	?>
  <br>
</body>

</html>