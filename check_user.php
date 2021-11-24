<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
include("conn.php");
$username = $_POST['username'];
$userpwd = $_POST['password'];
class chkinput
{
	var $name;
	var $pwd;

	function chkinput($x, $y)
	{
		$this->name = $x;
		$this->pwd = $y;
	}

	function checkinput()
	{
		include("conn.php");
		$sql = mysqli_query($conn, "select * from admin where username='" . $this->name . "'");
		$info = mysqli_fetch_array($sql);
		if ($info == false) {
			echo "<script language='javascript'>alert('不存在此用户！');history.back();</script>";
			exit;
		} else {
			if ($info['authority'] == 1) {
				echo "<script language='javascript'>alert('该用户已经被冻结！');history.back();</script>";
				exit;
			}

			if ($info['password'] == $this->pwd) {
				session_start();
				$_SESSION['username'] = $info['username'];
				$_SESSION['ID'] = $info['ID'];
				header("location:home.php");
				exit;
			} else {
				echo "<script language='javascript'>alert('密码输入错误！'); </script>";
				header("location: loginfail.php");
				exit;
			}
		}
	}
}

$obj = new chkinput(trim($username), trim($userpwd));
$obj->checkinput();
?>