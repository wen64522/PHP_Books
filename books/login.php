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
                <label for="name">username:</label>
                <input id="name" type="text" name="admin"><br>
                <label for="pass">password:</label>
                <input id="pass" type="password" name="password"><br>
                <input id="login_bt" type="submit" name="submit" value="login">
            </form>
        </div>
    </div>
</body>
</html>