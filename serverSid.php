<?php
//载入ucpass类
require_once('lib/Ucpaas.class.php');

//初始化必填
//填写在开发者控制台首页上的Account Sid
$options['accountsid']='0f2d180a5f7888c397a5aedfbd1c62af';
//填写在开发者控制台首页上的Auth Token
$options['token']='19cddc95ceb9c4dba076b5d56eed2692';

//初始化 $options必填
$ucpass = new Ucpaas($options);