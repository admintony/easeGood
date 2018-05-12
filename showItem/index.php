<!DOCTYPE html>
<?php
	@include('../config/config.php');
	@include('../header.php');
	if(!isset($_GET['id']))
	{
		// 没有id参数
		echo "<script>alert('Error id!');window.location.href='../index.php';</script>";
		exit();
	}
	$id = $_GET['id'];
	$sql = "select * from good where id='$id'";
	$res = mysql_query($sql);
	$row = mysql_fetch_assoc($res);

	// 数据库不存在的id
	if(!$row){
		echo "<script>alert('Error id!');window.location.href='../index.php';</script>";
		exit();
	}
	
	// 留言显示 及 分页设置
	$page = isset($page) ? $page : '1';
	$sql = "select count(*) as num from message where pid=$id";
	$res = mysql_query($sql);
	if(!$res)
	{
		echo "<script>alert('数据库查询失败!');window.location.href='../index.php';</script>";
		exit();
	}
	$row1 = mysql_fetch_assoc($res);
	$page_max =(ceil($row1['num']/3)!=0) ? ceil($row1['num']/3):1;
	//echo "<script>alert($page_max);</scirpt>";
	if($page > $page_max)
	{
		echo "<script>alert('Page num illegal!');history.go(-1);</script>";
	}
	$offset = ($page-1)*3;
	$sql = "select * from message where pid=$id limit $offset,3";
	$res = mysql_query($sql);
	if(!$res){
		echo "<script>alert('数据库查询失败!');window.location.href='../index.php';</script>";
		exit();
	}
	$rows = array();
	while($row2 = mysql_fetch_assoc($res))
	{
		$rows[] = $row2;
	}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<!--留言板要引入的JS-->
	<link rel="stylesheet" href="bs/css/bootstrap.min.css">
	<script src="bs/js/jquery.min.js"></script>
	<script src="bs/js/bootstrap.min.js"></script>
	<script src="bs/js/holder.min.js"></script>
  </head>
  <body>

    <div class="container">
	
	<br>
	<div class="row">
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-12">
					<img alt="Bootstrap Image Preview" src=<?php echo '../'.$row['image'];?> class="img-thumbnail">
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<h3 class="text-center">
				<?php echo $row['title'];?>
			</h3>
			<p class="text-center lead">
				<?php echo $row['descr'];?>
			</p>
		</div>
	</div>
	
	<!--以下是期望等-->
	<br>
	<br>
	<div class="row">
		<div class="col-md-4">
			<div class="card">
				<h5 class="card-header">
					期望交换的物品
				</h5>
				<?php $wanted = explode(";",$row['wanted']);?>
				<div class="card-body">
					<?php foreach($wanted as $k=>$v){?>
					<p class="card-footer">
						<?php echo $v;?>
					</p>
					<?php }?>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-1">
				</div>
				<div class="col-md-11">
				  <div class="row">
				  	<div class="col-md-6">
					<address>
						 <strong>联系方式</strong><br><br>
						 <abbr title="QQ">QQ:</abbr> <?php echo $row['qq'];?> <br>
						 <abbr title="Phone">电话号码:</abbr> <?php $tel = empty($row['tel'])?'保密':$row['tel'];echo $tel;?><br>
						 <abbr title="City">城市:</abbr> <?php echo $row['city'];?><br><br>
					</address>
					</div>
					<div class="col-md-6">
					<address>
						<strong>上架时间:</strong><br>
						 <?php echo $row['insert_date'];?><br>
					</address>
					</div>
				  </div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-1">
				</div>
				<div class="col-md-11">
					 <a href="favorite.php?pid=<?php echo $id;?>" class="btn btn-secondary btn-lg btn-block" type="button">收藏物品</a> <a href="#message" class="btn btn-secondary btn-block btn-lg" type="button">发布留言</a>
				</div>
			</div>
		</div>
	</div>
	<br>
	<hr>
	<!--留言板-->
	<h2>留言板</h2>
	<div class="col-md-12">
			<?php if(!$rows){?>
			<div class="panel panel-primary">
				<div class="panel-body" style="height:120px;">
						还没有人留言，来抢第一个沙发吧...
				</div>
			</div>
			<?php }?>
			<?php foreach($rows as $k=>$v){?>

				<div class="panel panel-primary">
					<div class="panel-heading">
						<span class="glyphicon glyphicon-star"></span> 留言者：<?php echo $v['username'];?>
					</div>
					<div class="panel-body" style="height:120px;">
						<?php echo $v['content'];?>
					</div>
					<div class="panel-footer">
						<?php echo $v['insert_date'];?>
					</div>
				</div>

			<?php }?>
				<ul class="pager">
				  <li class="previous"><a href="index.php?id=<?php echo $id;?>">&larr; 首页</a></li>
				  <li><a href="index.php?id=<?php echo $id.'&page=';
					if($page>1){
						echo $page-1;
					}else{
						echo $page;
					}
				  ?>">上一页</a></li>
				  <li><a href="index.php?id=<?php echo $id.'&page=';
					if($page<$page_max){
						echo $page+1;
					}else{
						echo $page;
					}
				  ?>">下一页</a></li>
				  <li class="next"><a href="index.php?id=<?php echo $id.'&page='.$page_max;?>">末页 &rarr;</a></li>
				</ul>
	</div>
	<!--发表留言部分-->
	<div id="message" class="col-md-12">			
		<form role="form" action="addMes.php" method="post">
			<div class="form-group">
			    <label>留言内容</label>
				<textarea class="form-control" rows="11" name="content"></textarea>
				<input type="hidden" name="pid" value="<?php echo $id;?>">
			</div>
			<input type="submit" class="btn btn-default" value="发表留言">
		</form>
	</div>
  </div>

<br>
<br>



    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>