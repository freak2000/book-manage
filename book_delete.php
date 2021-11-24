<!doctype html>
<?php
require_once("conn.php");
?>
<html>

<head>
	<meta charset="utf-8">
	<title>select </title>
</head>

<body>
	<pre>
		<?php
		print_r($_GET);
		print_r($_POST);

		if (true) {

			$sql = "delete from book_info WHERE book_id = '{$_GET['id']}';";
			//echo $sql;
			mysqli_query($conn, $sql);
			unset($_POST);
		} else {

			$sql = "SELECT * FROM news where book_id={$_GET['id']} ;";
			//echo $sql;
			$result = mysqli_query($conn, $sql);

			$row = mysqli_fetch_array($result);

		?>


		<form method="post" action="">
			<p>
				<input type="submit" name="submit" id="submit" value="删除">
			</p>
		</form>
		<?php
		}

		mysqli_close($conn);
		header("location:home.php")
		?>
		<a href="home.php">返回</a>
	</pre>
</body>

</html>