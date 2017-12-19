<?php
/**
 * Created by PhpStorm.
 * User: wen
 * Date: 2017/12/19
 * Time: 16:11
 */
//数据库链接方法
function content(){
    $link=mysqli_connect(DB_HOST, DB_USER, DB_PWD,DB_DBNAME) or die("数据库连接失败Error:".mysqli_connect_errno().":".mysqli_connect_error());
    mysqli_set_charset($link,DB_CHARSET);
    mysqli_select_db($link,DB_DBNAME) or die("指定数据库打开失败");
    return $link;
}
//通用数据库添加方法
function insert(){

}
//通用数据库更新方法
function update(){

}
//通用数据库删除方法
function delete(){

}
//得到数据所有结果集
function getAllResult(){

}
//得到一条数据记录
function getOneResult(){

}
//得到结果集的记录条数
function getNumResult(){

}
