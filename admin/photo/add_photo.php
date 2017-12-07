<html>
<head>
    <meta charset="utf-8">
    <script type="text/javascript" src="../../public/js/jquery-3.2.1.js" ></script>
    <script type="text/javascript" src="../../public/uploadify/jquery.uploadify.js"></script>
    <link rel="stylesheet" href="../../public/css/news_add.css">
    <link rel="stylesheet" type="text/css" href="../../public/uploadify/uploadify.css">
</head>
<body>
<div id="main">
    <a href="photo.php">相册管理</a>/
    <a href="add_photo.php">添加照片</a>/
    <a href="add_photo_type.php">创建相册</a>
    <hr>
    <h1>添加照片</h1>
    <div id="photo">
        <form method="post" action="#">
            <label for="ptype">照片相册:</label>
            <select id="ptype">
                <option value="">
                    1
                </option>
                <option value="">
                    2
                </option>
                <option value="">
                    3
                </option>
            </select>
            <br> <br>
            <label id="pup"></label>
            <input type="file" name="img" id="pup" >
        </form>
    </div>
</div>
</body>
</html>