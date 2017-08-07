<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="static/bt3/css/bootstrap.min.css" />
    <title>Document</title>
</head>
<body>
<div>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">学生管理系统</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="?s=home/entry/index">返回首页</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</div>
<div class="container" style="margin-top: 50px; width: 700px;">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">后台登录</h3>
        </div>
        <div class="panel-body">
            <form action="" method="post" role="form">

                <div class="form-group">
                    <label  for="">用户名</label>
                    <input type="text" class="form-control" name="username" id="" placeholder="用户名" required="required">
                </div>
                <div class="form-group">
                    <label for="">密码</label>
                    <input type="password" class="form-control" name="password" id="" placeholder="密码" required="required">
                </div>
                <div class="form-group">
                    <label for="">验证码</label>
                    <input type="text" class="form-control" name="captcha" id="" placeholder="验证码" required="required">
                    <br/>
                    <img src="?s=admin/login/captcha" onclick="this.src=this.src+'&mt='+Math.random()" />
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="autologin">
                        七天免登录
                    </label>
                </div>

                <button type="submit" class="btn btn-primary">登录</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>