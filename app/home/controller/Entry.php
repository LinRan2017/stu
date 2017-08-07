<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/7/28
 * Time: 22:36
 */
//命名空间的名字要和文件所在的目录的路径一样，防止多个类名重复
namespace app\home\controller;
//使用houdunwang\core\Controller类，才能调用此类
use houdunwang\core\Controller;
//使用houdunwang\core\Model类，才能调用此类
use houdunwang\model\Model;
//使用houdunwang\core\View类，才能调用此类
use houdunwang\view\View;
use Gregwar\Captcha\CaptchaBuilder;
//创建处理首页，添加，删除等操作的类，继承父级类
class Entry extends Controller{
    //创建公共方法，显示首页
    public function index(){
        $data=Model::q('SELECT * FROM stu s JOIN grade g ON s.gid=g.gid');
        return View::make()->with(compact('data'));
    }
    //进入学生详细信息
    public function show(){
        $sid=$_GET['sid'];
        $data=Model::q('SELECT * FROM stu s JOIN grade g ON s.gid=g.gid WHERE sid='.$sid);
        $data=current($data);
        return View::make()->with(compact('data'));
    }
    //创建验证码类
    public function captcha(){
        //发送头部
        header('Content-type: image/jpeg');
        //实例化验证码对象
        $builder=new CaptchaBuilder();
        //
        $builder->build();
        $builder->output();
        //把验证码的值存储到session里
        $_SESSION['phrase']=$builder->getPhrase();
        }

}