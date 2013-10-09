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
        <script>
            var _id = icinfo.url.parse()._id;

            var content;
            var tpl = {
                content: "<dl>"
                        + "<dt>[][]办事处</dt>"
                        + "<dd>总部地址：</dd>"
                        + "<dd>总 机：</dd>"
                        + "<dd>传 真：</dd>"
                        + "<dd>邮 编：</dd>"
                        + "<dd>维护传真：</dd>"
                        + "<dd>邮箱：</dd>"
                        + "</dl>"
            };

            function insertTpl(type) {
                window[type].insertHtml(tpl[type]);
            }

            var editorConfig = function(type) {
                return {
                    items: [
                        "wordpaste", "link", "|", "indent", "outdent", "|", "preview", "fullscreen", 'source'
                    ],
                    allowFileManager: false,
                    allowFileUpload: false,
                    allowPreviewEmoticons: false,
                    allowImageUpload: false,
                    allowFlashUpload: false,
                    allowMediaUpload: false,
                    filterMode: true,
                    htmlTags: {
                        dl: [],
                        dt: [],
                        dd: [],
                        a: ["href"]
                    },
                    afterChange: function() {
                        //字数统计
                        if ($('#textNum_' + type).length === 0) {
                            $('#' + type).after("<span id='textNum_" + type + "'>0</span>");
                        }
                        KindEditor('#textNum_' + type).html("字数统计 " + this.count("html") + " ").css('color', this.count("html") > 6000 ? "red" : "green");
                    }
                };
            };

            $(function() {

                $("#display").val("${$contactList[0].display|default:'0'}");
                var coords = $("#coords").val();
                $("#coords").val($.trim(coords).replace(/,/g, ' '));

                content = KindEditor.create('#content', editorConfig("content"));

            });


            function doCommit() {
                //校验
                if ($.trim($("#title").val()) === "") {
                    alert("请填写 名称（地区）！");
                    $("#title").focus();
                    return false;
                }

                if ($.trim($("#coords").val()) === "") {
                    alert("请填写 坐标！");
                    $("#coords").focus();
                    return false;
                }

                content.exec("removeformat");
                if (content.isEmpty()) {
                    alert("请填写 内容！");
                    content.focus();
                    return false;
                }
                content.sync();

                var coords = $("#coords").val();
                $("#coords").val($.trim(coords).replace(/\s/g, ','));

                $("#form").attr("action", "${$smarty.const.WEB_HOST}php/Action/admin/contact/contactAction.php?ac=doCommit&_id=" + _id).submit();
            }
        </script>
        <style type="text/css">
            em { font-style:normal }
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
                    <input type="hidden" name="id" id="id" value="${$contactList[0].id|default:''}" />
                    <table>
                        <tr>
                            <th width="120"><span class="tdBox">名称</span></th>
                            <td class="bgRNon">
                                <span class="tdBox">
                                    <input type="text" maxlength="100" class="ie6Input" id="title" name="title" value="${$contactList[0].title|default:''}" />
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th width="120"><span class="tdBox">坐标(x y r)</span></th>
                            <td class="bgRNon">
                                <span class="tdBox">
                                    <input type="text" maxlength="100" class="ie6Input" id="coords" name="coords" value="${$contactList[0].coords|default:''}" />
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
                        <tr>
                            <th><span class="tdBox">联系内容</span></th>
                            <td class="bgRNon">
                                编辑要点：从word复制的，请使用 从word黏贴 功能。点<a href='javascript:;' onclick='insertTpl("content");'>这里</a>插入模版
                                <span class="tdBox">
                                    <textarea id="content" name="content" class="textAreaStyle" style=" display:none; width:680px; height:200px">${$contactList[0].content|default:''}</textarea>
                                </span>
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