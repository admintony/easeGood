<?php
	//Header('Content-type:text/html;charset=utf-8');
	@include('../config/config.php');
	if(!isset($_SESSION['username']))
	{
		die(Header('Location: '.$basedir.'user/login.php'));
	}
	$username = $_SESSION['username'];
	$sql = "select * from favorite where username='$username'";
	$res = mysql_query($sql);
	//var_dump($res);
	$rows_table1 = array();
	while($row_table1 = mysql_fetch_assoc($res))
	{
		$rows_table1[]=$row_table1;
	}
?>

<div class="box-body">
 <table class="table table-bordered">
		<tbody><tr>
			<th style="width: 10px">#</th>
			<th>标题</th>
			<th>内容概括</th>
			<th>发布日期</th>
			<th style="width: 20%">操作</th>
		</tr>
		<?php foreach($rows_table1 as $k=>$v1){
			$pid = $v1['pid'];
			$sql = "select * from good where id=$pid";
			//echo '<script>alert(\''.$sql.'\');</script>';
			$res = mysql_query($sql);
			$v = mysql_fetch_assoc($res);
			?>
		<tr>
			<td><?php echo $v['id'];?></td>
			<td><?php echo $v['title']?></td>
			<td><?php
				if(strlen($v['descr'])>84){
					echo substr($v['descr'],0,84).'...';
				}else{
					echo $v['descr'];
				}
			?></td>
			<td><?php echo $v['insert_date'];?></td>
			<td>
				<a href="../showItem/index.php?id=<?php echo $v['id'];?>" class="btn btn-default" title="编辑"><span class="fa fa-edit"></span> 查看</a>
				<a href="delFavo.php?id=<?php echo $v1['id'];?>" class="btn btn-default" title="删除" onclick="return confirm('是否取消收藏？');"><span class="fa fa-trash-o"></span> 取消收藏</a>
			</td>
		</tr>
		<?php }?>
	</tbody></table>
</div><!-- /.box-body -->