<?PHP
header("Content-Type: text/html; charset=utf-8");
include ('news_page.php');
$sql="select * from book_news where newstype='news'order by id desc LIMIT $offset,$pageSize";
$result=$mysqli->query($sql);
$num=mysqli_num_rows($result);
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
        <?php if($num==0){?>
            <div class="nav">
              <p><?php  echo "暂无数据";?></p>
            </div>
        <?php }else{
            while($arr=mysqli_fetch_array($result)){
                $rows[]=$arr;
            }
            foreach($rows as $row){?>
        <div class="nav">
            <div id="img">
                <img style="width: 260px;height: 215px" src="../../public/uploads/<?php echo $row['img']?>">
            </div>
            <div id="content">
                <a href="#"><h3><?php echo mb_substr($row['tle'],'0','28','UTF8')?></h3></a>
                <p style="text-indent:2em;"><?php
                    $str=strip_tags($row['nav']);
                    $bf=array(" ","　","\t","\n","\r");
                    $lb=array("","","","","");
                    $str=str_replace($bf,$lb,$str);
                    echo mb_substr($str,'0','100','UTF8') ;
                    ?>
                    <a href="#">[点击详细]</a>
                </p>
            </div>
        </div>
        <?php }?>
        <?php }?>
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
    <div class="right">
        <span>新闻推荐</span>
        <ul>
            <li>xxxxxxxxxxxxxx</li>
            <li>xxxxxxxxxxxxxx</li>
            <li>xxxxxxxxxxxxxx</li>
            <li>xxxxxxxxxxxxxx</li>
            <li>xxxxxxxxxxxxxx</li>
            <li>xxxxxxxxxxxxxx</li>
            <li>xxxxxxxxxxxxxx</li>
            <li>xxxxxxxxxxxxxx</li>
            <li>xxxxxxxxxxxxxx</li>
            <li>xxxxxxxxxxxxxx</li>
            <li>xxxxxxxxxxxxxx</li>
            <li>xxxxxxxxxxxxxx</li>
        </ul>
    </div>
    <div class="right">
        <span>照片分享</span>
        <ul>
            <li>xxxxxxxxxxxxxx</li>
            <li>xxxxxxxxxxxxxx</li>
            <li>xxxxxxxxxxxxxx</li>
            <li>xxxxxxxxxxxxxx</li>
            <li>xxxxxxxxxxxxxx</li>
            <li>xxxxxxxxxxxxxx</li>
            <li>xxxxxxxxxxxxxx</li>
            <li>xxxxxxxxxxxxxx</li>
            <li>xxxxxxxxxxxxxx</li>
            <li>xxxxxxxxxxxxxx</li>
            <li>xxxxxxxxxxxxxx</li>
            <li>xxxxxxxxxxxxxx</li>
        </ul>
    </div>
    <div class="right">
        <span>最新留言</span>
        <ul>
            <li>xxxxxxxxxxxxxx</li>
            <li>xxxxxxxxxxxxxx</li>
            <li>xxxxxxxxxxxxxx</li>
            <li>xxxxxxxxxxxxxx</li>
            <li>xxxxxxxxxxxxxx</li>
            <li>xxxxxxxxxxxxxx</li>
            <li>xxxxxxxxxxxxxx</li>
            <li>xxxxxxxxxxxxxx</li>
            <li>xxxxxxxxxxxxxx</li>
            <li>xxxxxxxxxxxxxx</li>
            <li>xxxxxxxxxxxxxx</li>
            <li>xxxxxxxxxxxxxx</li>
        </ul>
    </div>
</div>
</body>
</html>