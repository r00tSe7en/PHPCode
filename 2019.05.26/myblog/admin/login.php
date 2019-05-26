<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>后台登陆</title>
    <style>
        html,body{margin:0;
                  padding:0;
                  background:#26272b;
        }
        form{width:400px;
             height:250px;
             margin:100px auto 0;
             background:#f1f2f9;
             text-align:center;
             border-radius:8px;
        }
        form h3{margin:0 0 50px 0;
                height:50px;
                font:24px/50px 微软雅黑;
                background:#dfe0e7;
                border-bottom:1px solid #26272b;
                border-radius:8px 8px 0 0;
        }
        .input1{font:16px/32px 微软雅黑;
                width:240px;}
        .btn1{font:18px/36px 微软雅黑;
                width:160px;
                border:0;
                background:#39AFFF;
                border-radius:4px;
                color:#fff;
                margin-top:0px;}
    </style>
</head>
<body>
<form action="check_login.php" method="post">
    <h3>后台登陆</h3>
    <p>登陆名：<input type="text" name="username" class="input1"/></p>
    <p>密&emsp;码：<input type="password" name="password" class="input1"/></p>
    <p><input type="submit" value="立即登陆" class="btn1"/></p>
</form>
</body>
</html>