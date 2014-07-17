 <div class="container">
      <div class="starter-template">
        <h2 class="text-success">欢迎登陆到后台模板<br> 尽量完善下后端代码吧，亲爱的管理员！</h2>
        <p class="lead">登录时间：<?php echo date('y年m月d日 H:i:s',$this->session->userdata('logintime'))?><br>
        	</p>
          <h3 class="lead ">请注意：</h3>
           <h4 class="text-danger">1.图片上传大小不要大于1M 。发文章，上传的缩略图越小越好。</h4>
           <h4 class="text-danger">2.因为图片过大服务器提示报错后请关闭重先上传。</h4>
          <h4 class="text-danger">3.修改文章，请选择不同的图片做缩略图，因为上传同样的图片会掩盖前面的路径，因此其前台将不会显示该图片。</h4>
           <h4 class="text-danger">3.发表文章，若有图片发表需求，用编辑器上传请不要修改图片大小，css已设置图片自适应宽度大小。</h4>

      </div>

    </div><!-- /.container -->