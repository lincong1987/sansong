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

                ${if $actionMessage=='modi_success'}
                top.icinfo.notify.success();
                ${/if}

                try {
                    parent.dhxLayout.cells("c").progressOff();
                } catch (e) {
                }
            });

            function doCommit() {
                //校验
                if ($.trim($("#caseyear").val()) === "") {
                    alert("请填写 截止到年！");
                    $("#caseyear").focus();
                    return false;
                }
                if ($.trim($("#casemonth").val()) === "") {
                    alert("请填写 截止到月！");
                    $("#casemonth").focus();
                    return false;
                }
                if ($.trim($("#casedate").val()) === "") {
                    alert("请填写 截止到日！");
                    $("#casedate").focus();
                    return false;
                }
                if ($.trim($("#casetotalcount").val()) === "") {
                    alert("请填写 西软酒店总用户！");
                    $("#casetotalcount").focus();
                    return false;
                }
                if ($.trim($("#casehighstardate").val()) === "") {
                    alert("请填写 高星级酒店数！");
                    $("#casehighstardate").focus();
                    return false;
                }

                $("#form").attr("action", "${$smarty.const.WEB_HOST}php/Action/admin/case/caseAction.php?ac=doCommitCaseParam&_id=" + _id).submit();
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
            <div>
                ${$actionError|default:''}
            </div>
            <div class="listBox2 thBg">
                <div class="leftTop"></div>
                <div class="right1Top"></div>
                <form name="form" id="form" method="post" >
                    <input type="hidden" name="id" id="id" value="${$caseParamList[0].id}" />
                    <table>
                        <tr>
                            <th width="120"><span class="tdBox">截止到年</span></th>
                            <td colspan="3" class="bgRNon"><span class="tdBox">
                                    <input type="text" maxlength="100" class="ie6Input" id="caseyear" name="caseyear" value="${$caseParamList[0].caseyear}" />
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th width="120"><span class="tdBox">截止到月</span></th>
                            <td colspan="3" class="bgRNon"><span class="tdBox">
                                    <input type="text" maxlength="100" class="ie6Input" id="casemonth" name="casemonth" value="${$caseParamList[0].casemonth}" />
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th width="120"><span class="tdBox">截止到日</span></th>
                            <td colspan="3" class="bgRNon"><span class="tdBox">
                                    <input type="text" maxlength="100" class="ie6Input" id="casedate" name="casedate" value="${$caseParamList[0].casedate}" />
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th width="120"><span class="tdBox">西软酒店总用户</span></th>
                            <td colspan="3" class="bgRNon"><span class="tdBox">
                                    <input type="text" maxlength="100" class="ie6Input" id="casetotalcount" name="casetotalcount" value="${$caseParamList[0].casetotalcount}" />
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th width="120"><span class="tdBox">高星级酒店</span></th>
                            <td colspan="3" class="bgRNon"><span class="tdBox">
                                    <input type="text" maxlength="100" class="ie6Input" id="casehighstardate" name="casehighstardate" value="${$caseParamList[0].casehighstardate}" />
                                </span>
                            </td>
                        </tr>

                    </table>
                    <div class="addButtonBox">
                        <input name="" type="button" class="saveBtn" id="saveBtn" onclick="doCommit();" value="保 存" />
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>