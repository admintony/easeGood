<?php
	@include('./../config/config.php');
	/**
		1.判断账号密码是否正确
	*/

	// 1.1 接收登陆界面传递来的数据 
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	// 1.2 拼接SQL语句，带入数据库查询

	$sql = "select * from user where username='$username' and password='$password'";
	$res = mysql_query($sql) or die("<script>alert('数据库查询出错!');</script>");
	$row = mysql_fetch_assoc($res);
	if(!$row){
		echo "<script>alert('账号或密码错误！');</script>";
		echo "<script>history.go(-1);</script>";
		exit();
	}
	
	/**
		2.设置session
	*/
	session_start();
	$_SESSION['username']=$username;
	header("Location: $basedir".'user/login.php');
?>