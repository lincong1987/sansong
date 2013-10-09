<!DOCTYPE html>
<!--
 Copyright (c) 2012 Lincong All rights reserved.
 Mail lincong1987@gmail.com
 QQ 159257119
 This software is the confidential and proprietary information of Lincong,
 Inc. ("Confidential Information"). You shall not disclose such Confidential
 Information and shall use it only in accordance with the terms of the license
 agreement you entered into with Lincong.
$Id$
-->
<html>
    <head>
        <title>文件上传</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link href="${$smarty.const.WEB_HOST}js/uploadify/uploadify.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="${$smarty.const.WEB_HOST}js/jquery/jquery-1.6.4.min.js"></script>
        <script type="text/javascript" src="${$smarty.const.WEB_HOST}js/uploadify/jquery.uploadify.js"></script>
        <script type="text/javascript" src="${$smarty.const.WEB_HOST}js/icinfo/icinfo-1.0.0.min.source.js"></script>
        <style>
            html, body { overflow: hidden; margin: 0; padding: 0;}
        </style>
        <script>
            var spuer = icinfo.data.get(icinfo.url.getParameter("_id"));
            var type = icinfo.url.getParameter("type");
            var upfileManager = {
                list: []
            };
            upfileManager.add = function(obj) {
                this.list.push(obj);
            };
            $(function() {
                $("#upfile").uploadify({
                    debug: true,
                    auto: true,
                    buttonCursor: 'pointer',
                    buttonImage: false,
                    queueID: "material_upfile_box",
                    buttonText: decodeURIComponent(icinfo.url.getParameter("buttonText")) || "上传文件",
                    height: 20,
                    width: 120,
                    swf: '${$smarty.const.WEB_HOST}js/uploadify/uploadify.swf',
                    uploader: '${$smarty.const.WEB_HOST}php/Action/common/uploadAction.php?ac='+(icinfo.url.getParameter("action") === "doUploadFile" ? "doUploadFile" : "doUploadImage"),
                    queueSizeLimit: icinfo.url.getParameter("queueSizeLimit") || 2, //一    次上传文件数目
                    fileSizeLimit: icinfo.url.getParameter("fileSizeLimit") || '2000', //文件大小
                    uploadLimit: icinfo.url.getParameter("uploadLimit") || 2, //上传    队列中的最大值
                    fileTypeDesc: decodeURIComponent(icinfo.url.getParameter("fileTypeDesc")) || '请选择你要上传的文件', //支持文件格式,选择文件框    显示的文件类型
                    fileTypeExts: (decodeURIComponent(icinfo.url.getParameter("fileTypeExts")) ||  '*.gif; *.jpg; *.png; *.bmp').replace(/\+/g, " "),
                    removeCompleted: true,
                    fileObjName: "upfile",
                    formData: {
                    },
                    onSelectError: function(file, errorCode, errorMsg) {
                        //QUEUE_LIMIT_EXCEEDED FILE_EXCEEDS_SIZE_LIMIT INVALID_FILETYPE ZERO_BYTE_FILE
                        switch (errorCode||"") {
                            case "QUEUE_LIMIT_EXCEEDED":
                                errorMsg = "一次不能上传这么多";
                                break;
                            case "FILE_EXCEEDS_SIZE_LIMIT":
                                errorMsg = "文件太大了";
                                break;
                            case "INVALID_FILETYPE":
                                errorMsg = "此类型不被支持";
                                break;
                            case "ZERO_BYTE_FILE":
                                errorMsg = "这个是空文件";
                                break;
                            default :
                                errorMsg = "未知错误";
                                break;
                        }

                        alert('此文件: ' + file.name + ' 返回了一个错误: '+errorMsg+'，因此无法被上传.');
                    },
                    onUploadError: function(file, errorCode, errorMsg, errorString) {
                        alert('此文件: ' + file.name + ' 无法被上传: ' + errorString);
                    },
                    onUploadSuccess: function(file, data, response) {
                        var jsonData = $.parseJSON(data);
                        if (jsonData.state == "fail") {
                            alert("上传出错！");
                            return false;
                        }
                        upfileManager.add({
                            type: icinfo.url.getParameter("type"),
                            host: jsonData.msg.host,
                            name: jsonData.msg.name
                        });
                    },
                    onQueueComplete: function(queueData) {
                        if (queueData.uploadsSuccessful > 0) {
                            spuer.success(upfileManager.list, type);
                            location.reload();
                        }
                    }
                });
            });
        </script>
    </head>

    <body>
        <input type="file" id="upfile" name="upfile" />
        <div id="material_upfile_box"></div>
        <div id="material_upfile_list"></div>
    </body>
</html>
