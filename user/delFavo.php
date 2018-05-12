<?php
	Header('Content-type:text/html;charset=utf-8');
	@include('../config/config.php');
	$id = $_GET['id'];
	$sql = "select username from favorite where id=$id";
	$res = mysql_query($sql);
	$row = mysql_fetch_assoc($res);
	SESSION_START();
	if($_SESSION['username']!==$row['username'])
	{
		echo "<script>非法操作</script>";
		exit();
	}
	$sql = "delete from favorite where id=$id";
	$res = mysql_query($sql);
	if($res)
	{
		echo "<script>alert('取消收藏成功!');window.location.href='$basedir/user/?action=favorite';</script>";
	}
	else
	{
		echo "<script>alert('取消收藏失败');history.go(-1);</script>";
	}
?>