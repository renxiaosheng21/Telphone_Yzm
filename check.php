<?php
require 'code.php';
header("Content-type:text/html;charset=utf-8");
//判断name和pwd不能为空
$name=isset($_POST['name'])?$_POST['name']:'';
$pwd=isset($_POST['pwd'])?$_POST['pwd']:'';
$phone=isset($_POST['phone'])?$_POST['phone']:'';
//真正验证码
$code = $code_1;
echo $code."测试code值<br/>";
//用户输入的验证码
$yzm=isset($_POST['yzm'])?strtolower($_POST['yzm']):'';
//在浏览器输入的验证码
echo $yzm."测试yzm<br>";
if($name==null){
    echo "姓名不能为空,3秒后跳回原注册页面";
    header("Refresh:3;url=register.php");
    die();
}
if($pwd==null){
    echo "密码不能为空,3秒后跳回原注册页面";
    header("Refresh:3;url=register.php");
    die();
}
if($yzm==""){
    echo "未输入验证码,3秒后跳回原注册页面";
    header("Refresh:3;url=register.php");
    die();
}
if($phone==""){
    echo "未输入手机号,3秒后跳回原注册页面";
    header("Refresh:3;url=register.php");
    die();
}
if($code==$yzm){
    echo "注册成功";
}else{
    echo "验证码输入错误,3秒后跳回原注册页面";
   // header("Refresh:3;url=register.php");
   // die();
}