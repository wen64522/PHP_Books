<?php
/**
 * Created by PhpStorm.
 * User: wen
 * Date: 2017/12/19
 * Time: 16:11
 */
header ( 'Content-Type:text/html; charset=utf-8;' );
date_default_timezone_set("PRC");
session_start();
define("ROOT",dirname(__FILE__));
set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."/core".PATH_SEPARATOR.ROOT."/config".PATH_SEPARATOR.ROOT.get_include_path());
require_once 'mysql.func.php';
require_once 'page.func.php';
require_once 'config.php';
require_once 'admin.func.php';
require_once 'common.func.php';
content();