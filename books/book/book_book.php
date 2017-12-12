<?PHP
header("Content-Type: text/html; charset=utf-8");
include ('book_page.php');
$sql="select * from book_news where newstype='book'order by id desc LIMIT $offset,$pageSize";
$result=$mysqli->query($sql);
$sql1="select * from book_news order by id desc LIMIT 0,6";
$res=$mysqli->query($sql1);
$sql2="select * from book_message ORDER by id desc limit 0,12";
$res2=$mysqli->query($sql2);
$sql3="select * from book_photo ORDER by id desc limit 0,4";
$res3=$mysqli->query($sql3);
$num=mysqli_num_rows($result);
$mysqli->close();
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
                        <a href="../show/show_news.php?id=<?php echo $row['id']?>" target="_blank"><h3><?php echo mb_substr($row['tle'],'0','28','UTF8')?></h3></a>
                        <p style="text-indent:2em;"><?php
                            $str=strip_tags($row['nav']);
                            $bf=array(" ","　","\t","\n","\r");
                            $lb=array("","","","","");
                            $str=str_replace($bf,$lb,$str);
                            echo mb_substr($str,'0','100','UTF8') ;
                            ?>
                            <a href="../show/show_news.php?id=<?php echo $row['id']?>" target="_blank">[点击详细]</a>
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
            <?php
            while($arr1=mysqli_fetch_array($res)){
                $rows1[]=$arr1;
            }
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
            while($arr3=mysqli_fetch_array($res3)){
                $rows3[]=$arr3;
            }
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
            while($arr2=mysqli_fetch_array($res2)){
                $rows2[]=$arr2;
            }
            foreach($rows2 as $row2){
                ?>
                <li><a href="#"><?php echo $row2['message']?></a></li>
            <?php }?>
        </ul>
        </ul>
    </div>
</div>
</body>
</html>