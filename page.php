<?php
/**
 * Created by PhpStorm.
 * User: wen
 * Date: 2017/11/28
 * Time: 17:03
 */
include ('db.php');
$pageSize = 4; //每页显示数据条数

$result = $mysqli->query("select * from book_message");
$totalNum = mysqli_num_rows($result); //数据总条数

$totalPageCount = intval($totalNum/$pageSize); //总页数

//判断当前页是哪一页
$nowPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
//上一页
$prev = ($nowPage-1 <= 0) ? 1 : $nowPage-1;
//下一页
$next = ($nowPage+1 >= $totalPageCount) ? $totalPageCount : $nowPage+1;

//偏移量
$offset = ($nowPage-1)*$pageSize;

