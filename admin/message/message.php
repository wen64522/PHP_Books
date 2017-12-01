<?php
date_default_timezone_set("PRC");
include ('message_page.php');
$sql = "select * from book_message order by id desc LIMIT $offset,$pageSize";
$result = $mysqli->query($sql);
while($arr = mysqli_fetch_array($result)){
    $rows[]=$arr;
}
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../../public/css/admin1.css">
</head>
<body>
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
    <?php
    echo "<div id='type'>";
    echo "<a href=\"".$_SERVER['PHP_SELF']."?page=1\">Home </a>";
    echo "<a href=\"".$_SERVER['PHP_SELF']."?page=".$prev."\"> 《—Last Page</a>";
    echo "|";
    echo "<a href=\"".$_SERVER['PHP_SELF']."?page=".$next."\">Next Page—》</a>";
    echo "<a href=\"".$_SERVER['PHP_SELF']."?page=".$totalPageCount."\"> End </a>";
    echo "</div>";
    ?>
</div>
</body>
</html>