<?php
	
	/**
		/user/login.php 包含 header.php再包含config/config.php 问题：
		此时当前目录会变成/user/ 如果header中包含./config/config.php,则会在/user/config/中寻找config.php
		而如果header中是config/config.php，那么先会/user/config/寻找，如果没有则以header所在目录为根目录寻找config/config.php
	*/

	include 'config/config.php';
	/*
		判断用户是否登陆：
	*/
	$is_login = false;
	session_start();
	if(isset($_SESSION['username'])){
		$username = $_SESSION['username'];
		$is_login = true;
	}
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>物品交换系统 - 以物易物</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="<?php echo $basedir?>css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<!--bootstrap js-->
	<script src="<?php echo $basedir?>js/jquery.min.js"></script>
    <script src="<?php echo $basedir?>js/bootstrap.min.js"></script>
    <script src="<?php echo $basedir?>js/scripts.js"></script>
  </head>
  <body>

    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
		<?php 
		switch($here){
			case 'login':
			?>
			<ul class="nav nav-pills">
				<li class="nav-item">
					<span class="nav-link">物品交换系统 - 以物易物</span>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo $basedir;?>">主页</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo $basedir;?>addGood.php">发布物品</a>
				</li>
				<!--<li class="nav-item">
					<a class="nav-link" href="#">我的资料</a>
				</li>-->
				<!--<li class="nav-item">
					<a class="nav-link disabled" href="#">留言</a>
				</li>-->
				<?php if($is_login){?>
				<li class="nav-item dropdown ml-md-auto">
					 <a class="nav-link dropdown-toggle" href="<?php echo $basedir.'user/index.php';?>" id="navbarDropdownMenuLink" data-toggle="dropdown"><?php echo $username;?></a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
						 <a class="dropdown-item" href="<?php echo $basedir;?>user/index.php">个人中心</a> <a class="dropdown-item" href="<?php echo $basedir;?>user/index.php?action=showItem">我的发布</a> <a class="dropdown-item" href="<?php echo $basedir;?>user/index.php?action=favorite">我的收藏 </a>
						<div class="dropdown-divider">
						</div> <a class="dropdown-item" href="<?php echo $basedir?>user/loginout.php">注销登陆</a>
					</div>
				</li>
				<?php }else{?>
				<li class="nav-item ml-md-auto">
					<a class="nav-link" href="<?php echo $basedir?>user/register.php">注册</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="<?php echo $basedir?>user/login.php">登陆</a>
				</li>
				<?php }?>
			</ul>
		<?php 
				break;
			case 'addGood':
			?>
			<ul class="nav nav-pills">
				<li class="nav-item">
					<span class="nav-link">物品交换系统 - 以物易物</span>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo $basedir;?>">主页</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="<?php echo $basedir;?>addGood.php">发布物品</a>
				</li>
				<!--<li class="nav-item">
					<a class="nav-link" href="#">我的资料</a>
				</li>-->
				<!--<li class="nav-item">
					<a class="nav-link disabled" href="#">留言</a>
				</li>-->
				<?php if($is_login){?>
				<li class="nav-item dropdown ml-md-auto">
					 <a class="nav-link dropdown-toggle" href="<?php echo $basedir.'user/index.php';?>" id="navbarDropdownMenuLink" data-toggle="dropdown"><?php echo $username;?></a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
						 <a class="dropdown-item" href="<?php echo $basedir;?>user/index.php">个人中心</a> <a class="dropdown-item" href="<?php echo $basedir;?>user/index.php?action=showItem">我的发布</a> <a class="dropdown-item" href="<?php echo $basedir;?>user/index.php?action=favorite">我的收藏 </a>
						<div class="dropdown-divider">
						</div> <a class="dropdown-item" href="<?php echo $basedir?>user/loginout.php">注销登陆</a>
					</div>
				</li>
				<?php }else{?>
				<li class="nav-item ml-md-auto">
					<a class="nav-link" href="<?php echo $basedir?>user/register.php">注册</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo $basedir?>user/login.php">登陆</a>
				</li>
				<?php }?>
			</ul>
		<?php	
				break;
			case 'register':?>
				<ul class="nav nav-pills">
				<li class="nav-item">
					<span class="nav-link">物品交换系统 - 以物易物</span>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo $basedir;?>">主页</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo $basedir;?>addGood.php">发布物品</a>
				</li>
				<!--<li class="nav-item">
					<a class="nav-link" href="#">我的资料</a>
				</li>-->
				<!--<li class="nav-item">
					<a class="nav-link disabled" href="#">留言</a>
				</li>-->
				<?php if($is_login){?>
				<li class="nav-item dropdown ml-md-auto">
					 <a class="nav-link dropdown-toggle" href="<?php echo $basedir.'user/index.php';?>" id="navbarDropdownMenuLink" data-toggle="dropdown"><?php echo $username;?></a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
						 <a class="dropdown-item" href="<?php echo $basedir;?>user/index.php">个人中心</a> <a class="dropdown-item" href="<?php echo $basedir;?>user/index.php?action=showItem">我的发布</a> <a class="dropdown-item" href="<?php echo $basedir;?>user/index.php?action=favorite">我的收藏 </a>
						<div class="dropdown-divider">
						</div> <a class="dropdown-item" href="<?php echo $basedir?>user/loginout.php">注销登陆</a>
					</div>
				</li>
				<?php }else{?>
				<li class="nav-item ml-md-auto">
					<a class="nav-link active" href="<?php echo $basedir?>user/register.php">注册</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo $basedir?>user/login.php">登陆</a>
				</li>
				<?php }?>
			</ul>
		<?php
				break;
			
			default:?>
				<ul class="nav nav-pills">
				<li class="nav-item">
					<span class="nav-link">物品交换系统 - 以物易物</span>
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="<?php echo $basedir;?>">主页</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo $basedir;?>addGood.php">发布物品</a>
				</li>
				<!--<li class="nav-item">
					<a class="nav-link" href="#">我的资料</a>
				</li>-->
				<!--<li class="nav-item">
					<a class="nav-link disabled" href="#">留言</a>
				</li>-->
				<?php if($is_login){?>
				<li class="nav-item dropdown ml-md-auto">
					 <a class="nav-link dropdown-toggle" href="<?php echo $basedir.'user/index.php';?>" id="navbarDropdownMenuLink" data-toggle="dropdown"><?php echo $username;?></a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
						 <a class="dropdown-item" href="<?php echo $basedir;?>user/index.php">个人中心</a> <a class="dropdown-item" href="<?php echo $basedir;?>user/index.php?action=showItem">我的发布</a> <a class="dropdown-item" href="<?php echo $basedir;?>user/index.php?action=favorite">我的收藏 </a>
						<div class="dropdown-divider">
						</div> <a class="dropdown-item" href="<?php echo $basedir?>user/loginout.php">注销登陆</a>
					</div>
				</li>
				<?php }else{?>
				<li class="nav-item ml-md-auto">
					<a class="nav-link" href="<?php echo $basedir?>user/register.php">注册</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo $basedir?>user/login.php">登陆</a>
				</li>
				<?php }?>
				</ul>
		<?php
				break;
		}
		?>
		</div>
	</div>
	<hr>
  </body>
<html>