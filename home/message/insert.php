
<?php
/**
 * Created by PhpStorm.
 * User: wen
 * Date: 2017/11/28
 * Time: 11:36
 */
include('../../include.php');
$name=$_POST['user'];
$mess=$_POST['message'];
$time=time();
if($name=="" or $mess==""){
    echo "error!!!the name or mess is null"."</br><a href=\"book_message.php\">back my home</a>";
}else{
    $array=[
        'user'=>$_POST['user'],
        'message'=>$_POST['message'],
        'time'=>$time
    ];
    $result=insert("book_message",$array);
    if($result){
        header('Location:book_message.php');
    }else{
        echo '未知错误，请联系管理员！';
    }

}


