<?php
/**
 * Created by PhpStorm.
 * User: wen
 * Date: 2017/12/4
 * Time: 11:45
 */
session_start();
include ('../../books/common/db.php');
if(isset($_POST['submit'])){
    $title=$_POST['tle'];
    $content=$_POST['nav'];
    $type=$_POST['value'];
    $t=time();
    $user=$_SESSION['user'];
    $imgurl=$_POST['file_upload'];
    if($title==""or $content=="" or $imgurl==""){
        echo "you must input your news message!!!<br>";
        echo "<a href='addnews.php'>back add_news</a>";
    }else{
        $sql="INSERT INTO book_news(tle,nav,user,time,newstype,img) VALUE ('$title','$content','$user','$t','$type','$imgurl')";
        $result=$mysqli->query($sql);
        if(!$result){
            echo "添加错误！！！<br>";
            echo "<a href='addnews.php'>back add_news</a>";
        }else{
            echo "添加成功！！！<br>";
            echo "<a href='addnews.php'>back add_news</a>";
        }
    }
}else{
    echo "error<br>";
    echo "<a href='addnews.php'>back add_news</a>";
}



