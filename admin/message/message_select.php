<?php
/**
 * Created by PhpStorm.
 * User: wen
 * Date: 2017/12/1
 * Time: 10:23
 */
date_default_timezone_set("PRC");
include('../../books/common/db.php');
$val=$_GET['val'];
$sql="select * from book_message WHERE user LIKE '%$val%'";
$result=$mysqli->query($sql);
?>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<?php
if(mysqli_num_rows($result)){
    while($arr=mysqli_fetch_array($result)){
        $rows[]=$arr;
    }
?>
    <h1>留言搜索结果</h1>
    <form action="message_select.php" method="get">
        <input type="text" name="val"  placeholder="搜索留言人">
        <input type="submit" value="search">
    </form>
    <a href='message.php'>返回留言管理</a>
<table border="1" style=" border-collapse:collapse; width: 800px ;height: 500px">
    <tr>
        <th>id</th>
        <th>name</th>
        <th>message</th>
        <th>date</th>
        <th>operation</th>
    </tr>
    <?php
    foreach($rows as $row){
        $t=date("Y/m/d H:i:s",$row['time']);
        ?>
        <tr>
            <td><?php echo $row['id']?></td>
            <td><?php echo $row['user']?></td>
            <td><?php echo $row['message']?></td>
            <td><?php echo $t ?></td>
            <td><a href="message_delete.php?id=<?php echo $row['id']?>">Delete</a></td>
        </tr>
        <?php
    }
    ?>
</table>
<?php }else{
    echo "无此数据 ";
    echo "<h1>留言搜索结果</h1>
    <form action=\"message_select.php\" method=\"get\">
        <input type=\"text\" name=\"val\"  placeholder=\"搜索留言人\">
        <input type=\"submit\" value=\"search\">
    </form><p><a href='message.php'>返回留言管理</a></p>";
}
?>
</body>
</html>
