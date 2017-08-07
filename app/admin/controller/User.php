<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/8/3
 * Time: 10:35
 */

namespace app\admin\controller;


use houdunwang\view\View;
use system\model\User as UserModel;
class User extends Common{
    //修改密码
    public function changePassword(){
        if (IS_POST){
            $post=$_POST;
            //获得当前用户的密码和用户名
            $user=UserModel::where("uid='{$_SESSION['user']['uid']}'")->get();
            //验证旧密码是否正确
            if (!password_verify($post['oldPassword'],$user[0]['password'])){
                return $this->error('旧密码错误');
            }
            //确认新密码
            if ($post['newPassword']!=$post['confirmPassword']){
                return $this->error('两次密码不正确');
            }
            //把新密码存储到数据库里面
            $data=['password'=>password_hash($post['newPassword'],PASSWORD_DEFAULT)];
            UserModel::where("uid='{$_SESSION['user']['uid']}'")->update($data);
            //退出登录
            session_unset();
            session_destroy();
            return $this->success('修改成功')->setRedirect('?s=admin/login/index');
        }
        return View::make();
    }
}