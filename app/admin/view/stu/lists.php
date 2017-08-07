<?php include './view/admin/header.php'?>

<div class="container">
    <div class="row">
        <?php include './view/admin/left.php'?>
        <div class="col-xs-9">
           <a href="?s=admin/stu/lists" class="btn btn-primary">列表</a>
            <a href="?s=admin/stu/store" class="btn btn-default">添加</a>
            <hr>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>姓名</th>
                    <th>班级</th>
                    <th>性别</th>
                    <th>生日</th>
                    <th>头像</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data as $v): ?>
                    <tr>
                        <td><?php echo $v['sid'] ?></td>
                        <td><?php echo $v['sname'] ?></td>
                        <td><?php echo $v['gname'] ?></td>
                        <td><?php echo $v['sex'] ?></td>
                        <td><?php echo $v['birthday'] ?></td>
                        <td><img src="<?php echo $v['profile'] ?>" width="80" /></td>
                        <td>
                            <a href="?s=admin/stu/update&sid=<?php echo $v['sid']?>" class="btn btn-info">编辑</a>
                            <a class="btn btn-danger" href="?s=admin/stu/remove&sid=<?php echo $v['sid']?>">删除</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        </body>
        </html>
    </div>
</div>
</body>
</html>