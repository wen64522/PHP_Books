<?php
date_default_timezone_set("PRC");
include ('photo_page.php');
$sql="select * from book_photo order by id desc limit $offset,$pageSize";
$result=$mysqli->query($sql);
$num=mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../public/css/news_add.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/admin1.css">
<body>
<div id="main">
    <a href="photo.php">相册管理</a>/
    <a href="add_photo.php">添加照片</a>/
    <a href="add_photo_type.php">创建相册</a>
    <hr>
    <h1>相册管理</h1>
    <form action="photo_search.php" method="get">
        <input type="text" name="val" placeholder="搜索相册">
        <input type="submit" value="search">
    </form>
</div>
<div>
    <br>
    <table  border="1" style=" border-collapse:collapse; width: 100% ;height: 500px;">
        <tr>
            <th>照片编号</th>
            <th>照片浏览</th>
            <th>照片标题</th>
            <th>照片描述</th>
            <th>照片相册</th>
            <th>发表时间</th>
            <th>更新时间</th>
            <th>操作用户</th>
            <th>相册管理</th>
        </tr>
        <?php
        if($num==0){
            echo "no data!!!";
        }else{
            while($arr=mysqli_fetch_array($result)){
                $rows[]=$arr;}
            ?>
            <?php
            foreach($rows as $row){
                $t=date('Y/m/d H:i:s',$row['time']);
                if($row['uptime']==""){
                    $up="无修改";
                }else{
                    $up=date('Y/m/d H:i:s',$row['uptime']);
                }
                ?>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><img style="width: 100px;height: 60px" src="../../public/uploads/photo/<?php echo $row['img']?>"></td>
                    <td><?php echo $row['pname']?></td>
                    <td><?php echo $row['pmess']?></td>
                    <td><?php echo $row['phototype']?></td>
                    <td><?php echo $t?></td>
                    <td><?php echo $up?></td>
                    <td><?php echo $row['user']?></td>
                    <td>
                        <a href="photo_delete.php?id=<?php echo $row['id']?>">Delete</a>
                        <a href="photo_edit.php?id=<?php echo $row['id']?>">Edit</a>
                    </td>
                </tr>
                <?php
            } ?>
            <?php
        }
        ?>
    </table>
    <?php
    echo "<div id='type'>";
    echo "<a href=\"".$_SERVER['PHP_SELF']."?page=1\">最前 </a>";
    echo "<a href=\"".$_SERVER['PHP_SELF']."?page=".$prev."\"> 上一页</a>";
    echo "|";
    echo "<a href=\"".$_SERVER['PHP_SELF']."?page=".$next."\">下一页</a>";
    echo "<a href=\"".$_SERVER['PHP_SELF']."?page=".$totalPageCount."\"> 最后 </a>";
    echo "</div>";
    ?>
</div>
</body>
</html>