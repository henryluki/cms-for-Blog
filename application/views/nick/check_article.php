<form action="" method="">
<table class="table">
	<h2 class="text-center"><font><font>查看文章</font></font></h2>
	<tr>
		<td>a_id</td>
		<td>发表时间</td>
		<td>文章标题</td>
		<td>操作</td>
	</tr>
	<!--$row 再用foreach 是指每一行？   -->
	<?php foreach ($row as $v):?>
	<tr>
		<td><?php echo $v['a_id'] ;?></td>
		<td><?php echo date('y-m-d',$v['a_time']) ;?></td>
		<td><?php echo $v['a_title'] ;?></td>
		<td>
            [<a href="<?php echo site_url('xieyanglin/blog/edit/'.$v['a_id'] ) ;?>">编辑</a>]
            [<a href="<?php echo site_url('xieyanglin/blog/delete/'.$v['a_id'] );?>">删除</a>]
		</td>
	</tr>
<?php endforeach ;?>
</table>
</form>
<div class="text-center">
<?php echo $links;?>
</div>
