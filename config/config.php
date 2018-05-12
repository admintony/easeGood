<?php
	header("content-type:text/html;charset=utf-8");
	error_reporting(0);
	/**
		数据库连接
	*/
	$conn = mysql_connect('localhost','root','root');
	mysql_select_db('easegood'); //mysql_query('use message');也可以
	mysql_query('set names utf8');
	if(!$conn){
		echo "数据库连接失败!";
	}
	$basedir = 'http://127.0.0.1/wwwroot/'; // 程序的根目录