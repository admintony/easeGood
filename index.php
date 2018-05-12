<?php include './config/config.php';
?>
<!DOCTYPE html>
<?php include('./header.php');?>

<?php
	/*
	* 从good表中查询信息并显示在主页
	* 每页显示6条记录，轮播图只显示最新的3条
	*/

	// 1.先查询轮播图的信息
	$sql = 'select * from good order by id desc limit 0,3';
	$res = mysql_query($sql);
	if(!$res){
		echo "<script>alert('数据库查询出错，请检查数据库配置!');</script>";
		exit();
	}
	$rows=array();
	while($row=mysql_fetch_assoc($res))
	{
		$rows[] = $row;
	}

	// 2.每页显示的条数
	$page = isset($_GET['page']) ? $_GET['page'] : '1';
	$offset = ($page-1) * 6;
	$sql = "select * from good order by id desc limit $offset,6";
	$res = mysql_query($sql);
	if(!$res)
	{
		echo "<script>alert('数据库查询出错，请检查数据库配置!');</script>";
		exit();
	}
	$card_rows = array();
	while($row=mysql_fetch_assoc($res))
	{
		$card_rows[] = $row;
	}

	// 3.翻页 - 从数据库中查出所有的记录数量，然后/6 = pageMax
	$sql = "select count(*) as num from good";
	$res = mysql_query($sql);
	if(!$res)
	{
		echo "<script>alert('数据库查询出错，请检查数据库配置!');</script>";
		exit();
	}
	$row = mysql_fetch_assoc($res);
	$pageMax = ceil($row['num']/6);
	
?>
<html lang="en">
  <head>
	<script>
		// 将内容复制到粘贴板代码
		function copyToClipboard(elem) {
		// create hidden text element, if it doesn't already exist
		var targetId = "_hiddenCopyText_";
		var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
		var origSelectionStart, origSelectionEnd;
		if (isInput) {
		// can just use the original source element for the selection and copy
		target = elem;
		origSelectionStart = elem.selectionStart;
		origSelectionEnd = elem.selectionEnd;
		} else {
		// must use a temporary form element for the selection and copy
		target = document.getElementById(targetId);
		if (!target) {
		var target = document.createElement("textarea");
		target.style.position = "absolute";
		target.style.left = "-9999px";
		target.style.top = "0";
		target.id = targetId;
		document.body.appendChild(target);
		}
		target.textContent = elem.textContent;
		}
		// select the content
		var currentFocus = document.activeElement;
		target.focus();
		target.setSelectionRange(0, target.value.length);
		// copy the selection
		var succeed;
		try {
		succeed = document.execCommand("copy");
		} catch(e) {
		succeed = false;
		}
		// restore original focus
		if (currentFocus && typeof currentFocus.focus === "function") {
		currentFocus.focus();
		}
		if (isInput) {
		// restore prior selection
		elem.setSelectionRange(origSelectionStart, origSelectionEnd);
		} else {
		// clear temporary content
		target.textContent = "";
		}
		return succeed;
		}
		 
	</script>
  </head>
  <body>
    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="carousel slide" id="carousel-37000">
				<ol class="carousel-indicators">
					<li data-slide-to="0" data-target="#carousel-37000" class="active">
					</li>
					<li data-slide-to="1" data-target="#carousel-37000">
					</li>
					<li data-slide-to="2" data-target="#carousel-37000">
					</li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block w-100" height="500px" width="500px" alt="Carousel Bootstrap First" src="<?php echo $rows[0]['image'];?>" />
						<div class="carousel-caption">
							<h4>
								<?php echo $rows[0]['title'] ;?>
							</h4>
							<p>
								<?php echo $rows[0]['descr'] ;?>
							</p>
						</div>
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" height="500px" width="500px" alt="Carousel Bootstrap Second" src="<?php echo $rows[1]['image'];?>" />
						<div class="carousel-caption">
							<h4>
								<?php echo $rows[1]['title'] ;?>
							</h4>
							<p>
								<?php echo $rows[1]['descr'] ;?>
							</p>
						</div>
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" height="500px" width="500px" alt="Carousel Bootstrap Third" src="<?php echo $rows[2]['image'];?>" />
						<div class="carousel-caption">
							<h4>
								<?php echo $rows[2]['title'] ;?>
							</h4>
							<p>
								<?php echo $rows[2]['descr'] ;?>
							</p>
						</div>
					</div>
				</div> <a class="carousel-control-prev" href="#carousel-37000" data-slide="prev"><span class="carousel-control-prev-icon"></span> <span class="sr-only">Previous</span></a> <a class="carousel-control-next" href="#carousel-37000" data-slide="next"><span class="carousel-control-next-icon"></span> <span class="sr-only">Next</span></a>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<?php foreach($card_rows as $k => $v){?>
				<div class="col-md-4">
					<div class="card">
						<img class="card-img-top" alt="Bootstrap Thumbnail First" src="<?php echo $v['image']?>" height="200px" />
						<div class="card-block">
							<h5 class="card-title">
								<?php echo $v['title'];?>
							</h5>
							<p class="card-text">
								<?php
									if(strlen($v['descr'])>108){
										echo substr($v['descr'],0,108).'...';
									}else{
										echo $v['descr'];
									}
								?>
							</p>
							<p>
								<a class="btn btn-primary" href="<?php echo 'showItem/index.php?id='.$v['id'];?>">查看</a> <a id="modal-456943" href="#modal-container-456943" role="button" class="btn" data-toggle="modal">分享</a>
			
								<div class="modal fade" id="modal-container-456943" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="myModalLabel">
													分享给好友
												</h5> 
												<button type="button" class="close" data-dismiss="modal">
													<span aria-hidden="true">×</span>
												</button>
											</div>
											<div class="modal-body">
												<script type="text/javascript">
												function copyTextAreaCt()
													{
														var oContent=document.getElementById("content");
														oContent.select(); // 选择对象
														document.execCommand("Copy"); // 执行浏览器复制命令
														alert("分享链接已经复制到您的粘贴板中了。");
													}
												</script>
												<textarea cols="50" rows="5" id="content" value=""><?php echo $basedir.'showItem/?id='.$v['id'];?></textarea>
											</div>
											<div class="modal-footer">
												<button type="button" onClick="copyTextAreaCt()" class="btn btn-primary">
													复制链接到粘贴板
												</button> 
												<button type="button" class="btn btn-secondary" data-dismiss="modal">
													关闭
												</button>
											</div>
										</div>										
									</div>						
								</div>
							</p>
						</div>
					</div>
				</div>
				<?php }?>
								
			</div>
			<nav>
			<br>
				<ul class="pagination justify-content-center">
					<li class="page-item">
						<a class="page-link first-child" href="index.php">首页</a>
					</li>
					<li class="page-item">
						<a class="page-link" href="<?php 
						if($page>1){
							echo 'index.php?page='.($page-1);
						}else{
							echo 'index.php';
						}
						?>">上一页</a>
					</li>
					<li class="page-item">
						<a class="page-link" href="<?php 
						if($page<$pageMax){
							echo 'index.php?page='.($page+1);
						}else{
							echo 'index.php?page='.$pageMax;
						}
						?>">下一页</a>
					</li>
					<li class="page-item">
						<a class="page-link last-child" href="<?php echo 'index.php?page='.$pageMax;?>">尾页</a>
					</li>
				</ul>
				<!--<ul class="pager">
				  <li class="previous"><a href="#">&larr; 首页</a></li>
				  <li><a href="#">上一页</a></li>
				  <li><a href="#">下一页</a></li>
				  <li class="next"><a href="#">末页 &rarr;</a></li>
				</ul>-->
			</nav>
		</div>
	</div>
</div>

    
  </body>
</html>