<form action="xieyanglin/gallery/add_col_sure" method="post" enctype="multipart/form-data">
<table class="table">
	<h2 class="text-center"><font><font>添加分类</font></font></h2>
		 <div class="control-group">
          <label class="control-label">封面</label>
          <!-- File Upload -->
          <div class="controls">
            <input class="input-file" id="fileInput" type="file" name="picture">
          </div>
        <br>
        </div> 
        <div class="control-group">
          <label class="control-label">介绍</label>
          <!-- File Upload -->
          <div class="controls">
            <input class="form-control" type="text" name="info">
          </div>
          <br>
        </div>
        <div class="control-group">
          <label class="control-label">类名</label>
		<input  class="form-control" type="text" name="name" value="<?php echo set_value('name');?>">
			<?php echo form_error('name','<h4 class="text-danger">','</h4>') ;?>
			  </div> 
	</table>
<button class="btn btn-success btn-lg pull-right" type="submit">添加</button>	
</form>

