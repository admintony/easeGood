<!DOCTYPE html>
<?php 
	// 1.检测用户是否登录
	session_start();
	if(!isset($_SESSION['username']))
	{
		die(Header('Location: '.$basedir.'user/login.php'));
	}
	
	// 2.查询用户的信息
	$username=$_SESSION['username'];
	@include('../config/config.php');
	$sql = "select * from user where username='$username'";
	$res = mysql_query($sql);
	$row = mysql_fetch_assoc($res);
	if(isset($_GET['action']))
	{
		$page=$_GET['action'];
	}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>个人中心_物品交换系统</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="../index.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                物品交换系统
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $username;?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?php echo $row['photo'];?>" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $username?> - 普通会员
                                        <small>注册于<?php echo $row['reg_date'];?></small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">用户信息</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="loginout.php" class="btn btn-default btn-flat">注销登陆</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo $row['photo'];?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, <?php echo $row['username'];?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="操作"/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="active">
                            <a href="index.php">
                                <i class="fa fa-dashboard"></i> <span>控制台</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-file"></i> <span>我的物品</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="index.php?action=showItem"><i class="fa fa-list"></i>物品列表</a></li>
                                <li><a href="../addGood.php"><i class="fa fa-edit"></i>物品发布</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-th-large"></i> <span>我的收藏</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="index.php?action=favorite"><i class="fa fa-list"></i>收藏列表</a></li>
                                <!--<li><a href="category_add.html"><i class="fa fa-edit"></i>分类添加</a></li>
								-->
							</ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-tag"></i> <span>用户操作</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="index.php?action=resetPass"><i class="fa fa-edit"></i>修改密码</a></li>
								<li><a href="loginout.php"><i class="fa fa-list"></i>注销登录</a></li>
                            </ul>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        个人中心
                        <small>控制台</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> 个人中心</a></li>
                        <li class="active">控制台</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
				<?php
					switch($page)
					{
						case 'showItem':
							@include('myGood.php');
							break;
						case 'favorite':
							@include('myFavorite.php');
							break;
						case 'resetPass':
							@include('resetPass.php');
							break;
						default:
							echo '';
					}
				?>
                </section><!-- /.content -->

                <section class="content-footer">
                    <div class="text-center">
                        &copy;物品交换系统
                    </div>
                </section><!-- /.content-footer -->

            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/app.js" type="text/javascript"></script>

    </body>
</html>