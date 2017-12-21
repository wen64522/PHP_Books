<?php
include('../../include.php');
$id=$_GET['id'];
$sql="select * from book_photo where id='$id'";
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../public/css/news_add.css">
</head>
<body>
<div id="main">
    <a href="photo.php">相册管理</a>/
    <a href="add_photo.php">添加照片</a>/
    <a href="add_photo_type.php">创建相册</a>
    <hr>
    <h1>编辑照片</h1>
    <div id="photo">
        <?php
        $row=getOneResult($sql);
        ?>
        <form method="post" action="photo_edit_suc.php?id=<?php echo $row['id']?>">
            <label for="p_name">照片名称:</label>
            <input type="text" name="pname" id="p_name" value="<?php echo $row['pname']?>" ><br> <br>
            <label for="ptype">照片相册:</label>
            <select id="ptype" name="phototype">
                    <option value="<?php echo $row['phototype'] ?>">
                        <?php echo $row['phototype'] ?>
                    </option>
            </select>
            <br> <br>
            <label for="file_upload">照片浏览:</label><br><br>
            <input type="hidden" name="photos" value="<?php echo $row['img'] ?>">
            <img src="../../public/uploads/photo/<?php echo $row['img'] ?>">
            <br>
            <label for="p_mess">照片描述:</label><br>
            <textarea style="width: 300px;height: 150px" id="p_mess" name="pmess"><?php echo $row['pmess'] ?></textarea><br> <br>
            <input type="submit" value="完成" name="submit" >
        </form>
    </div>
</div>
</body>
</html>