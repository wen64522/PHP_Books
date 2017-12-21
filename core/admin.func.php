<?php
/**
 * Created by PhpStorm.
 * User: wen
 * Date: 2017/12/21
 * Time: 14:40
 */
//检查是否登录
function checkLogin(){
    if($_SESSION['user']==""){
        alertMes("请先登陆","../home/login.php");
    }
}