<?php
/**
 * Created by PhpStorm.
 * User: wen
 * Date: 2017/12/8
 * Time: 16:47
 */
include('../../include.php');
if(isset($_POST['submit'])){
    $id=$_GET['id'];
    $pname=$_POST['pname'];
    $pmess=$_POST['pmess'];
    $type=$_POST['phototype'];
    $t=time();
    $imgurl=$_POST['photos'];
    if($pname==""or $pmess=="" or $imgurl==""){
        echo "you must input your news message!!!<br>";
        echo "<a href='news_edit.php?id=$id'>back news_edit</a>";
    }else{
        $array=[
            'pname'=>$_POST['pname'],
            'pmess'=>$_POST['pmess'],
            'phototype'=>$_POST['phototype'],
            'uptime'=>$t,
            'user'=>$_SESSION['user'],
            'img'=>$_POST['photos'],
        ];
        $result=update("book_photo",$array,"id=$id");
        if(!$result){
            echo "更新错误！！！<br>";
            echo "<a href='photo_edit.php?id=$id'>back photo_edit</a>";
        }else{
            echo "更新成功！！！<br>";
            echo "<a href='photo_edit.php?id=$id'>back photo_edit</a>";
        }
    }
}else{
    echo "error<br>";
    echo "<a href='news_edit.php?id=$id'>back news_edit</a>";
}