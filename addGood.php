<!DOCTYPE html>
<?php
	include('config/config.php');
	$here = 'addGood';
	include('header.php');
	if(!$is_login){
		header('location:'.$basedir.'user/login.php');
		exit();
	}
	header('Content-type:text/html;charset=utf8');

	if(isset($_POST['submit']))
	{
		// 第一步：接收参数
		$title = $_POST['title'];
		$desc = $_POST['desc'];
		$newOld = $_POST['newOld'];
		$wanted = $_POST['wanted'];
		$qq = $_POST['qq'];
		$tel = $_POST['tel'];
		$city = $_POST['city'];
		$username = $_SESSION['username'];
		// 第二步：数据判断
		if(empty($title)&&empty($desc)&&empty($newOld)&&empty($wanted)&&empty($qq)&&empty($city))
		{
			echo "<script>alert('请先将所有必填项填写后再提交!');</script>";
			echo "<script>history.go(-1);</script>";
			exit();
		}
	}

?>

<html>
<body>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12">
					<form id="form1" action="#" enctype="multipart/form-data" method="POST" role="form">
						<!--标题-->
						<div class="form-group">
							 
							<label for="title" style="font-weight:bold">
								标题
							</label>
							<input name="title" type="text" class="form-control" placeholder="请在此处填写标题..." />
						</div>
						<!--物品描述-->
						<div class="form-group">
							 
							<label for="title" style="font-weight:bold">
								物品描述
							</label>
							<textarea name="desc" class="form-control" rows="3" placeholder="请在此处填写物品描述..."></textarea>
						</div>

						<!--新旧程度和期望物品row-->
						<div class="row">

						  <div class="col-md-6">
							<div class="form-group">
							 
							<label for="title" style="font-weight:bold">
								新旧程度
							</label>
							<input name="newOld" type="text" class="form-control" placeholder="请填写您物品的新旧程度" />
							</div>
						  </div>

						  <div class="col-md-6">
							<div class="form-group">
							 
							<label for="title" style="font-weight:bold">
								期望交换的物品
							</label>
							<input name="wanted" type="text" class="form-control" placeholder="请在此处填写您期望交换的物品，多个物品请以;隔开" />
							</div>
						  </div>
						
						</div>

						<!--联系方式-->
						<label for="title" style="font-weight:bold">
								联系方式
						</label>
						<div class="row">
						  <div class="col-md-4">
							<div class="form-group">
							 
							<label for="title">
								QQ：
							</label>
							<input name="qq" type="text" class="form-control" placeholder="请在此处填写您的QQ号码" />
							<span style="font-style:italic;color:red;">* 以便其他用户与您联系</span>
							</div>
						  </div>
						  <div class="col-md-4">
							<div class="form-group">
							 
							<label for="title">
								手机号：
							</label>
							<input name="tel" type="text" class="form-control" placeholder="选填" />
							<span style="font-style:italic;color:pink;">以便其他用户与您联系(选填)</span>
							</div>
						  </div>
						  <div class="col-md-4">
							<div class="form-group">
							 
							<label for="title">
								城市
							</label>
							<input name="city" type="text" class="form-control" placeholder="请在此处填写您所在城市" />
							<span style="font-style:italic;color:red;">* 以便同城交换</span>
							</div>
						  </div>
						
						</div>
						<?php include('upload_file.php');?>
						<div class="form-group">
					 
							<label for="exampleInputFile">
								上传物品图片
							</label>
							<input type="file" name="file" class="form-control-file" id="exampleInputFile" />
						</div>
						<button name="submit" type="submit" class="btn btn-primary" value="submit">
							发布物品
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
	if(isset($_POST['submit'])){
		//echo"$title && $desc && $newOld && $wanted && $qq && $tel && $city && $result && username";
		$sql = "INSERT INTO good(title,descr,newOld,wanted,qq,tel,city,image,username) VALUES('$title','$desc','$newOld','$wanted','$qq','$tel','$city','$result','$username')";
		$res = mysql_query($sql);
		if(!$res){
			echo "<script>alert('插入失败!');</script>";
			echo "<script>history.go(-1);</script>";
			//echo $sql;
		}else{
			$sql = "select id from good where image='$result'";
			$res = mysql_query($sql);
			$row = mysql_fetch_assoc($res);
			$id = $row['id'];
			echo "<script>alert('插入成功!');window.location.href='showItem/index.php?id=$id';</script>";
		}
	}
?>
</body>
</html>