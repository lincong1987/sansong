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
        <link href="${$smarty.const.WEB_HOST}js/dhtmlx/container/css/dhtmlxlayout.css" rel="stylesheet" type="text/css" />
        <link href="${$smarty.const.WEB_HOST}js/dhtmlx/container/css/dhtmlxlayout_dhx_skyblue.css" rel="stylesheet" type="text/css" />
        <link href="${$smarty.const.WEB_HOST}css/ztree/ztree.css" rel="stylesheet" type="text/css" />

        <script type="text/javascript" src="${$smarty.const.WEB_HOST}js/jquery/jquery-1.8.0.min.js"></script>
        <script type="text/javascript" src="${$smarty.const.WEB_HOST}js/icinfo/icinfo-1.0.0.min.source.js"></script>
        <script type="text/javascript" src="${$smarty.const.WEB_HOST}js/dhtmlx/grid/dhtmlxcommon.js"></script>
        <script type="text/javascript" src="${$smarty.const.WEB_HOST}js/dhtmlx/grid/dhtmlxgrid.js"></script>
        <script type="text/javascript" src="${$smarty.const.WEB_HOST}js/dhtmlx/grid/dhtmlxgridcell.js"></script>
        <script type="text/javascript" src="${$smarty.const.WEB_HOST}js/ztree/jquery.ztree.core-3.0.min.js"></script>

        <script type="text/javascript">

            var treeData = [];
            var isRefrese = false;
            var loc = location.search;
            var tree1Resize = null;
            var _node = null;

            var url = icinfo.url.parse();

            $(function() {
                $(".progressBar").attr({
                    title: "系统处理中...请稍后..."
                });

                $("#tree1").css({
                    height: $(window).height() - 120,
                    width: "200px"
                });
                $(".leftCtt").css({
                    height: $(window).height() - 120,
                    width: "220px"
                });
                $(".rightCtt").css({
                    width: $(window).width() - 260
                });

                $(window).resize(function() {
                    window.clearTimeout(tree1Resize);
                    tree1Resize = window.setTimeout(function() {
                        $("#tree1").css({
                            height: $(window).height() - 120,
                            width: "200px"
                        });
                        $(".leftCtt").css({
                            height: $(window).height() - 120,
                            width: "220px"
                        });
                        $(".rightCtt").css({
                            width: $(window).width() - 240
                        });
                    },
                            500);
                });

                loadTree();

                try {
                    parent.dhxLayout.cells("c").progressOff();
                } catch (e) {
                }
            });
            function loadTree() {
                $.ajax({
                    type: 'GET',
                    url: '${$smarty.const.WEB_HOST}php/Action/admin/menu/menuAction.php',
                    data: {
                        ac: "doGetMenu",
                        _t: new Date().getTime()
                    },
                    dataType: "json",
                    error: function(e1, e2, e3) {
                        alert(e1 + e2 + e3);
                    },
                    success: function(json) {
                        treeData = json.msg;
                        $.each(treeData, function(i, data) {
                            $.each(data, function(k, v) {
                                treeData[i].open = true;
                            });
                        });
                        $.fn.zTree.init($("#tree1"), {
                            callback: {
                                onClick: function(event, treeId, treeNode) {
                                    $("#success").slideUp();
                                    _node = {
                                        parentNode: treeNode.getParentNode(treeNode),
                                        treeNode: treeNode,
                                        treeId: treeId
                                    };
                                    showDetailFunction();
                                    $(".bmgl").html("功能菜单维护 - " + treeNode.name);
                                    $(".tbl").fadeIn();
                                }
                            },
                            data: {
                                key: {
                                    name: "name",
                                    title: "name"
                                },
                                simpleData: {
                                    enable: true,
                                    idKey: "id",
                                    pIdKey: "pid"
                                }
                            }
                        },
                        treeData);
                    }
                });
            }
            ;

            function showDetailFunction() {
                $("#parentID").html(_node.parentNode == null ? "--" : _node.parentNode.name);
                $("#name").html(_node.treeNode.name);
                $("#href").html(_node.treeNode.href);
                $("#sort").html(_node.treeNode.sort);
            }

            function doAddRow() {
                var _id = "_doAddRow_" + new Date().getTime();
                var url = "${$smarty.const.WEB_HOST}php/Action/admin/menu/menuAction.php?ac=editMenu&_id=" + _id;
                icinfo.data.set(_id, {
                    url: url,
                    data: {
                        node: _node,
                        title: " - 新增 "
                    },
                    width: 700,
                    height: 250,
                    complete: function() {
                        complete();
                    },
                    success: function() {
                        alert("添加成功！");
                    },
                    error: function() {
                        alert("添加失败！");
                    }
                });
                try {
                    parent.share(_id);
                } catch (e) {
                    alert("发生错误:\n" + e);
                }
            }
            function doModRow() {
                var _id = "_doModRow_" + new Date().getTime();
                var url = "${$smarty.const.WEB_HOST}php/Action/admin/menu/menuAction.php?id=" + _node.treeNode.id + "&ac=editMenu&_id=" + _id;
                icinfo.data.set(_id, {
                    url: url,
                    data: {
                        node: _node,
                        title: " - 修改 - " + _node.treeNode.name
                    },
                    width: 700,
                    height: 250,
                    complete: function() {
                        complete();
                    },
                    success: function() {
                        alert("修改成功！");
                    },
                    error: function() {
                        alert("修改失败！");
                    }
                });
                try {
                    parent.share(_id);
                } catch (e) {
                    alert("发生错误:\n" + e);
                }
            }

            //删除
            function doDelRow() {

                if (!confirm("您确定这么做吗？")) {
                    return false;
                }
                if (_node == null) {
                    alert("请先选择一项 菜单！");
                    return false;
                }

                var input = "<" + "input name='functionList[0].id' value='" + _node.treeNode.id + "' /" + ">";

                var $form = $("<form></form>").append(input),
                        _id = "_doRm_" + new Date().getTime();

                var $target = $("<iframe name='target_" + _id + "'></iframe>");

                icinfo.data.set(_id, {
                    data: {type: "del"},
                    complete: function() {
                        complete();
                    },
                    success: function() {
                        alert("删除成功！");
                    },
                    error: function() {
                        alert("删除失败！");
                    }
                });
                $target.css({display: "none"});
                ;
                $form.attr({
                    action: "${$smarty.const.WEB_HOST}php/Action/admin/menu/menuAction.php?id=" + _node.treeNode.id + "&ac=delMenu&_id=" + _id,
                    name: "form_" + _id,
                    id: "form_" + _id,
                    method: "post",
                    target: "target_" + _id
                }).css({display: "none"});

                $("body").append($form, $target);

                $form.submit();
            }

            function complete(){
                parent.dhxLayout.cells("b").attachURL('${$smarty.const.WEB_HOST}php/Action/admin/menu/menuAction.php?ac=doLayout');
                setTimeout(function(){
                    location.reload();
                }, 500);
            }
        </script>
        <style>
            #tree1 { overflow:auto }
            .btnbox_rywh, .tbl, #success { display:none }
        </style>
    </head>

    <body>
        <div class="main1">
            <h4><span class="slsc">功能菜单维护</span></h4>
            <div class="leftCtt">
                <h2><span class="bmlb">功能菜单列表</span></h2>
                <div>
                    <ul class="ztree" id="tree1">
                        <li>载入功能菜单列表中...</li>
                    </ul>
                </div>
            </div>
            <div class="rightCtt">
                <h2><span class="bmgl">功能菜单维护 - 请先选择一个功能</span>
                    <div class="tips">提示：请先选中一项功能菜单信息</div>
                    <div class="clr"></div>
                </h2>
                <div class="notification success png_bg" id="success"> <a href="javascript:;" onClick="$(this).parent().slideUp();" class="close"><img src="${$smarty.const.WEB_HOST}images/common/cross_grey_small.png" alt="关闭"></a>
                    <div> 提示 <span id="successMsg">操作</span>成功！ </div>
                </div>
                <div class="btnbox_rywh tbl">
                    <ul><li>&nbsp;&nbsp;&nbsp;&nbsp;</li>
                        <li>
                            <input name="" type="button" class="btn_add" onClick="doAddRow();" />
                        </li>
                        <li>
                            <input name="" type="button" class="btn_modify" onClick="doModRow();" />
                        </li>
                        <li>
                            <input name="" type="button" class="btn_delete" onClick="doDelRow();" />
                        </li>

                    </ul>
                </div>
                <div class="table_1 tbl">
                    <table width="100%" border="0">
                        <tr>
                            <td width="100" class="lb_1">上级菜单</td>
                            <td><span id="parentID"></span>
                                <input type="hidden" value="" id="functionId" /></td>
                        </tr>
                        <tr>
                            <td class="lb_1">菜单名称</td>
                            <td><span id="name"></span></td>
                        </tr>
                        <tr>
                            <td class="lb_1">菜单地址</td>
                            <td><span id="href"></span></td>
                        </tr>
                        <tr>
                            <td class="lb_1">菜单序号</td>
                            <td><span id="sort"></span></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="clr"></div>
        </div>
    </body>
</html>