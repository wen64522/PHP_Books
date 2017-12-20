<?php
include ('../../include.php');
$id=$_GET['id'];
$sql="select * from book_news WHERE id='$id'";
$sql1="select * from book_news ORDER BY RAND() LIMIT 6";
$sql2="select * from book_message ORDER by id desc limit 0,12";
$sql3="select * from book_photo ORDER by id desc limit 0,4";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> welcome to my books</title>
    <link rel="stylesheet" href="../../public/css/mystyle.css" type="text/css" >
    <link rel="stylesheet" href="../../public/css/show_news.css" type="text/css" >
</head>
<body>
<div id="main">
    <div id="header">
        <div id="logo"><div id="logo_1"><a href="../../index.php">Books</a></div></div>
        <div id="nav">
            <ul>
                <li><a href="../../books/news/book_news.php" target="index">新闻</a></li>
                <li><a href="../../books/life/book_life.php" target="index">生活</a></li>
                <li><a href="../../books/book/book_book.php" target="index">书本</a></li>
                <li><a href="../../books/photo/book_photo.php" target="index">相册</a></li>
                <li><a href="../../books/message/book_message.php" target="index">留言</a></li>
            </ul>
        </div>
        <div id="login">
            <a href="../../books/login.php" target=_blank>管理员登录</a>
        </div>
    </div>
    <div id="content">
        <div id="con">
            <div id="left">
                <?php $arr=getOneResult($sql);$t=date('Y/m/d',$arr['time']);?>
                <h1 style="text-align: center"><?php echo $arr['tle']?></h1>
                <ul>
                    <li>新闻管理:<?php echo $arr['user']?></li>
                    <li>新闻类型:<?php echo $arr['newstype']?></li>
                    <li>发表时间:<?php echo $t?></li>
                </ul>
                <div id="text">
                    <?php echo $arr['nav']?>
                </div>
            </div>
            <div id="right">
                <div class="right">
                    <span>新闻推荐</span>
                    <ul>
                        <?php
                        $rows1=getAllResult($sql1);
                        foreach($rows1 as $row1){
                            ?>
                            <li><a href="../show/show_news.php?id=<?php echo $row1['id']?>" target=_blank><?php echo $row1['tle']?></a></li>
                        <?php }?>
                    </ul>
                </div>
                <div class="right">
                    <span>照片分享</span>
                    <ul>
                        <?php
                       $rows3=getAllResult($sql3);
                        foreach($rows3 as $row3){
                            ?>
                            <li><img style="width: 150px; " src="../../public/uploads/photo/<?php echo $row3['img']?>"></li>
                        <?php }?>
                    </ul>
                </div>
                <div class="right">
                    <span>最新留言</span>
                    <ul>
                        <?php
                        $rows2=getAllResult($sql2);
                        foreach($rows2 as $row2){
                            ?>
                            <li><a href="#"><?php echo $row2['message']?></a></li>
                        <?php }?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="foot">
        <p>welcome to my books,thanks!</p>
        <p>by @wenyiwen</p>
    </div>
</div>
</body>
</html>