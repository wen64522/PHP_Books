<?php
date_default_timezone_set("PRC");
include ('../../books/common/db.php');
$val=$_GET['val'];
$sql="select * from book_news WHERE tle LIKE '%$val%'";
$result=$mysqli->query($sql);
$num=mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../public/css/news_add.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/admin1.css">
</head>
<body>
<div id="main">
    <a href="news.php">新闻管理</a>/
    <a href="addnews.php">新闻添加</a>/
    <a href="addtype.php">新闻类别</a>
    <hr>
</div>
<div>
    <h1>新闻搜索结果</h1>
    <form action="news_search.php" method="get">
        <input type="text" name="val" placeholder="搜索新闻标题">
        <input type="submit" value="search">
    </form>
</div>
<div>
    <br>
    <table  border="1" style=" border-collapse:collapse; width: 100% ;height: 500px;">
        <tr>
            <th>新闻编号</th>
            <th>新闻封面</th>
            <th>新闻标题</th>
            <th>新闻类型</th>
            <th>发表时间</th>
            <th>更新时间</th>
            <th>操作用户</th>
            <th>新闻管理</th>
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
                    <td><img style="width: 100px;height: 60px" src="../../public/uploads/<?php echo $row['img']?>"></td>
                    <td><?php echo $row['tle']?></td>
                    <td><?php echo $row['newstype']?></td>
                    <td><?php echo $t?></td>
                    <td><?php echo $up?></td>
                    <td><?php echo $row['user']?></td>
                    <td>
                        <a href="news_delete.php?id=<?php echo $row['id']?>">Delete</a>
                        <a href="news_edit.php?id=<?php echo $row['id']?>">Edit</a>
                    </td>
                </tr>
                <?php
            } ?>
            <?php
        }
        ?>
    </table>
</div>
</body>
</html>