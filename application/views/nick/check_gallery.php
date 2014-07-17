<form action="" method="">
<table class="table">
	<h2 class="text-center"><font><font>查看分类</font></font></h2>
	<tr>
	<tr>
		<td>gc_id</td>
		<td>分类名称</td>
		<td>操作</td>
	</tr>
	<!--$row 再用foreach 是指每一行？   -->
	<?php foreach ($row as $v):?>
	<tr>
		<td><?php echo $v['gc_id'] ;?></td>
		<td><?php echo $v['gc_name'] ;?></td>
		<td>
            [<a href="<?php echo site_url('xieyanglin/gallery/edit_col/'.$v['gc_id'] );?>">编辑</a>]
            [<a href="<?php echo site_url('xieyanglin/gallery/delete_col/'.$v['gc_id'] );?>">删除</a>]
		</td>
	</tr>
<?php endforeach ;?>
</table>
</form>

