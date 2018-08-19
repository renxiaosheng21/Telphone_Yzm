<?php
$code_len=4;
$code=array_merge(range('A','Z'),range('a','z'),range(1,9));
//需要用到的数字或字母
$keyCode=array_rand($code,$code_len);//真正的验证码对应的$code的键值
if($code_len==1){
    $keyCode=array($keyCode);
}
shuffle($keyCode);//打乱数组
$verifyCode="";
foreach ($keyCode as $key){
    $verifyCode.=$code[$key];//真正验证码
}

$code_0=base64_encode($verifyCode);//加密
//echo $code_0."测试加密值<br>";
$code_1 = base64_decode($code_0);
//echo $code_1."测试解码值<br>";