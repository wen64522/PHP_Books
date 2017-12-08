<?php
include ('../../books/common/db.php');
$sql="select * from book_phototype";
$result=$mysqli->query($sql);
while($row=mysqli_fetch_array($result)){
    $rows[]=$row;
}
$mysqli->close();
?>
<html>
<head>
    <meta charset="utf-8">
    <script type="text/javascript" src="../../public/js/jquery-3.2.1.js" ></script>
    <script type="text/javascript" src="../../public/uploadify/jquery.uploadify.js"></script>
    <link rel="stylesheet" href="../../public/css/news_add.css">
    <link rel="stylesheet" type="text/css" href="../../public/uploadify/uploadify.css">
</head>
<body>
<div id="main">
    <a href="photo.php">相册管理</a>/
    <a href="add_photo.php">添加照片</a>/
    <a href="add_photo_type.php">创建相册</a>
    <hr>
    <h1>添加照片</h1>
    <div id="photo">
        <form method="post" action="add_photo.suc.php">
            <label for="p_name">照片名称:</label>
            <input type="text" name="pname" id="p_name"><br> <br>
            <label for="ptype">照片相册:</label>
            <select id="ptype" name="phototype">
                <?php foreach($rows as $row){ ?>
            <option value="<?php echo $row['phototype'] ?>">
                <?php echo $row['phototype'] ?>
            </option>
            <?php }?>
            </select>
            <br> <br>
            <label for="file_upload">照片上传:</label><br><br>
            <input id="file_upload" name="file_upload" type="file" multiple="true">
            <div id="show"></div>
            <div id="queue"></div>
            <h4>操作:</h4>
            <a href="javascript:$('#file_upload').uploadify('upload', '*');">开始上传</a>  |
            <a href="javascript:$('#file_upload').uploadify('cancel', '*');">清除队列</a>  |
            <a href="javascript:$('#file_upload').uploadify('disable', true);">禁用上传</a>  |
            <a href="javascript:$('#file_upload').uploadify('disable', false);">激活上传</a>  |
            <a href="javascript:$('#file_upload').uploadify('stop');">停止上传</a>  |
            <a href="javascript:changeBtnText();">变换按钮</a>
            <h4>大小:</h4>
            <div id='progress'></div>
            <br>
            <label for="p_mess">照片描述:</label><br>
            <textarea style="width: 300px;height: 150px" id="p_mess" name="pmess"></textarea><br> <br>
            <input type="submit" value="完成" name="submit" >
        </form>
    </div>
</div>
<script type="text/javascript">
    <?php $timestamp = time();?>
    $(function() {
        $('#file_upload').uploadify({
            'debug'         : false,
            'auto'          : false,             //是否自动上传,
            'buttonText'    : '选择图片',       //按钮文字
            'method'   : 'post',
            'height'        : 30,               //按钮高度
            'width'         : 100,              //按钮宽度

            'fileObjName'   : 'filedata',           //默认 Filedata, $_FILES控件名称
            'fileSizeLimit' : '1024KB',          //文件大小限制 0为无限制 默认KB
            'fileTypeDesc'  : 'All Files',       //图片选择描述
            'fileTypeExts'  : '*.gif; *.jpg; *.png',//文件后缀限制 默认：'*.*'
            'formData'      : {
                'timestamp' : '<?php echo $timestamp;?>',
                'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'},//传输数据JSON格式
            //'overrideEvents': ['onUploadProgress'],  // The progress will not be updated
            //'progressData' : 'speed',             //默认percentage 进度显示方式
            'queueID'       : 'queue',              //默认队列ID
            'queueSizeLimit': 20,                   //一个队列上传文件数限制
            'removeCompleted' : false,               //完成时是否清除队列 默认true
            'removeTimeout'   : 3,                  //完成时清除队列显示秒数,默认3秒
            'requeueErrors'   : false,              //队列上传出错，是否继续回滚队列
            'successTimeout'  : 5,                  //上传超时
            'uploadLimit'     : 10,                 //允许上传的最多张数
            'swf'  : '../../public/uploadify/uploadify.swf', //swfUpload
            'uploader': '../../public/uploadify/handle.php', //服务器端脚本


            //修改formData数据
            'onUploadStart' : function(file) {
                $("#file_upload").uploadify("settings", "someOtherKey", 2);
            },
            //删除时触发
            'onCancel' : function(file) {
                // alert('The file ' + file.name + '--' + file.size + ' was cancelled.');
            },
            //清除队列
            'onClearQueue' : function(queueItemCount) {
                // alert(queueItemCount + ' file(s) were removed from the queue');
            },
            //每次初始化一个队列是触发
            'onInit' : function(instance){
                // alert('The queue ID is ' + instance.settings.queueID);
            },
            //上传成功
            'onUploadSuccess' : function(file, data, response) {
                var data = $.trim(data);
                imgObj= "<input type='hidden'  name='photos[]' value="+data+" >";
                $("#show").append(imgObj);
            },
            //上传错误
            'onUploadError' : function(file, errorCode, errorMsg, errorString) {
                alert('The file ' + file.name + ' could not be uploaded: ' + errorString);
            },
            //上传汇总
            'onUploadProgress' : function(file, bytesUploaded, bytesTotal, totalBytesUploaded, totalBytesTotal) {
                $('#progress').html(totalBytesUploaded + ' bytes uploaded of ' + totalBytesTotal + ' bytes.');
            },
            //上传完成
            'onUploadComplete' : function(file) {
                // alert('The file ' + file.name + ' finished processing.');
            },

        });
    });


    //变换按钮
    function changeBtnText() {
        $('#file_upload').uploadify('settings','buttonText','继续上传');
    }


    //返回按钮
    function returnBtnText() {
        alert('The button says ' + $('#file_upload').uploadify('settings','buttonText'));
    }
</script>
</body>
</html>