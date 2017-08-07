<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./static/bt3/css/bootstrap.min.css" />
    <script src="./static/js/jquery.min.js"></script>
    <script src="./static/bt3/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
<div class="col-xs-9"></div>
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
            <ul class="nav navbar-nav">
                <li <?php if(CONTROLLER=='grade'): ?> class="active" <?php endif; ?>><a href="?s=admin/grade/lists">班级 <span class="sr-only">(current)</span></a></li>
                <li <?php if(CONTROLLER=='material'): ?> class="active" <?php endif; ?>><a href="?s=admin/material/lists">素材</a></li>
                <li <?php if(CONTROLLER=='stu'): ?> class="active" <?php endif; ?>><a href="?s=admin/stu/lists">学生</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="?">返回前台</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['user']['username'] ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="?s=admin/user/changePassword">修改密码</a></li>
                        <li><a href="?s=admin/login/out">退出</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
