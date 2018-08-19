<?php
//载入ucpass类
require_once('lib/Ucpaas.class.php');
require_once('serverSid.php');

$appid = "d4de567c54e54379880e5c7005f100a2";//应用的ID，可在开发者控制台内的短信产品下查看
$templateid = "364691";    //通知模板ID
//$templateid = "364690";    //验证码模板ID，
//$templateid = "364723";    //验证码模板ID，

$param = base64_decode($_POST['yzm']);
$mobile = $_POST['yzmtel'];
$uid = "";

//70字内（含70字）计一条，超过70字，按67字/条计费，超过长度短信平台将会自动分割为多条发送。分割后的多条短信将按照具体占用条数计费。

echo $ucpass->SendSms($appid,$templateid,$param,$mobile,$uid);
