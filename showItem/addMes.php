<?php
	@include('../config/config.php');
	header('Content-type:text/html;charset=utf8');
	if(!isset($_POST['content']))
	{
		echo "<script>alert('非法访问!');history.go(-1);</script>";
		exit();
	}

	if(empty($_POST['content']))
	{
		echo "<script>alert('留言内容不能为空!');history.go(-1);</script>";
		exit();
	}
	
	if( (!isset($_POST['pid'])) || empty($_POST['pid']))
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
	$content = $_POST['content'];
	$pid = $_POST['pid'];
	
	$sql = "INSERT INTO message(pid,content,username) VALUES('$pid','$content','$username')";
	$res = mysql_query($sql);
	if(!$res)
	{
		echo "<script>alert('留言失败!');history.go(-1);</script>";
		exit();
	}else{
		echo "<script>alert('留言成功!');window.location.href='$basedir/showItem/?id=$pid#message';</script>";
	}
?>