<?php
/**
 * Created by PhpStorm.
 * User: wen
 * Date: 2017/12/5
 * Time: 11:15
 */
include('../../include.php');
$id=$_GET['id'];
$result=delete("book_news","id=$id");
if($result){
    header("location:news.php");
}else{
    echo "no error!!";
}