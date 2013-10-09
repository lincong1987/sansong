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
        <script type="text/javascript" src="${$smarty.const.WEB_HOST}js/kindeditor/kindeditor-all-min.js"></script>
        <script type="text/javascript" src="${$smarty.const.WEB_HOST}js/kindeditor/lang/zh_CN.js"></script>
        <script type="text/javascript" src="${$smarty.const.WEB_HOST}js/uploadify/jquery.uploadify.js"></script>
        <script>
            var _id = icinfo.url.parse()._id;
            var editor = null;

            icinfo.upload.host = "${$smarty.const.WEB_HOST}upload/";
            icinfo.upload.action = "${$smarty.const.WEB_HOST}php/Action/common/uploadAction.php?" + $.param({
                ac: "doLayout",
                buttonText: "上传图片",
                fileTypeExts: "*.gif; *.jpg; *.png; *.bmp"
            });

            $(function() {

                icinfo.upload.init("news_images", "file-item");

                icinfo.upload.showCurrentFile($("#pic").val(), icinfo.upload.host, "news_images", "file-item");

                setTimeout(function() {
                    $("#type").val("${$newsList[0].type|default:'company'}");
                    $("#display").val("${$newsList[0].display|default:'0'}");

                    $("#type").change(function() {
                        if ($(this).val() === "company") {
                            $("#company_news").show(0);
                        } else {
                            $("#company_news").hide(0);
                        }
                    }).change();

                }, 500);

                editor = KindEditor.create('#content', {
                    items: [
                        "wordpaste", "|", "bold", "justifyleft", "justifycenter", "justifyright", "|", "preview", "fullscreen", 'source'
                    ],
                    allowFileManager: false,
                    allowFileUpload: false,
                    allowPreviewEmoticons: false,
                    allowImageUpload: false,
                    allowFlashUpload: false,
                    allowMediaUpload: false,
                    uploadJson: "${$smarty.const.WEB_HOST}js/kindeditor/php/upload_json.php",
                    fileManagerJson: "${$smarty.const.WEB_HOST}js/kindeditor/php/file_manager_json.php",
                    filterMode: true,
                    htmlTags: {
                        p: [".text-align"],
                        strong: []
                    },
                    afterChange: function() {
                        //字数统计
                        KindEditor('#textNum').html("字数统计 " + this.count("html") + " ").css('color', this.count("html") > 6000 ? "red" : "green");
                    }
                });
            });


            function doCommit() {
                var files = icinfo.upload.list;
                //校验
                if ($.trim($("#title").val()) === "") {
                    alert("请填写 标题！");
                    $("#title").focus();
                    return false;
                }

                if ($("#type").val() === "company" && (files.length > 2)) {
                    alert("新闻动态需要1~2张配图，请上传图片！");
                    $("#title").focus();
                    return false;
                }
                editor.exec("removeformat");
                if (editor.isEmpty()) {
                    alert("请填写 内容！");
                    editor.focus();
                    return false;
                }
                editor.sync();
                var pics = [];
                $.each(files, function(i, file) {
                    pics.push(file.name);
                });

                $("#pic").val(pics.join(","));

                $("#form").attr("action", "${$smarty.const.WEB_HOST}php/Action/admin/news/newsAction.php?ac=doCommit&_id=" + _id).submit();
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
                width: 198px;
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
                    <input type="hidden" name="id" id="id" value="${$newsList[0].id}" />
                    <table>
                        <tr>
                            <th width="120"><span class="tdBox">新闻标题</span></th>
                            <td colspan="3" class="bgRNon"><span class="tdBox">
                                    <input type="text" maxlength="100" class="ie6Input" id="title" name="title" value="${$newsList[0].title}" />
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th><span class="tdBox">新闻类型</span></th>
                            <td class="bgRNon">
                                <span class="tdBox">
                                    <select id="type" name="type">
                                        <option value="company">新闻动态</option>
                                        <option value="industry">行业资讯</option>
                                    </select>
                                </span>
                            </td>
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
                            <th><span class="tdBox">配图</span></th>
                            <td colspan="3" class="bgRNon" align="left" valign="top" style="padding: 4px; text-align: left; vertical-align: top;">
                                <iframe type='news_images' frameborder="0" scrolling="no"></iframe><font style="font-size: 10px; font-family: sumsun">建议图片宽198px</font>
                                <div id="news_images"></div>
                                <input type="hidden" id="pic" name="pic" value="${$newsList[0].pic}"/>
                            </td>
                        </tr>
                        <tr>
                            <th><span class="tdBox">来源</span></th>
                            <td colspan="3" class="bgRNon">
                                <span class="tdBox">
                                    <input type="text" name="source" id="source" value="${$newsList[0].source}"/>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th><span class="tdBox">内容 </span></th>
                            <td colspan="3" class="bgRNon">
                                编辑要点：从word复制的，请使用 从word黏贴 功能。
                                <span class="tdBox">
                                    <textarea id="content" name="content" class="textAreaStyle" style=" display:none; width:680px; height:300px">${$newsList[0].content}</textarea>
                                </span>
                                <span id="textNum">0</span>
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