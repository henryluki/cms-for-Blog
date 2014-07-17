<!DOCTYPE html>
<html lang="zh-cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="<?php echo base_url();?>"/>
   
    <title>Nick' website</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="public/css/flatly_bootstrap.min.css">
    <!-- Custom styles for this template -->
    <link href="public/css/login.css" rel="stylesheet">
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
     <div class="container">
      <h2 class="text-center"><strong>Nick'&nbsp; website后台登陆</strong></h2><br>
           <form class="form-horizontal" role="form" action="xieyanglin/login/login_in" method="post">
            <div class="form-group">
              <label class="col-sm-4 control-label">用户名</label>
              <div class="col-sm-4">
                <input name="name" type="text" class="form-control"  placeholder="用户名"  required autofocus>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword" class="col-sm-4 control-label">密码</label>
              <div class="col-sm-4">
                <input name="password" type="password" class="form-control" id="inputPassword" placeholder="密码" required>
              </div>
            </div>
         <!--   <div class="form-group">
              <label class="col-sm-4 control-label">验证码</label>
              <div class="col-sm-2">
                <input name="captcha"type="text" class="form-control"  placeholder="验证码"  required>
              </div>
               <div class="col-sm-2">
              <--  <?php echo $cap['image']?>-->                    
             <div class="form-group">
              <div class="col-sm-4">
              </div>
               <div class="col-sm-4">
             <button type="submit" class="btn btn-success btn-block">登录</button>
           </div>
           </div>
          </form>

    </div> <!-- /container -->
     <hr>
      <div class="footer">
         <h4 class="text-center">&copy; Copyright &nbsp;<strong>Nick </strong>&nbsp;All rights Reserved 2014</h4>
      </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="public/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="public/js/bootstrap3.0.js"></script>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
