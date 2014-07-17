<form role="form" method="post" action="xieyanglin/gallery/edit_sure" enctype="multipart/form-data">
    <fieldset>
      <div id="legend" class="">
        <h2 class="text-center"><font><font>编辑图片信息</font></font></h2>
      </div>
      <img src="<?php echo $picture[0]['p_name']?>" width="240"/>
      <br>
    <div class="control-group">
         <div class="control-group">
          <label class="control-label" >图片信息</label>
          <!-- File Upload -->
          <div class="controls">
            <input name="p_info" type="text" class="form-control" value="<?php echo $picture[0]['p_info'];?>">
          <?php echo form_error('p_info','<p class="text-danger">','</p>');?>
          </div>
        </div> 
        <br>
    <div class="control-group">
          <label class="control-label">上传至</label>
         <!--  //在最下面纠结好久 -->
          <select name="gc_id">
          <?php foreach ($row as $r) :?>
           <option value="<?php echo $r['gc_id']?>" <?php echo set_select('gc_id',$r['gc_id'])?>>
            <?php echo $r['gc_name']?>
           </option>
         <?php endforeach;?>
        </select>
      </div>
      <br>
       <input type="hidden" name="p_id" value="<?php echo $picture[0]['p_id'] ;?>"/>     
        <button type="submit" class="btn btn-success btn-sm">修改</button>
    </fieldset>
  </form>