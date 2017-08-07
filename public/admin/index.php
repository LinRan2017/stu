<?php
//一进入后台就进入到后台首页，如果没有登录就跳转到登录页面，
//登录成功后跳转到后台首页
header('location:../index.php?s=admin/entry/index');