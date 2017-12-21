<?php
include('../../include.php');
$type=$_GET['phototype'];
$sql="select * from book_photo  WHERE phototype='$type'";
$num=select("book_photo","phototype='$type'");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="../../public/css/show_photo.css" rel="stylesheet">
</head>
<body>
<div id="main">
    <?php
    if($num==0){
        echo '暂无数据！！！';
    }else{
        $rows=getAllResult($sql);
    foreach($rows as $row){
        ?>
        <div class="img">
            <img  style="width: 200px ;margin: 5px"  src="../../public/uploads/photo/<?php echo $row['img']?>">
            照片名称：<h2 style="text-align: center;"><?php echo $row['pname']?></h2>
            照片描述：<p><?php echo $row['pmess']?></p>
        </div>
    <?php }}?>
</div>
</body>
</html>