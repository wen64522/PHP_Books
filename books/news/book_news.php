<?PHP
include ('../../include.php');
$cunt=select("book_news","newstype='news'");
$page=new Page($cunt,4);
$sql="select * from book_news where newstype='news'order by id desc $page->limit";
$sql1="select * from book_news ORDER BY RAND() LIMIT 6";
$sql2="select * from book_message ORDER by id desc limit 0,12";
$sql3="select * from book_photo ORDER by id desc limit 0,4";
?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../public/css/book_index.css">
    <link rel="stylesheet" href="../../public/css/newspage.css">
</head>
<body>
<div id="main">
    <div id="left">
        <?php if($cunt==0){?>
            <div class="nav">
              <p><?php  echo "暂无数据";?></p>
            </div>
        <?php }else{
            $rows=getAllResult($sql);
            foreach($rows as $row){?>
        <div class="nav">
            <div id="img">
                <img style="width: 260px;height: 215px" src="../../public/uploads/<?php echo $row['img']?>">
            </div>
            <div id="content">
                <a href="../show/show_news.php?id=<?php echo $row['id']?>" target=_blank><h3><?php echo mb_substr($row['tle'],'0','28','UTF8')?></h3></a>
                <p style="text-indent:2em;"><?php
                    $str=strip_tags($row['nav']);
                    $bf=array(" ","　","\t","\n","\r");
                    $lb=array("","","","","");
                    $str=str_replace($bf,$lb,$str);
                    echo mb_substr($str,'0','100','UTF8') ;
                    ?>
                    <a href="../show/show_news.php?id=<?php echo $row['id']?>" target=_blank>[点击详细]</a>
                </p>
            </div>
        </div>
        <?php }?>
        <?php }?>
        <?php
        echo $page->fpage();
        ?>
    </div>
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
</body>
</html>