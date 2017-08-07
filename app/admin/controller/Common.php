<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/8/3
 * Time: 8:41
 */

namespace app\admin\controller;


use houdunwang\core\Controller;

class Common extends Controller{
    //一继承这个方法就触发这个函数，如果没有登录，
    //就不能进入后台首页，进入后台跳转到登录页面
    public function __construct(){
        if (!isset($_SESSION['user'])){
            go('?s=admin/login/index');
        }
    }
}