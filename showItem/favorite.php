<?php
	header("Content-type:text/html;charset=utf8");
	@include('../config/config.php');
	if( (!isset($_GET['pid'])) || empty($_GET['pid']) )
	{
		echo "<script>alert('非法访问!');history.go(-1);</script>";
	}
	
	SESSION_START();
	if($_SESSION['username']=='')
	{
		header('location:'.$basedir.'user/login.php');
		exit();
	}
	$username = $_SESSION['username'];
	$pid = $_GET['pid'];

	$sql = "INSERT INTO favorite(username,pid) VALUES('$username','$pid')";

	$res = mysql_query($sql);
	if(!$res)
	{
		//echo mysql_error();
		//echo '<br>'.$sql;
		echo "<script>alert('收藏失败!');history.go(-1);</script>";
		exit();
	}else{
		echo "<script>alert('收藏成功!');history.go(-1);</script>";
	}
?>