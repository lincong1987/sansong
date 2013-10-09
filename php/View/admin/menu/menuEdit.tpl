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
        <title>功能菜单维护</title>
        <link href="${$smarty.const.WEB_HOST}css/base.css" rel="stylesheet" type="text/css" />
        <link href="${$smarty.const.WEB_HOST}css/common.css" rel="stylesheet" type="text/css" />
        <link href="${$smarty.const.WEB_HOST}css/master.css" rel="stylesheet" type="text/css" />
        <link href="${$smarty.const.WEB_HOST}css/form1.css" rel="stylesheet" type="text/css" />
        <link href="${$smarty.const.WEB_HOST}css/form2.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="${$smarty.const.WEB_HOST}js/jquery/jquery-1.8.0.min.js"></script>
        <script type="text/javascript" src="${$smarty.const.WEB_HOST}js/icinfo/icinfo-1.0.0.min.source.js"></script>
        <script type="text/javascript" src="${$smarty.const.WEB_HOST}js/artDialog4.1.6/jquery.artDialog.js?skin=chrome"></script>
        <script type="text/javascript" src="${$smarty.const.WEB_HOST}js/ztree/jquery.ztree.core-3.0.min.js"></script>

        <script type="text/javascript">
            var url = icinfo.url.parse();
            var _id = url._id || "";

            var shareData = icinfo.data.get(_id);

            var id = "${$menuList[0].id}";

            var _tempAdd = '<label><input type="radio" name="pid" value="" id="pid1" checked="checked"/>新增同级菜单</label>'
                    + '<label><input type="radio" name="pid" value="" id="pid2" />新增子菜单</label>';

            var _tempModi = '<input type="hidden" name="pid" id="pid" value="${$menuList[0].pid}" />';

            $(function() {
                //设置标题
                $("#title").html('功能菜单维护' + shareData.data.title);
                if (id == "") {
                    //新增
                    $("#parentCon").html(_tempAdd);
                    $("#pid1").val(shareData.data.node.parentNode == null ? 0 : shareData.data.node.treeNode.pid);
                    $("#pid2").val(shareData.data.node.treeNode.id);
                } else {
                    //修改
                    $("#parentCon").html(shareData.data.node.parentNode == null ? "没有了" + _tempModi : shareData.data.node.parentNode.name + _tempModi);
                }

                setTimeout(function() {
                    $("#name").focus();
                }, 500);
            });

            function doCommit() {
                //校验
                if ($.trim($("#name").val()) == "") {
                    alert("请填写 菜单名称！");
                    $("#name").focus();
                    return false;
                }

                if ($.trim($("#href").val()) == "") {
                    alert("请填写 菜单地址！");
                    $("#href").focus();
                    return false;
                }

                if ($.trim($("#sort").val()) == "") {
                    alert("请填写 菜单序号！");
                    $("#sort").focus();
                    return false;
                }

                $("#form").attr({
                    action: "${$smarty.const.WEB_HOST}php/Action/admin/menu/menuAction.php?" + $.param({
                        ac: "doCommit",
                        _id: _id
                    })
                }).submit();

            }
        </script>
        <style>
            .readonly { background:#eee; color:#666; border: #CCC 1px solid}
            td, th { height:25px; padding:4px}
        </style>
    </head>

    <body>
        <div class="main">
            <h1 id="title">功能菜单维护</h1>
            <form id="form" name="form" method="post" >
                <input type="hidden" name="id" value="${$menuList[0].id}" />

                <div class="listBox2 thBg">
                    <div class="leftTop"></div>
                    <div class="right1Top"></div>
                    <table width="100%" border="0">
                        <tr>
                            <th valign="middle" width="100" class="lb_1">上级菜单</th>
                            <td id="parentCon">

                            </td>
                        </tr>
                        <tr>
                            <th valign="middle" class="lb_1">菜单名称</th>
                            <td >
                                <input type="text" name="name" id="name" value="${$menuList[0].name}"/>
                            </td>
                        </tr>
                        <tr>
                            <th class="lb_1">菜单地址</th>
                            <td>
                                <input type="text" name="href" id="href" value="${$menuList[0].href}"/>
                            </td>
                        </tr>
                        <tr>
                            <th class="lb_1">菜单序号</th>
                            <td>
                                <input type="text" name="sort" id="sort" value="${$menuList[0].sort}"/>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="addButtonBox">
                    <input name="" type="button" class="saveBtn" onclick="doCommit();" value="保 存" />
                    <input name="" type="button" class="cancelBtn" id="cancelBtn" value="取 消" onclick="$.dialog.close();" />
                </div>
            </form>
        </div>
    </body>
</html>