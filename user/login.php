<?php @require('./../config/config.php');?>
<!DOCTYPE html>
<?php 
$here = 'login';
require('../header.php');

if($is_login){
	die(header("Location: ".$basedir."user/index.php"));
}
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>login</title>
	<link rel="stylesheet" href="../bs/css/bootstrap.min.css">
	<script src="../bs/js/jquery.min.js"></script>
	<script src="../bs/js/bootstrap.min.js"></script>
	<script src="../bs/js/holder.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-default"  style="width:500px;margin:10px auto;">
		  <div class="panel-heading">
		  	物品交换系统用户登陆
		  </div>
		  <div class="panel-body">
			<form class="form-horizontal" role="form" method="post" action="checklogin.php">
				  <div class="form-group">
				    <label class="col-sm-2 control-label">Username</label>
				    <div class="col-sm-10">
				      <input type="text" name="username" class="form-control" placeholder="Usename">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
				    <div class="col-sm-10">
				      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <input type="submit" class="btn btn-default" value="登陆">
				    </div>
				  </div>
			</form>		    
		  </div>
		</div>
	</div>
</body>
</html>