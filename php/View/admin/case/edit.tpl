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
            $(function() {

                $("#display").val("${$caseList[0].display|default:'1'}");

            });


            function doCommit() {
                var files = icinfo.upload.list;
                //校验
                if ($.trim($("#name").val()) === "") {
                    alert("请填写 案例名称！");
                    $("#name").focus();
                    return false;
                }
                if ($.trim($("#description").val()) === "") {
                    alert("请填写 案例描述！");
                    $("#description").focus();
                    return false;
                }

                if ($.trim($("#sort").val()) === "") {
                    alert("请填写 序号！");
                    $("#sort").focus();
                    return false;
                }

                $("#form").attr("action", "${$smarty.const.WEB_HOST}php/Action/admin/case/caseAction.php?ac=doCommit&_id=" + _id).submit();
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
                    <input type="hidden" name="id" id="id" value="${$caseList[0].id}" />
                    <table>
                        <tr>
                            <th width="120"><span class="tdBox">案例名称</span></th>
                            <td class="bgRNon">
                                <span class="tdBox">
                                    <input type="text" maxlength="100" class="ie6Input" id="name" name="name" value="${$caseList[0].name}" />
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th width="120"><span class="tdBox">案例描述</span></th>
                            <td class="bgRNon">
                                <span class="tdBox">
                                    <textarea id="description" name="description" class="textAreaStyle" style="width:680px; height:100px">${$caseList[0].description}</textarea>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th><span class="tdBox">序号</span></th>
                            <td class="bgRNon">
                                <span class="tdBox">
                                    <input type="text" maxlength="100" class="ie6Input" id="sort" name="sort" value="${$caseList[0].sort|default:'0'}" />
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