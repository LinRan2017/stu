<?php include './view/admin/header.php'?>

<div class="container">
    <div class="row">
        <?php include './view/admin/left.php'?>
        <div class="col-xs-9">
            <a href="?s=admin/grade/lists" class="btn btn-default">列表</a>
            <a href="?s=admin/grade/store" class="btn btn-primary">添加</a>
            <hr>
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
                <div class="form-group">
                    <label for="inputID">图片:</label>
                    <div>
                        <input type="file" name="upload" id="inputID" class="form-control" value="" title=""
                               required="required">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">上传图片</button>
                </div>
            </form>

        </div>
        </body>
        </html>
    </div>
</div>
</body>
</html>