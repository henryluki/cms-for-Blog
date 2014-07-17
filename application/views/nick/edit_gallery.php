<form action="xieyanglin/gallery/edit_col_sure" method="post" enctype="multipart/form-data">
<table class="table">
	<h2 class="text-center"><font><font>修改分类</font></font></h2>
         <div>
          <p class="control-label">封面</p>
          <!-- File Upload -->
          <img src="<?php echo $row[0]['gc_thumb']?>" width="240px"/>
        </div>
     <div>
        <p>介绍</p>
        <input  class="form-control" type="text" name="info" value="<?php echo $row[0]['gc_info'] ;?>">
    </div>
    <div>
		 <p>类名</p>
		<input  class="form-control" type="text" name="name" value="<?php echo $row[0]['gc_name'] ;?>">
			<?php echo form_error('name','<h4 class="text-danger">','</h4>') ;?>
		</div>
		<input type="hidden" name="id" value="<?php echo $row[0]['gc_id'] ;?>"/>
		<td><button class="btn btn-success" type="submit">修改</button></td>
</table>
</form>

