<?php 
include("conn.php");
  $username=$_POST['username'];
  $sql1=mysqli_query($conn,"select * from admin where username='".$username."'");  
	    $info1=mysqli_fetch_array($sql1);
		if($info1==true)
		{
		  echo "对不起,该昵称已被占用!";
		// header("location: regfail.php");
		}
		else
		{
      echo $username;
      $username=$_POST['username'];
      $password=$_POST['password'];
      $tel=$_POST['tel'];
      mysqli_query($conn,"insert into admin (username,password,tel) values ('$username','$password','$tel')");
      echo "<script language='javascript'>
        alert('恭喜你！你已成功注册！');history.go(-2);
      </script>";
		}
    // header("location:index.html");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册成功</title>
</head>

<body>

</body>
</html>

