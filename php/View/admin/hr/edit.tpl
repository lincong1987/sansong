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
            var description, welfare;

            var tpl = {
                description: "<p>完善的社会保险：五大保险，公积金；</p>"
                        + "<p>健全的员工福利：工作午餐、节日福利、员工结婚贺金等；</p>"
                        + "<p>人性化的假期：带薪年休假、病假、 婚假、看护假、产假哺乳假等；</p>"
                        + "<p>健康计划：员工年度体检和健康咨询；</p>"
                        + "<p>其它福利：员工生日慰问、年度旅游津贴、医疗费补助等。</p>",
                welfare: "<p>1、计算机相关专业，全日制大专及以上学历； </p>"
                        + "<p>2、有良好的团队合作精神和客户沟通、协调能力；</p>"
                        + "<p>3、掌握sqL语言及会熟练运用一种开发工具； </p>"
                        + "<p>4、有吃苦耐劳精神，适应全国各地出差（住宿基本在酒店）； </p>"
                        + "<p>有工作经验者年薪5-8万 不含津贴工作内容：在酒店客户中安装、调试产品，同时给客户进行培训、跟班、业务指导及技术支持。</p>"

            };

            function insertTpl(type) {
                window[type].insertHtml(tpl[type]);
            }

            var editorConfig = function(type) {
                return {
                    items: [
                        "wordpaste", "|", "bold", "justifyleft", "justifycenter", "justifyright", "|", "preview", "fullscreen", 'source'
                    ],
                    allowFileManager: false,
                    allowFileUpload: false,
                    allowPreviewEmoticons: false,
                    allowImageUpload: false,
                    allowFlashUpload: false,
                    allowMediaUpload: false,
                    filterMode: true,
                    htmlTags: {
                        p: [".text-align"],
                        strong: []
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

                $("#display").val("${$hrList[0].display}");

                description = KindEditor.create('#description', editorConfig("description"));
                welfare = KindEditor.create('#welfare', editorConfig("welfare"));

            });


            function doCommit() {
                var files = icinfo.upload.list;
                //校验
                if ($.trim($("#title").val()) === "") {
                    alert("请填写 职位名称！");
                    $("#title").focus();
                    return false;
                }
                if ($.trim($("#education").val()) === "") {
                    alert("请填写 学历要求！");
                    $("#education").focus();
                    return false;
                }
                description.exec("removeformat");
                if (description.isEmpty()) {
                    alert("请填写 职位描述！");
                    description.focus();
                    return false;
                }
                description.sync();

                welfare.exec("removeformat");
                if (welfare.isEmpty()) {
                    alert("请填写 主要福利！");
                    welfare.focus();
                    return false;
                }
                welfare.sync();

                $("#form").attr("action", "${$smarty.const.WEB_HOST}php/Action/admin/hr/hrAction.php?ac=doCommit&_id=" + _id).submit();
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
                    <input type="hidden" name="id" id="id" value="${$hrList[0].id}" />
                    <table>
                        <tr>
                            <th width="120"><span class="tdBox">职位名称</span></th>
                            <td class="bgRNon"><span class="tdBox">
                                    <input type="text" maxlength="100" class="ie6Input" id="title" name="title" value="${$hrList[0].title}" />
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th width="120"><span class="tdBox">学历要求</span></th>
                            <td class="bgRNon"><span class="tdBox">
                                    <input type="text" maxlength="100" class="ie6Input" id="education" name="education" value="${$hrList[0].education}" />
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
                            <th><span class="tdBox">职位描述</span></th>
                            <td class="bgRNon">
                                编辑要点：从word复制的，请使用 从word黏贴 功能。点<a href='javascript:;' onclick='insertTpl("description");'>这里</a>插入模版
                                <span class="tdBox">
                                    <textarea id="description" name="description" class="textAreaStyle" style=" display:none; width:680px; height:100px">${$hrList[0].description}</textarea>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th><span class="tdBox">主要福利</span></th>
                            <td class="bgRNon">
                                编辑要点：从word复制的，请使用 从word黏贴 功能。点<a href='javascript:;' onclick='insertTpl("welfare");'>这里</a>插入模版
                                <span class="tdBox">
                                    <textarea id="welfare" name="welfare" class="textAreaStyle" style=" display:none; width:680px; height:100px">${$hrList[0].welfare}</textarea>
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