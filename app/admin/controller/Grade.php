<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/8/1
 * Time: 20:31
 */

namespace app\admin\controller;


use houdunwang\core\Controller;
use houdunwang\view\View;
use system\model\Grade as GradeModel;
class Grade extends Common {
    public function lists(){
        $data=GradeModel::get();
        return View::make()->with(compact('data'));
    }
    public function store(){
        if (IS_POST){
            GradeModel::save($_POST);
            return $this->success('添加成功')->setRedirect('?s=admin/grade/lists');
        }
        return View::make();
    }
    public function update(){
        $gid=$_GET['gid'];
        if (IS_POST){
            GradeModel::where("gid={$gid}")->update($_POST);
            return $this->success('添加成功')->setRedirect('?s=admin/grade/lists');
        }
        $oldData=GradeModel::find($gid);
        return View::make()->with(compact('oldData'));
    }
    public function remove(){
        $gid=$_GET['gid'];
        GradeModel::where("gid={$gid}")->destory();
        return $this->success('删除成功')->setRedirect('?s=admin/grade/lists');
    }
}