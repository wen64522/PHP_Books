<?php
/**
 * Created by PhpStorm.
 * User: wen
 * Date: 2017/12/5
 * Time: 14:25
 */
session_start();
include ('../../books/common/db.php');
if(isset($_POST['submit'])){
    $id=$_GET['id'];
    $title=$_POST['tle'];
    $content=$_POST['nav'];
    $type=$_POST['value'];
    $t=time();
    $user=$_SESSION['user'];
    $imgurl=$_POST['file_upload'];
    if($title==""or $content=="" or $imgurl==""){
        echo "you must input your news message!!!<br>";
        echo "<a href='news_edit.php?id=$id'>back news_edit</a>";
    }else{
        $sql="update  book_news set tle='$title',newstype='$type',nav='$content',uptime='$t',user='$user',img='$imgurl' where id='$id'";
        $result=$mysqli->query($sql);
        if(!$result){
            echo "更新错误！！！<br>";
            echo "<a href='news_edit.php?id=$id'>back news_edit</a>";
        }else{
            echo "更新成功！！！<br>";
            echo "<a href='news_edit.php?id=$id'>back news_edit</a>";
        }
    }
}else{
    echo "error<br>";
    echo "<a href='news_edit.php?id=$id'>back news_edit</a>";
}
