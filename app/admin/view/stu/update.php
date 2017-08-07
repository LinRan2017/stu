<?php include './view/admin/header.php'?>

<div class="container">
    <div class="row">
        <?php include './view/admin/left.php'?>
        <div class="col-xs-9">
            <a href="?s=admin/stu/lists" class="btn btn-default">列表</a>
            <a href="?s=admin/stu/store" class="btn btn-default">添加</a>
            <hr>
            <form action="" method="post" class="form-horizontal" role="form">
                <div class="form-group">
                    <label for="inputID">学生名称:</label>
                    <div>
                        <input type="text" name="sname" id="inputID" class="form-control" value="<?php echo $oldData['sname']?>" title="" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputID">班级:</label>
                    <div>
                        <select name="gid" class="form-control" id="inputID">
                            <option>请选择</option>
                            <?php foreach ($gradeData as $v): ?>
                                <option value="<?php echo $v['gid']?>" <?php if($oldData['gid']==$v['gid']):?> selected <?php endif; ?>><?php echo $v['gname']?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                </div>
                <div class="form-group">

                    <label for="">头像：</label>
                    <hr>
                    <?php foreach($materialData as $m): ?>
                        <img class="profile" src="<?php echo $m['path'] ?>" <?php if($oldData['profile']==$m['path']): ?> style="border: 2px solid red;" <?php endif;?> width="80">
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
                            <input type="radio" name="sex" value="男" <?php if($oldData['sex']=='男'): ?> checked="checked" <?php endif; ?> id="inputID" />
                            男

                        </label>
                        <label>
                            <input type="radio" name="sex" value="女" <?php if($oldData['sex']=='女'): ?> checked="checked" <?php endif; ?>  id="inputID" />
                            女
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputID">生日:</label>
                    <input type="date" name="birthday" value="<?php echo $oldData['birthday']?>" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="inputID">爱好:</label>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="hobby[]" <?php if (in_array('篮球',$oldData['hobby'])): ?> checked="checked"  <?php endif; ?>  value="篮球" />
                            篮球
                        </label>
                        <label>
                            <input type="checkbox" name="hobby[]" <?php if (in_array('足球',$oldData['hobby'])): ?> checked="checked"  <?php endif; ?> value="足球" />
                            足球
                        </label>
                        <label>
                            <input type="checkbox" name="hobby[]" <?php if (in_array('乒乓球',$oldData['hobby'])): ?> checked="checked"  <?php endif; ?> value="乒乓球" />
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