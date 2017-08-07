<?php include './view/admin/header.php'?>

<div class="container">
    <div class="row">
        <?php include './view/admin/left.php'?>
        <div class="col-xs-9">
           <a href="?s=admin/grade/lists" class="btn btn-primary">列表</a>
            <a href="?s=admin/grade/store" class="btn btn-default">添加</a>
            <hr>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>班级名称</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data as $v): ?>
                    <tr>
                        <td><?php echo $v['gid'] ?></td>
                        <td><?php echo $v['gname'] ?></td>
                        <td>
                            <a href="?s=admin/grade/update&gid=<?php echo $v['gid']?>" class="btn btn-info">编辑</a>
                            <a class="btn btn-danger" href="?s=admin/grade/remove&gid=<?php echo $v['gid']?>">删除</a>
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