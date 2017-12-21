<?php
include ('../../include.php');
$cunt=backNum("book_message");
$page=new Page($cunt,4);
$sql = "select * from book_message order by id desc $page->limit";
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
            <input id="send" type="submit" value="留言" >
        </form>
    </div>
    <div id="content">
        <?php
        if($cunt==0){
        ?>
            <div class="con_class">
                <p>暂时没有评论。</p>
            </div>
        <?php
        }else {
            ?>
            <?php
            $rows=getAllResult($sql);
            foreach ($rows as $row) {
                $t = date("Y/m/d H:i:s", $row['time']);
                ?>
                <div class="con_class">
                    <p><?php echo "@" . $row['user'] ?> said:</p>
                    <p><?php echo $row['message'] ?></p>
                    <p>Date:<?php echo $t ?></p>
                </div>
                <?php
            }
            ?>
            <?php
        }
        ?>
        <?php
        echo $page->fpage();
        ?>
    </div>
</div>
</body>
</html>