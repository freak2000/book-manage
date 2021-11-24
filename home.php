<!doctype html>
<?php
require_once("conn.php");
?>
<html>

<head>
  <meta charset="utf-8">
  <title>首页</title>
  <link href="style/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style/home.css">
  <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
      <button id="logout-btn" class="btn btn-primary">
        <a href="index.html">退出</a>
      </button>
    </div>
  </header>
  <div class="content">
    <table class="table table-striped">
      <tbody>
        <thead>
          <tr>
            <th scope="col">书名</th>
            <th scope="col">作者</th>
            <th scope="col">出版社</th>
            <th scope="col">isbn</th>
            <th scope="col">详情</th>
            <th scope="col">编辑</th>
            <th scope="col">删除</th>
            <th scope="col">剩余数量</th>
          </tr>
        </thead>
        <?php
			$result = mysqli_query($conn,"SELECT * FROM book_info");
			while($row = mysqli_fetch_array($result)){
			?>
      <tbody>
        <tr>
          <td>
            <?php echo($row['name']); ?>
          </td>
          <td>
            <?php echo($row['author']); ?>
          </td>
          <td>
            <?php echo($row['publish']); ?>
          </td>
          <td>
            <?php echo($row['ISBN']); ?>
          </td>
          <td>
            <button type="button" class="btn btn-success btn-sm" >
              <a href="book_detail.php?id=<?php echo($row['book_id']); ?>">详情</a>
            </button>
          </td>
          <td>
            <button type="button" class="btn btn-primary btn-sm">
              <a href="book_update.php?id=<?php echo($row['book_id']); ?>">
              编辑
              </a>
            </button>
          </td>
          <td>
            <button type="button" class="btn btn-danger btn-sm">
              <a href="book_delete.php?id=<?php echo($row['book_id']); ?>">
                删除
              </a>
            </button>
          </td>
          <td>
            <?php echo($row['number']); ?>
          </td>
        </tr>
        <?php
			}
			mysqli_close($conn);
			?>
      </tbody>
    </table>
  </div>
  <br>
</body>
<script>
  $(function () { 
    $("[data-toggle='popover']").popover();
  });
</script>
</html>