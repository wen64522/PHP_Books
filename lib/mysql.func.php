<?php
/**
 * Created by PhpStorm.
 * User: wen
 * Date: 2017/12/19
 * Time: 16:11
 */
//数据库链接方法
function content(){
    global $link;
    $link=mysqli_connect(DB_HOST, DB_USER, DB_PWD,DB_DBNAME) or die("数据库连接失败Error:".mysqli_connect_errno().":".mysqli_connect_error());
    mysqli_set_charset($link,DB_CHARSET);
    mysqli_select_db($link,DB_DBNAME) or die("指定数据库打开失败");
    return $link;
}
//数据库添加
function insert($table,$array){
    global $link;
    $key="".join(",",array_keys($array));
    $value="'".join("','",array_values($array))."'";
    $sql="insert into {$table} ({$key}) VALUES ({$value})";
    $result=mysqli_query($link,$sql);
    if($result){
        return mysqli_insert_id($link);
    }else{
        return false;
    }
}
//数据库更新
function update($table,$array,$where=null){
    global $link;
    $sets="";
    foreach ($array as $key=>$val){
        $sets.=$key."='".$val."',";
    }
    $sets=rtrim($sets,','); //去掉SQL里的最后一个逗号
    $where=$where==null? '':' WHERE '.$where;
    $sql="UPDATE {$table} SET {$sets} {$where}";
    $res=mysqli_query($link,$sql);
    if ($res){
        return mysqli_affected_rows($link);
    }else {
        return false;
    }
}
//数据库删除
function delete($table,$where=null){
    global $link;
    $where=$where==null?null:$where;
    $sql="DELETE FROM {$table} WHERE {$where}";
    $result=mysqli_query($link,$sql);
    if($result){
        return mysqli_affected_rows($link);
    }else{
        return false;
    }
}
//按条件查询并返回记录总数
function select($table,$where=null){
    global $link;
    $where=$where==null?null:' where '.$where;
    $sql="select * from {$table}{$where}";
    $result=mysqli_query($link,$sql);
    if($result){
        return mysqli_num_rows($result);
    }else{
        return false;
    }
}
//得到数据表所有结果集
function getAllResult($sql, $result_type=MYSQLI_ASSOC){
    global $link;
    $result=mysqli_query($link,$sql);
    if($result && mysqli_num_rows($result)>0){
        while($arr=mysqli_fetch_array($result,$result_type)){
                $rows[]=$arr;
        }
        return $rows;
    }else{
        return false;
    }
}
//得到一条数据结果集
function getOneResult($sql,$result_type=MYSQLI_ASSOC){
    global $link;
    $result=mysqli_query($link,$sql);
    if($result && mysqli_num_rows($result)>0){
        return mysqli_fetch_array($result,$result_type);
    }else{
        return false;
    }
}
//返回某个记录表的条数
function backNum($table){
    global $link;
    $sql="select * from {$table}";
    $result=mysqli_query($link,$sql);
    if($result){
        return mysqli_num_rows($result);
    }else{
        return false;
    }
}
//得到结果集的记录的条数
function getNumResult($sql){
    global $link;
    $result=mysqli_query($link,$sql);
    if($result){
        return mysqli_num_rows($result);
    }else{
        return false;
    }
}
