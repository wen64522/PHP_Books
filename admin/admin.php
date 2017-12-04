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
            <li><a href="welcome.php" target="onclick">Home</a></li>
            <li><a href="news/news.php" target="onclick">News</a></li>
            <li><a href="photo/photo.php" target="onclick">photo</a></li>
            <li><a href="message/message.php" target="onclick">message</a></li>
        </ul>
    </div>
    <div id="content">
        <iframe id="if" name="onclick" frameborder=0 src="welcome.php"  width="100%" height="100%"></iframe>
    </div>
</div>
</body>
</html>