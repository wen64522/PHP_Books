<?php
date_default_timezone_set("PRC");
header("Content-Type: text/html; charset=utf-8");
session_start();
if(isset($_SESSION['user'])){
include ('message_page.php');
$sql = "select * from book_message order by id desc limit $offset,$pageSize";
$result = $mysqli->query($sql);
$num=mysqli_num_rows($result);
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../public/css/admin1.css">
</head>
<body>
<div>
    <h1>留言管理</h1>
    <form action="message_select.php" method="get">
        <input type="text" name="val"  placeholder="搜索留言人">
        <input type="submit" value="search">
    </form>
    <div>
    <table border="1" style=" border-collapse:collapse; width: 800px ;height: 500px">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>message</th>
            <th>date</th>
            <th>operation</th>
        </tr>
        <?php
        if($num==0){
            ?>
                <p>sorry, no message.</p>
            <?php
        }else {
            ?>
            <?php
            while ($arr = mysqli_fetch_array($result)) {
                $rows[] = $arr;
            }
            foreach ($rows as $row) {
                $t = date("Y/m/d H:i:s", $row['time']);
                ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['user'] ?></td>
                    <td><?php echo $row['message'] ?></td>
                    <td><?php echo $t ?></td>
                    <td><a href="message_delete.php?id=<?php echo $row['id'] ?>">Delete</a></td>
                </tr>
                <?php
            }
            ?>
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
</div>
</body>
</html>
    <?php
}else{echo 'sorry,你还没有登录';
}
?>