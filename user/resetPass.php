<?php
	//Header('Content-type:text/html;charset=utf-8');
	include('../config/config.php');
	if(isset($_POST['submit']))
	{
		// 1.接收参数，检查参数
		if(isset($_POST['oldPass']) && isset($_POST['newPass']) && isset($_POST['newPass1']))
		{
			$oldPass = $_POST['oldPass'];
			$newPass = $_POST['newPass'];
			$newPass1 = $_POST['newPass1'];
			if($oldPass && $newPass && $newPass1)
			{
				
			}
			else
			{
				echo "<script>alert('密码不能为空!');history.go(-1);</script>";
				exit();
			}
		}
		else{
			echo "<script>alert('非法访问!');history.go(-1);</script>";
			exit();
		}

		// 2.检测旧密码是否正确
		session_start();
		$username = $_SESSION['username'];
		$oldPass = md5($oldPass);
		$sql = "select password from user where username='$username'";
		$res = mysql_query($sql);
		$row = mysql_fetch_assoc($res);
		if($row['password']!==$oldPass)
		{
			echo "<script>alert('旧密码不正确!');history.go(-1);</script>";
			exit();
		}
		
		// 3.新密码是否相同，如果相同则修改
		if($newPass!==$newPass1)
		{
			echo "<script>alert('新密码与重复新密码不同!');history.go(-1);</script>";
			exit();
		}
		$newPass = md5($newPass);
		$sql = "UPDATE user SET password='$newPass' where username='$username'";
		$res = mysql_query($sql);
		if($res)
		{
			echo "<script>alert('修改密码成功!');window.location.href='$basedir/user/index.php';</script>";
		}else
		{
			echo "<script>alert('修改密码失败!');history.go(-1);</script>";
		}
	}

?>

<div class="row">
<div class="col-md-12">
	<div class="box">
		<form action="resetPass.php" method="post">

			<div class="box-body">
				<div class="form-group">
					<label for="inputTitle">旧密码</label>
					<input type="password" placeholder="旧密码" id="inputTitle" name="oldPass" class="form-control">
				</div>
				<div class="form-group">
					<label for="inputOrderNumber">新密码</label>
					<input type="password" name="newPass" placeholder="新密码" id="inputOrderNumber" value="" class="form-control">
				</div>
				<div class="form-group">
					<label for="inputOrderNumber">重复新密码</label>
					<input type="password" name="newPass1" placeholder="重复新密码" id="inputOrderNumber" value="" class="form-control">
				</div>

			</div><!-- /.box-body -->
			<div class="box-footer clearfix">
				<button class="btn btn-primary" name="submit" type="submit">提交</button>
			</div><!-- /.box-footer -->
		</form>

	</div><!-- /.box -->
  </div><!-- /.col -->
</div><!-- /.row -->