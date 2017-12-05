<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../public/css/news_add.css">
</head>
<body>
<div id="main">
    <a href="news.php">新闻管理</a>/
    <a href="addnews.php">新闻添加</a>/
    <a href="addtype.php">新闻类别</a>
    <hr>
</div>
<div id="content">
    <h1>添加类别</h1>
    <form action="add_type.php" method="post">
        <input type="text" name="newstype">
        <input type="submit" value="添加" name="submit">
    </form>
</div>
</body>
</html>