<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../public/css/news_add.css">
</head>
<body>
<div id="main">
    <a href="news.php">news</a>/
    <a href="addnews.php">add_news</a>/
    <a href="addtype.php">add_type</a>
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