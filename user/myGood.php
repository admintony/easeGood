<?php 
	include('../config/config.php');
	session_start();
	if(!isset($_SESSION['username']))
	{
		die(Header('Location: '.$basedir.'user/login.php'));
	}
	$username = $_SESSION['username'];
	$sql = "select * from good where username='$username' order by id desc";
	$res = mysql_query($sql);
	$rows_table = array();
	while($row_table=mysql_fetch_assoc($res))
	{
		$rows_table[]=$row_table;
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
		<?php foreach($rows_table as $k=>$v){?>
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
				<a href="delGood.php?id=<?php echo $v['id'];?>" class="btn btn-default" title="删除" onclick="return confirm('是否删除？');"><span class="fa fa-trash-o"></span> 删除</a>
			</td>
		</tr>
		<?php }?>
	</tbody></table>
</div><!-- /.box-body -->