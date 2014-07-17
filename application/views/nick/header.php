<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="<?php echo base_url();?>"/>
   
    <title>Nick'website</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="public/css/flatly_bootstrap.min.css">
    <!-- logo -->
    <link rel="shortcut icon" href="public/img/favicon.png"> 
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="background">
    <div class="well">
      <div class="container"> 
        <h2>Nick'website 后台管理系统</h2>
        <div class="row">
          <div class="col-lg-8">
          </div>
          <div class="col-lg-2">
              <p><i class="glyphicon glyphicon-user"></i>管理员：<?php echo $this->session->userdata('u_name')?></p>
          </div>
            <div class="col-lg-2">
              <p><i class="glyphicon glyphicon-off"></i><a href="xieyanglin/login/login_out">退出登录</a></p>
          </div>
      </div>
    </div>
  </div>
  </div>
<!--后台管理-->
<div class="row">
    <div class="col-lg-2">
      <div class="row">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-10">
<div class="panel-group" id="accordion">

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
        后台
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse">
      <div class="panel-body">
        <a href="xieyanglin/nick/index" class="list-group-item ">后台首页</a>
        <a href="xieyanglin/nick/change" class="list-group-item ">修改密码</a>
      </div>
    </div>
  </div>
<div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
        博客
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        <a href="xieyanglin/blog/check" class="list-group-item ">查看文章</a>
       <a href="xieyanglin/blog/publish" class="list-group-item ">发表文章</a>
      </div>
    </div>
  </div>
<div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
        画廊
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
        <a href="xieyanglin/gallery/check_col" class="list-group-item ">查看分类</a>
         <a href="xieyanglin/gallery/add_col" class="list-group-item ">添加分类</a>
        <a href="xieyanglin/gallery/check" class="list-group-item ">查看图片</a>
        <a href="xieyanglin/gallery/upload" class="list-group-item ">上传图片</a>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
        前台
        </a>
      </h4>
    </div>
    <div id="collapseSix" class="panel-collapse collapse">
      <div class="panel-body">
       <a href="index/home/index" class="list-group-item ">前台首页</a>
        <a href="#" class="list-group-item ">换主题</a>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div><!-- col-lg-2  -->
<div class="col-lg-8">
