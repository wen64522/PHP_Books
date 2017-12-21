<?php
include ('../include.php');
if(isset($_SESSION['user'])){
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>welcome to admin system</title>
        <link rel="stylesheet" type="text/css" href="../public/css/admin1.css">
        <script type="text/javascript" src="../public/js/jquery-3.2.1.js"></script>
        <script type="text/javascript" src="../public/js/admin.js"></script>
    </head>
<body>
<div id="all">
    <div id="header">
            <div id="logo">
               <p>Admin System</p>
            </div>
    </div>
    <div id="left">
        <ul>
            <li><a href="welcome.php" target="onclick">后台首页</a></li>
            <li><a href="news/news.php" target="onclick">新闻管理</a></li>
            <li><a href="photo/photo.php" target="onclick">相册管理</a></li>
            <li><a href="message/message.php" target="onclick">留言管理</a></li>
        </ul>
    </div>
    <div id="content">
        <iframe id="if" name="onclick" frameborder=0 src="welcome.php"  width="100%" height="100%"></iframe>
    </div>
</div>
</body>
</html>
<?php
}else{
    echo 'sorry,你还没有登录';
}
?>