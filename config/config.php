<?php
	header("content-type:text/html;charset=utf-8");
	error_reporting(0);
	/**
		���ݿ�����
	*/
	$conn = mysql_connect('localhost','root','root');
	mysql_select_db('easegood'); //mysql_query('use message');Ҳ����
	mysql_query('set names utf8');
	if(!$conn){
		echo "���ݿ�����ʧ��!";
	}
	$basedir = 'http://127.0.0.1/wwwroot/'; // ����ĸ�Ŀ¼