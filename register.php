<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="jquery-1.11.0.js" type="text/javascript"></script>

    <script type="text/javascript">
        // var countdown=60;
        let countdown=60;
        function settime(obj){
            //60秒倒计时
            if (countdown == 0){
                obj.removeAttribute("disabled");
                obj.value="发送短信验证码";
                countdown = 60;
                return;
            }else{
                obj.setAttribute("disabled", true);
                obj.value="重新发送(" + countdown + ")";
                countdown--;
            }
            setTimeout(function() {settime(obj) },1000)
        }
        $(document).ready(function() {
            $("#yzmfs").click(function () {
                //确保手机号不为空
                let mobile=$("#phone").val();
                if(mobile.length==0)
                {
                    alert('请输入手机号码！');
                    $("#phone").focus();
                    return false;
                }
                if(mobile.length!=11)
                {
                    alert('请输入11位手机号！');
                    $("#phone").focus();
                    return false;
                }
                var myreg = /^((1[3|4|5|8][0-9]{1})+\d{8})$/;
                if(!myreg.test(mobile))
                {
                    alert('请输入正确的手机号码！');
                    document.getElementById("phone").focus();
                    return false;
                }
                //点击发送短信验证码
                $.ajax({
                    async : false,
                    type: "get",
                    url: "code.php", //
                    data: {},
                    success: function (data) {
                        //发送短信验证码
                        $.ajax({
                            async : false,
                            type: "post",
                            url: "smsyzm.php", //
                            data: {"yzm": data, 'yzmtel': $('#phone').val()},
                            dataType: "json",
                            success: function (data) {
                            }
                        });
                    }
                });
            })
        })
    </script>
</head>
<body>
<form action="check.php" method="post">
    用户名：<input type="text" id="name" name="name"/><br>
    密<nbsp></nbsp>码：<input type="password" id="pwd" name="pwd" /><br>
    手机号：<input type="text" id="phone" name="phone" /><br>
    <input id="msg" hidden>
    <input type="text" id="yzm" name="yzm">
    <input type="button" id="yzmfs" value="发送短信验证码" onclick="settime(this)" /> <br>
    <input type="submit" id='register' name='register' value="注册">
</form>
</body>
</html>