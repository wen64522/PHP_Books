<?php
/**
 * Created by PhpStorm.
 * User: wen
 * Date: 2017/12/8
 * Time: 15:38
 */
include('../../include.php');
checkLogin();
$id=$_GET['id'];
$result=delete("book_photo","id=$id");
if($result){
    header("location:photo.php");
}else{
    echo "error!!";
}