<?php
include ('../../include.php');
checkLogin();
$cunt=backNum("book_message");
$page = new Page($cunt,10);
$sql= "select * from book_message order by id desc $page->limit";
?>
<html>
<head>
    <meta charset="utf-8">
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
            $rows=getAllResult($sql);
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
    </table>
        <?php
        echo $page->fpage();
        ?>
    </div>
</div>
</body>
</html>