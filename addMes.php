<?php include('config/config.php');?>
<?php include('./header.php');?>
<?php
	if(!$is_login){
		die(Header("Location: $basedir/user/login.php"));
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<!--留言板要引入的JS-->
	<link rel="stylesheet" href="bs/css/bootstrap.min.css">
	<script src="bs/js/jquery.min.js"></script>
	<script src="bs/js/bootstrap.min.js"></script>
	<script src="bs/js/holder.min.js"></script>
  </head>
  <body>

  
  <br>
  <br>
  <div class="container">
	<div class="row">
		  <div class="col-md-12">			
				<form role="form" action="addMes.php" method="post">
					<h2 align="center">留言板</h2>
					<div class="form-group">
					    <label>留言内容</label>
						<textarea class="form-control" rows="11" name="content"></textarea>
					</div>
					  	<input type="submit" class="btn btn-default" value="发表">
					</form>
			</div>
	</div>
  </div>
</body>
</html>