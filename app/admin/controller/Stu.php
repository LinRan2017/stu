<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/8/1
 * Time: 20:35
 */

namespace app\admin\controller;


use houdunwang\core\Controller;
use houdunwang\model\Model;
use houdunwang\view\View;
use system\model\Grade;
use system\model\Material;
use system\model\Stu as ModelStu;
class stu extends Common {
    public function lists(){
        $data=Model::q('SELECT * FROM stu s JOIN grade g ON s.gid=g.gid');
        return View::make()->with(compact('data'));
    }
    public function  store(){
        if (IS_POST){
            if(isset($_POST['hobby'])){
                $_POST['hobby']=implode(',',$_POST['hobby']);
            }

            ModelStu::save($_POST);
            //p($_POST); exit;
            return $this->success('添加成功')->setRedirect('?s=admin/stu/lists');
        }
        $gradeData=Grade::get();
        $materialData=Material::get();
        return View::make()->with(compact('gradeData','materialData'));
    }

    public function remove(){
        $sid=$_GET['sid'];
        ModelStu::where("sid={$sid}")->destory();
        return $this->success('删除登录')->setRedirect('?s=admin/stu/lists');
    }
    public function update(){
        $sid=$_GET['sid'];
        if (IS_POST){
            if(isset($_POST['hobby'])){
                $_POST['hobby']=implode(',',$_POST['hobby']);
            }
            ModelStu::where("sid={$sid}")->update($_POST);
            return $this->success('编辑成功')->setRedirect('?s=admin/stu/lists');
        }
        $gradeData=Grade::get();
        $materialData=Material::get();
        $oldData=ModelStu::find($sid);
       // p($oldData);exit;
        $oldData['hobby']=explode(',',$oldData['hobby']);
        return View::make()->with(compact('gradeData','materialData','oldData'));

    }
}