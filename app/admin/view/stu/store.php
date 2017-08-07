<?php include './view/admin/header.php'?>

<div class="container">
    <div class="row">
        <?php include './view/admin/left.php'?>
        <div class="col-xs-9">
            <a href="?s=admin/stu/lists" class="btn btn-default">列表</a>
            <a href="?s=admin/stu/store" class="btn btn-primary">添加</a>
            <hr>
            <form action="" method="post" class="form-horizontal" role="form">
                <div class="form-group">
                    <label for="inputID">学生名称:</label>
                    <div>
                        <input type="text" name="sname" id="inputID" class="form-control" value="" title="" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputID">班级:</label>
                    <div>
                        <select name="gid" class="form-control" id="inputID">
                            <option>请选择</option>
                            <?php foreach ($gradeData as $v): ?>
                            <option value="<?php echo $v['gid']?>"><?php echo $v['gname']?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                </div>
                <div class="form-group">

                    <label for="">头像：</label>
                    <hr>
                    <?php foreach($materialData as $m): ?>
                        <img class="profile" src="<?php echo $m['path'] ?>" width="80">
                    <?php endforeach ?>
                    <script>
                        $(function(){
                            $('.profile').click(function(){
                                $(this).css({border:'2px solid red'}).siblings('img').css({border:'none'});
                                $('[name=profile]').val($(this).attr('src'));
                            })
                        })
                    </script>
                    <input type="hidden" name="profile">
                </div>
                <div class="form-group">
                    <label for="inputID">性别:</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="sex" value="男" checked="checked" id="inputID" />
                            男
                        </label>
                        <label>
                            <input type="radio" name="sex" value="女"  id="inputID" />
                            女
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputID">生日:</label>
                    <input type="date" name="birthday" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="inputID">爱好:</label>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="hobby[]" value="篮球" />
                            篮球
                        </label>
                        <label>
                            <input type="checkbox" name="hobby[]" value="足球" />
                            足球
                        </label>
                        <label>
                            <input type="checkbox" name="hobby[]" value="乒乓球" />
                            乒乓球
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">添加</button>
                </div>
            </form>

        </div>
        </body>
        </html>
    </div>
</div>
</body>
</html>