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
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link href="${$smarty.const.WEB_HOST}css/base.css" rel="stylesheet" type="text/css" />
        <link href="${$smarty.const.WEB_HOST}css/common.css" rel="stylesheet" type="text/css" />
        <link href="${$smarty.const.WEB_HOST}css/master.css" rel="stylesheet" type="text/css" />
        <link href="${$smarty.const.WEB_HOST}css/form1.css" rel="stylesheet" type="text/css" />
        <link href="${$smarty.const.WEB_HOST}css/form2.css" rel="stylesheet" type="text/css" />
        <link href="${$smarty.const.WEB_HOST}js/uploadify/uploadify.css" rel="stylesheet" type="text/css" />

        <script type="text/javascript" src="${$smarty.const.WEB_HOST}js/jquery/jquery-1.8.0.min.js"></script>
        <script type="text/javascript" src="${$smarty.const.WEB_HOST}js/icinfo/icinfo-1.0.0.min.source.js"></script>
        <script type="text/javascript" src="${$smarty.const.WEB_HOST}js/artDialog4.1.6/jquery.artDialog.js?skin=chrome"></script>
        <script type="text/javascript" src="${$smarty.const.WEB_HOST}js/kindeditor/lang/zh_CN.js"></script>
        <script type="text/javascript" src="${$smarty.const.WEB_HOST}js/uploadify/jquery.uploadify.js"></script>
        <script>
            var _id = icinfo.url.parse()._id;

            icinfo.upload.host = "${$smarty.const.WEB_HOST}download/";
            icinfo.upload.action = "${$smarty.const.WEB_HOST}php/Action/common/uploadAction.php?" + $.param({
                ac: "doLayout",
                buttonText: "上传资料",
                fileSizeLimit: '20MB',
                queueSizeLimit: 2,
                uploadLimit: 2,
                fileTypeExts: "*.*",
                action: "doUploadFile"
            });

            $(function() {

                icinfo.upload.init("news_images", "file-item");

                icinfo.upload.showCurrentFile($("#path").val(), icinfo.upload.host, "news_images", "file-item");

                $("#display").val("${$downloadList[0].display}");

            });


            function doCommit() {
                var files = icinfo.upload.list;
                //校验
                if ($.trim($("#name").val()) === "") {
                    alert("请填写 ,名称！");
                    $("#name").focus();
                    return false;
                }

                if (files.length !== 1) {
                    alert("请上传资料！");
                    return false;
                }

                $("#path").val(files[0].name);

                $("#form").attr("action", "${$smarty.const.WEB_HOST}php/Action/admin/service/downloadAction.php?ac=doCommit&_id=" + _id).submit();
            }
        </script>
        <style type="text/css">
            em { font-style:normal }

            #news_images {

            }
            .file-item {
                display: inline-block;
                padding: 5px;
                border: 1px #ccc solid;
                background: #f2f2f2;
                margin-right: 5px;
                margin-bottom: 5px;
            }
            .file-item .fileName {
                background: #f2f2f2;
                border-bottom: 1px #ccc solid;
            }
            .file-item .fileToolbar a{
                padding: 0;
                margin: 0 10px 0 0;
            }
            .file-item img {
                display: none;
            }

            td, th {
                padding: 4px;
            }
        </style>
    </head>

    <body>
        <div class="main">
            <div class="listBox2 thBg">
                <div class="leftTop"></div>
                <div class="right1Top"></div>
                <form name="form" id="form" method="post" >
                    <input type="hidden" name="id" id="id" value="${$downloadList[0].id}" />
                    <table>
                        <tr>
                            <th width="120"><span class="tdBox">资料名称</span></th>
                            <td class="bgRNon"><span class="tdBox">
                                    <input type="text" maxlength="100" class="ie6Input" id="name" name="name" value="${$downloadList[0].name}" />
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th><span class="tdBox">是否显示</span></th>
                            <td class="bgRNon">
                                <span class="tdBox">
                                    <select id="display" name="display">
                                        <option value="0">否</option>
                                        <option value="1">是</option>
                                    </select>
                                </span>
                            </td>
                        </tr>
                        <tr id="company_news">
                            <th><span class="tdBox">上传</span></th>
                            <td class="bgRNon" align="left" valign="top" style="padding: 4px; text-align: left; vertical-align: top;">
                                <iframe type='news_images' frameborder="0" scrolling="no"></iframe><font style="font-size: 10px; font-family: sumsun">文件请控制在20MB内</font>
                                <div id="news_images"></div>
                                <input type="hidden" id="path" name="path" value="${$downloadList[0].path}"/>
                            </td>
                        </tr>
                    </table>
                    <div class="addButtonBox">
                        <input name="" type="button" class="saveBtn" id="saveBtn" onclick="doCommit();" value="保 存" />
                        <input name="" type="button" class="cancelBtn" id="cancelBtn" value="取 消" onclick="$.dialog.close();" />
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>