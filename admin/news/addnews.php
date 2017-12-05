<?php
include ('../../books/common/db.php');
$sql="select * from book_type ORDER by id desc";
$result=$mysqli->query($sql);
while($row=mysqli_fetch_array($result)){
    $rows[]=$row;
}
$mysqli->close();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <script type="text/javascript" src="../../public/js/jquery-3.2.1.js" ></script>
    <script type="text/javascript" src="../../public/uploadify/jquery.uploadify.js"></script>
    <script type="text/javascript" src="../../public/Ueditor/ueditor.config.js" ></script>
    <script type="text/javascript" src="../../public/Ueditor/ueditor.all.js" ></script>
    <link rel="stylesheet" href="../../public/css/news_add.css">
    <link rel="stylesheet" type="text/css" href="../../public/uploadify/uploadify.css">
</head>
<body>
<div id="main">
    <a href="news.php">新闻管理</a>/
    <a href="addnews.php">新闻添加</a>/
    <a href="addtype.php">新闻类别</a>
    <hr>
    <h1>添加新闻</h1>
    <form method="post" action="add_succ.php" >
        <label for="title">标题：</label>
        <input type="text" id="title" name="tle"><br><br>
        <label for="type">类别：</label>
        <select id="type" name="value">
            <?php
            foreach($rows as $row) {
                ?>
                <option value="<?php  echo $row['newstype']?>"><?php echo $row['newstype']?></option>
                <?php
            }
            ?>
        </select><br><br>
        <label for="file_upload">封面：</label>
        <input id="file_upload" name="file_upload" type="file" >
        <div  id="imgs"></div>
        <input name="file_upload" type="hidden"   id="img_post" >
        <label for="text">内容：</label>
        <textarea style="width: 800px;height: 400px" name="nav" id="text"></textarea><br>
        <input type="submit" name="submit" value="提交">
    </form>
</div>
<script type="text/javascript">
    //        var editor = new UE.ui.Editor();
    //1.2.4以后可以使用一下代码实例化编辑器
    UE.getEditor('text')
//上传图片
    <?php $timestamp = time();?>
    $(function() {
        $('#file_upload').uploadify({
            'formData'     : {
                'timestamp' : '<?php echo $timestamp;?>',
                'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
            },
            'swf'      : '../../public/uploadify/uploadify.swf',
            'uploader' : '../../public/uploadify/uploadify.php',
            'method'   : 'post',
            'buttonText' : '封面上传',
            'onUploadSuccess' : function(file, data, response) {
                $('#img_post').val(data);
                img = "<img width='200px' src='../../public/uploads/" + data + "'>";
                $('#imgs').html(img);
            }
        });
    });

</script>
</body>
</html>