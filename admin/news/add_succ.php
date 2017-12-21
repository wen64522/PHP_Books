<?php
/**
 * Created by PhpStorm.
 * User: wen
 * Date: 2017/12/4
 * Time: 11:45
 */
include ('../../include.php');
checkLogin();
if(isset($_POST['submit'])){
    $title=$_POST['tle'];
    $content=$_POST['nav'];
    $type=$_POST['value'];
    $imgurl=$_POST['file_upload'];
    $t=time();
    if($title==""or $content=="" or $imgurl==""){
        echo "you must input your news message!!!<br>";
        echo "<a href='addnews.php'>back add_news</a>";
    }else{
        $array=[
            'tle'=>$_POST['tle'],
            'nav'=>$_POST['nav'],
            'user'=>$_SESSION['user'],
            'img'=>$_POST['file_upload'],
            'newstype'=>$_POST['value'],
            'time'=>$t,
        ];
        $result=insert("book_news",$array);
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



