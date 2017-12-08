<?php
/**
 * Created by PhpStorm.
 * User: wen
 * Date: 2017/12/8
 * Time: 9:09
 */
$targetFolder = '/text/public/uploads/photo'; // Relative to the root

$verifyToken = md5('unique_salt' . $_POST['timestamp']);

if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
    $tempFile = $_FILES['filedata']['tmp_name'];
    $targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
    $targetFile = rtrim($targetPath,'/') . '/' . $_FILES['filedata']['name'];

    // Validate the file type
    $fileTypes = array('jpg','jpeg','gif','png'); // File extensions
    $fileParts = pathinfo($_FILES['filedata']['name']);

    if (in_array($fileParts['extension'],$fileTypes)) {
        move_uploaded_file($tempFile,$targetFile);
        echo $_FILES['filedata']['name'];
    } else {
        echo 'Invalid file type.';
    }
}