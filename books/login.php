<html>
<head >
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../public/css/admin.css" type="text/css" >
</head>
<body>
    <div id="all">
        <div id="admin_login">
            <form id="form" method="post" action="../admin/adminlogin.php">
                <label for="name">管理员姓名:</label><br>
                <input id="name" type="text" name="admin"><br><br>
                <label for="pass">管理员密码:</label><br>
                <input id="pass" type="password" name="password"><br><br>
                <label for="code">验证码:</label><br>
                <input id="code" type="text" name="authcode"><br><br>
                <img border="1" id="capthcha_img" onclick="this.src='common/imgcode.php?r='+Math.random()" src="common/imgcode.php?r="<?php echo rand();?>  />
                <a href="javascript:void(0)" onclick="document.getElementById('capthcha_img').src='common/imgcode.php?r='+Math.random()">看不清,换一张</a><br>
                <input id="login_bt" type="submit" name="submit" value="登录">
            </form>
        </div>
    </div>
</body>
</html>