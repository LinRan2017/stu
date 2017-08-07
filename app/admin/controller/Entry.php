<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/8/1
 * Time: 20:33
 */

namespace app\admin\controller;


use houdunwang\core\Controller;
use houdunwang\view\View;
//后台首页
class Entry extends Common {
    public function index(){
       return View::make();
    }
}