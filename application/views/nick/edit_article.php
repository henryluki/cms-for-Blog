<script type="text/javascript" src="public/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="public/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" src="public/ueditor/lang/zh-cn/zh-cn.js"></script>
<style type="text/css">
#include{
  overflow: scroll;
  max-height: 400px;
}
</style>
<script>
   var editor=UE.getEditor('editor')
</script>
<form action="xieyanglin/blog/edit_sure" method="post" enctype="multipart/form-data">
    <fieldset>
      <div id="legend" class="">
        <legend class="text-center"><font><font>编辑文章</font></font></legend>
      </div>
    

    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01"><font><font>标题</font></font></label>
          <div class="controls">
            <input type="text" class="form-control" name="title" value="<?php echo $row[0]['a_title'];?>">
            <?php echo form_error('title','<p class="text-danger">','</p>');?>
            <p class="help-block"></p>
          </div>
        </div>
        <div class="control-group">

          <!-- Textarea -->
          <label class="control-label"><font><font>摘要</font></font></label>
          <textarea id="content"class="form-control" rows="2"  name="info" value="">
          <?php echo $row[0]['a_info'];?>
          </textarea>
           <?php echo form_error('info','<p class="text-danger">','</p>');?>
        </div>

        <div class="control-group">

          <!-- Textarea -->
          <label class="control-label"><font><font>内容</font></font></label>
          <!--用ueditor进行文本编辑-->
          <div id="include">
        <textarea id="editor" name="content" value=""> 
          <?php echo $row[0]['a_content'];?></textarea>
        <?php echo form_error('content','<p class="text-danger">','</p>');?>
      </div>
      </div>
    <div class="control-group">

          <label class="control-label"><font><font>图片</font></font></label>

          <!-- File Upload -->
          <div class="controls">
            <input class="input-file" id="fileInput" type="file" name="thumb">
          </div>
        </div> 
       <!--  <button class="btn btn-success btn-sm">上传</button> -->
    <input type="hidden" name="id" value="<?php echo $row[0]['a_id'] ;?>"/>    
    </fieldset>
      <div class="row">
          <div class="col-lg-9">
          </div>
        <div class="col-lg-3">
       <button type="submit" class="btn btn-primary btn-block">发表</button>
     </div>
   </div>
  </form>
