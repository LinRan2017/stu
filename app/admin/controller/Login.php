<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/8/2
 * Time: 21:35
 */

namespace app\admin\controller;


use houdunwang\core\Controller;
use houdunwang\view\View;
use Gregwar\Captcha\CaptchaBuilder;
use system\model\User;
//登录页面
class Login extends Controller {
    public function index(){
        //先在数据库里存储密码和用户名
        //$password=password_hash('admin888',PASSWORD_DEFAULT);
        //echo $password;
       if (IS_POST){
           //判断验证码是否正确
           if ($_POST['captcha']!=$_SESSION['captcha']){
               return $this->error('验证码错误');
           }
           //判断用户名是否存在
           $data=User::where("username='{$_POST['username']}'")->get();
           if (!$data){
               return $this->error('用户名不存在');
           }
           //验证密码
           if (!password_verify($_POST['password'],$data[0]['password'])){
               return $this->error('密码错误');
           }
           //七天免登录
           if (isset($_POST['autologin'])){
               setcookie(session_name(),session_id(),time()+7*24*3600,'/');
           }else{
               setcookie(session_name(),session_id(),0,'/');
           }
           //登录凭证
           $_SESSION['user']=[
               'uid'=>$data[0]['uid'],
               'username'=>$data[0]['username']
           ];
           return $this->success('登录成功')->setRedirect('?s=admin/entry/index');
       }

        return View::make();
    }
    //创建验证码类
    public function captcha(){
        //发送头部
        header('Content-type: image/jpeg');
        //实例化验证码对象
        $builder=new CaptchaBuilder();
        $builder->build();
        $builder->output();
        //把验证码的值存储到session里
        $_SESSION['captcha']=$builder->getPhrase();
    }

    //退出登录
    public function out(){
        session_unset();
        session_destroy();
        return $this->setRedirect('?s=admin/login/index')->success('退出成功');
    }
}