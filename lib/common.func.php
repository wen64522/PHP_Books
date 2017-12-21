<?php
/**
 * Created by PhpStorm.
 * User: wen
 * Date: 2017/12/21
 * Time: 14:43
 */
function alertMes($mes,$url){
    echo "<script>alert('{$mes}');</script>";
    echo "<script>window.location='{$url}';</script>";
}