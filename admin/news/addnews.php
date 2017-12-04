<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <script type="text/javascript" src="../../public/Ueditor/ueditor.config.js" ></script>
    <script type="text/javascript" src="../../public/Ueditor/ueditor.all.js" ></script>
    <link rel="stylesheet" href="../../public/css/news_add.css">
</head>
<body>
<div id="main">
        <a href="news.php">news</a>/
        <a href="addnews.php">add_news</a>/
        <a href="addtype.php">add_type</a>
    <br><br>
    <h1>添加新闻</h1>
    <form method="post" action="add_succ.php" >
        <label for="title">标题：</label>
        <input type="text" id="title" name="tle"><br><br>
        <label>类别：</label>
        <select name="type">
            <option>--请选择--</option>
            <option value="option1">下拉1</option>
            <option value="option2">下拉2</option>
            <option value="option3">下拉3</option>
        </select><br><br>
        <label for="photo">封面：</label>
        <input type="file" name="img" id="photo"><br><br>
        <textarea style="width: 800px;height: 400px" name="nav" id="text"></textarea><br>
        <input type="submit" name="submit" value="提交">
    </form>
</div>
<script type="text/javascript">
    //        var editor = new UE.ui.Editor();
    //1.2.4以后可以使用一下代码实例化编辑器
    UE.getEditor('text')
</script>
</body>
</html>