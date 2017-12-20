<?php
/**
 * Created by PhpStorm.
 * User: wen
 * Date: 2017/12/5
 * Time: 14:25
 */
include ('../../include.php');
if(isset($_POST['submit'])){
    $id=$_GET['id'];
    $title=$_POST['tle'];
    $t=time();
    $content=$_POST['nav'];
    $imgurl=$_POST['file_upload'];
    if($title==""or $content=="" or $imgurl==""){
        echo "you must input your news message!!!<br>";
        echo "<a href='news_edit.php?id=$id'>back news_edit</a>";
    }else{
        $array=[
            'tle'=>$_POST['tle'],
            'newstype'=>$_POST['value'],
            'nav'=>$_POST['nav'],
            'user'=>$_SESSION['user'],
            'uptime'=>$t,
            'img'=>$_POST['file_upload']
        ];
        $result=update("book_news",$array,"id=$id");
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
