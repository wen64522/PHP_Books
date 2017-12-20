<?php
/**
 * Created by PhpStorm.
 * User: wen
 * Date: 2017/12/1
 * Time: 9:57
 */
header("Content-Type: text/html; charset=utf-8");
session_start();
if(isset($_SESSION['user'])) {
    include('../../include.php');
    $id = $_GET['id'];
    $result=delete("book_message","id=$id");
    if ($result) {
        header("location:message.php");
    } else {
        echo "no error!!";
    }
}else{
    echo 'sorry,你还没有登录';
}