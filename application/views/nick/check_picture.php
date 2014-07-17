<form action="" method="">
	<h2 class="text-center"><font><font>查看图片</font></font></h2>
<table class="table table-condensed text-center">	
	 <tr class="success ">
		<td>图片</td>
		<td>图片id</td>
		<td>上传时间</td>
		<td>图片介绍</td>
		<td>栏目</td>
		<td>操作</td>
	</tr>
	<br>
	<?php foreach ($row as $v):?>
	 <tr class="tablestyle">
		<td><img src="<?php echo $v['p_name'];?> " width="240"/></td>
		<td><?php echo $v['p_id'] ;?></td>
		<td><?php echo date('y-m-d',$v['p_time']) ;?></td>
		<td><?php echo $v['p_info'] ;?></td>
		<td><?php echo $v['gc_name'] ;?></td>
		<td>
		[<a href="<?php echo site_url('xieyanglin/gallery/edit/'.$v['p_id'] ) ;?>">编辑</a>]&nbsp;
        [<a href="<?php echo site_url('xieyanglin/gallery/delete/'.$v['p_id'] );?>">删除</a>]
        </td>
	</tr>
<?php endforeach ;?>
</table>
</form>
<div class="text-center">
<?php echo $links;?>
</div> 
  


	