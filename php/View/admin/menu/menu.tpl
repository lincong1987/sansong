<!DOCTYPE html>
<!--
 Copyright (c) 2013 Lincong All rights reserved.
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
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>菜单</title>
        <link href="${$smarty.const.WEB_HOST}css/common.css" rel="stylesheet" type="text/css" />
        <link href="${$smarty.const.WEB_HOST}css/homepage.css" rel="stylesheet" type="text/css" />
        <link href="${$smarty.const.WEB_HOST}css/admin/menu/menu.css" rel="stylesheet" type="text/css" />
        <link href="${$smarty.const.WEB_HOST}css/ztree/xiruanZtree.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="${$smarty.const.WEB_HOST}js/jquery/jquery-1.8.0.min.js"></script>
        <script type="text/javascript" src="${$smarty.const.WEB_HOST}js/ztree/jquery.ztree.core-3.0.min.js"></script>
        <style>
            body,
            .ztree { background:#f0f5f8; }
        </style>
        <script>
            var tree = {
                treeId: "#tree1", //div的id
                url: '${$smarty.const.WEB_HOST}php/Action/admin/menu/menuAction.php',
                send: {
                    ac: "doGetMenu",
                    t: new Date().getTime()}, //附加的查询参数k/v格式
                type: "get", //ajax请求方式
                root: "msg", //jsonList 的key
                onError: function(e1, e2, e3) {
                }, //异常回调
                onSuccess: function() {					//成功回调
                    try {
                        parent.dhxLayout.cells("b").progressOff();
                    } catch (e) {
                    }
                },
                onClick: function(event, treeId, treeNode) {		//节点点击事件
                    //判断是否为父节点
                    if (!treeNode.isParent) {
                        parent.dhxLayout.cells("c").progressOn();
                        parent.dhxLayout.cells("c").attachURL('${$smarty.const.WEB_HOST}' + treeNode.href + '#t_' + new Date().getTime());
                    }
                },
                key: {//配置参数
                    name: "name",
                    title: "name",
                    idKey: "id",
                    pIdKey: "pid",
                    enable: true
                }
            };

            function loadTree() {
                if (!tree) {
                    alert("树配置不存在！");
                    return false;
                }
                $.ajax({
                    type: tree.type,
                    url: tree.url,
                    data: tree.send,
                    dataType: "json",
                    error: function(e1, e2, e3) {
                        console.log("XIRUAN AJAX ERROR:", e1, e2, e3);
                    },
                    success: function(json) {
                        tree.data = json[tree.root];
                        $.each(tree.data, function(i, data) {
                            $.each(data, function(k, v) {
                                tree.data[i].open = true;
                            });
                        });
                        $.fn.zTree.init($(tree.treeId), {
                            view: {
                                showIcon: false,
                                showLine: false,
                                showTitle: false,
                                nameIsHTML: true
                            },
                            callback: {
                                onClick: function(event, treeId, treeNode) {
                                    tree.onClick(event, treeId, treeNode);
                                    return false;
                                }
                            },
                            data: {
                                key: {
                                    name: tree.key.name,
                                    title: tree.key.name
                                },
                                simpleData: {
                                    enable: tree.key.enable,
                                    idKey: tree.key.idKey,
                                    pIdKey: tree.key.pIdKey,
                                    rootPid: "0"
                                }
                            }
                        }, tree.data);
                        tree.onSuccess();
                    }
                });
            }
            ;

            $(function() {
                loadTree();
            });
        </script>
    </head>

    <body style="overflow-x: hidden; padding: 0; margin: 0;">
        <div >
            <ul id="tree1" class="ztree" ></ul>
        </div>
    </body>
</html>
