<?php
date_default_timezone_set("PRC");
include('page.php');
$sql = "select * from book_message order by id desc LIMIT $offset,$pageSize";
$result = $mysqli->query($sql);
while($arr = mysqli_fetch_array($result)){
    $rows[]=$arr;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../public/css/book_message.css" type="text/css" >
</head>
<body>
<div id="main">
    <div id="message">
        <form id="form" method="post" action="insert.php">
            <label for="name">Your name:</label> <br>
            <input id="name" name="user" type="text" ><br>
            <label for="mess">You must want to say something,Please input your message,thanks!!! </label><br>
            <textarea id="mess" name="message" ></textarea><br>
            <input id="send" type="submit" value="sand" >
        </form>
    </div>
    <div id="content">
        <?php
        foreach($rows as $row){
            $t=date("Y/m/d H:i:s",$row['time']);
            ?>
            <div class="con_class">
                <p><?php echo "@".$row['user'] ?> said:</p>
                <p><?php echo $row['message'] ?></p>
                <p>Date:<?php echo $t ?></p>
            </div>
            <?php
        }
        ?>
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
</div>
</body>
</html>