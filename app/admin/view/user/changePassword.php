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
<div class="container" style="margin-top: 50px; width: 700px;">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">修改密码</h3>
        </div>
        <div class="panel-body">
            <form action="" method="post" role="form">

                <div class="form-group">
                    <label  for="">旧密码</label>
                    <input type="password" class="form-control" name="oldPassword" id=""  required="required">
                </div>
                <div class="form-group">
                    <label for="">密码</label>
                    <input type="password" class="form-control" name="newPassword" id=""  required="required">
                </div>
                <div class="form-group">
                    <label for="">确认密码</label>
                    <input type="password" class="form-control" name="confirmPassword" id=""  required="required">
                </div>
                <button type="submit" class="btn btn-primary">修改</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>