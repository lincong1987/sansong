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
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>西软网站后台</title>
        ${include file="${$smarty.const.Q_ROOT}/include/meta.tpl"}
        <link href="${$smarty.const.WEB_HOST}css/base.css" rel="stylesheet" type="text/css" />
        <link href="${$smarty.const.WEB_HOST}css/master.css" rel="stylesheet" type="text/css" />
        <link href="${$smarty.const.WEB_HOST}css/homepage.css" rel="stylesheet" type="text/css" />
        <link href="${$smarty.const.WEB_HOST}css/common.css" rel="stylesheet" type="text/css" />
        <link href="${$smarty.const.WEB_HOST}js/jqueryui/css/hxkf/hxkf.css" rel="stylesheet" type="text/css" />


        <link href="${$smarty.const.WEB_HOST}js/dhtmlx/container/css/dhtmlxlayout.css" rel="stylesheet" type="text/css" />
        <link href="${$smarty.const.WEB_HOST}js/dhtmlx/container/css/dhtmlxlayout_dhx_skyblue.css" rel="stylesheet" type="text/css" />

        <script type="text/javascript" src="${$smarty.const.WEB_HOST}js/jquery/jquery-1.6.4.min.js"></script>
        <script type="text/javascript" src="${$smarty.const.WEB_HOST}js/jqueryui/js/jquery-ui-1.8.23.min.js"></script>
        <script type="text/javascript" src="${$smarty.const.WEB_HOST}js/icinfo/icinfo-1.0.0.min.source.js"></script>
        <script type="text/javascript" src="${$smarty.const.WEB_HOST}js/dhtmlx/container/js/dhtmlxcommon.js"></script>
        <script type="text/javascript" src="${$smarty.const.WEB_HOST}js/dhtmlx/container/js/dhtmlxlayout.js"></script>
        <script type="text/javascript" src="${$smarty.const.WEB_HOST}js/dhtmlx/container/js/dhtmlxcontainer.js"></script>
        <script type="text/javascript" src="${$smarty.const.WEB_HOST}js/artDialog4.1.6/jquery.artDialog.js?skin=chrome"></script>
        <style type="text/css">
            html, body {
                width: 100%;
                height: 100%;
                margin: 0px;
                padding: 0px;
                overflow: hidden;
            }
            .menu {
                font-size: 12px;
            }
            table.dhtmlxLayoutPolyContainer_dhx_skyblue td.dhtmlxLayoutPolySplitterVer { background: #F0F5F8; border-image: none; border-left: 1px #C1C1C1 solid}
            #dhxcont_global_layout_area { top: 0; left: 0; width: 100%; }
            #leftMenu { overflow-y:auto !important }
            #menuBox { display:none; }
            #bulletins {}
            #bulTitle {}
            #bulAuthId {margin: 5px 0}
            #bulContent { border: 1px #e9e8e8 solid; padding: 5px; overflow-x: hidden; overflow-y: auto; margin: 5px 0 0 0}
            #bulContent, #bulContent p {
                font-size: 14px;
                line-height: 23px;
                text-indent: 2em;
                font-family: '宋体'
            }
            #cboxTitle { display: none }

        </style>
    </head>

    <body>
        <div id="topNav" class="headerBg">
            <div class="header">
                <div class="headerTop">
                    <div class="logo" style="line-height:40px; padding-left:93px;">
                        <div style="font-size:22px; font-family:'Microsoft YaHei', 'SimHei', 'SimSun'; color:#fefe00; float:left;">西软科技网站后台
                            <span style="font-size:12px; font-family:'Microsoft YaHei', 'SimHei', 'SimSun'; color:#0b3f69;">&nbsp;欢迎使用</span></div>
                    </div>
                    <div class="menu">
                        <span>${$smarty.session.SESSION_USER.nickname}，您好！</span>
                        <a href="#" class="icon_view" onclick="dhxLayout.cells('c').attachURL('${$smarty.const.WEB_HOST}php/Action/admin/welcome/welcomeAction.php?ac=doLayout');">首页</a>
                        <a href="#" class="icon_quit" onclick="doLogout();">退出</a>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
                            var emptyObject = {
                            };
                            icinfo.namespace("notify");

                            icinfo.loader.css("${$smarty.const.WEB_HOST}js/notify/jquery.pnotify.default.css");
                            icinfo.loader.css("${$smarty.const.WEB_HOST}js/notify/jquery.pnotify.default.icons.css");
                            icinfo.loader.js("${$smarty.const.WEB_HOST}js/notify/jquery.pnotify.js");

                            icinfo.notify = {
                                top: function(options) {
                                    $.pnotify($.extend(true, {
                                        type: "success",
                                        title: '成功',
                                        text: '您的操作已成功'
                                    }, options || emptyObject));
                                },
                                success: function(options) {
                                    $.pnotify($.extend(true, {
                                        type: "success",
                                        title: '成功',
                                        text: '您的操作已成功'
                                    }, options || emptyObject));
                                },
                                error: function(options) {
                                    $.pnotify($.extend(true, {
                                        type: "error",
                                        title: '错误',
                                        text: '发生未知错误，您的操作可能没有成功'
                                    }, options || emptyObject));
                                },
                                notice: function(options) {
                                    $.pnotify($.extend(true, {
                                        type: "notice",
                                        title: '警告',
                                        text: '此操作有可能会遇到未知问题'
                                    }, options || emptyObject));
                                },
                                info: function(options) {
                                    $.pnotify($.extend(true, {
                                        type: "info",
                                        title: '消息',
                                        text: '消息提示'
                                    }, options || emptyObject));
                                }
                            };
                            var dhxLayout;
                            var dhxLayoutData = {
                                parent: $("body").get(0),
                                pattern: "3T",
                                cells: [
            {
                            id: "a", height: 50
                        }
                        , {
                            id: "b", text: "左侧菜单，按ctrl+m 隐藏或显示", width: 160
                        }
                        , {
                            id: "c"
                        }
                    ]
                };

                dhxLayout = new dhtmlXLayoutObject(dhxLayoutData);

                $(function() {

                    /**
                     * the nav menu DOM structure
                     *
                     * <div>
                     *      <ul>
                     *          <li><a>menu1</a></li>
                     *          <li><a>menu2</a></li>
                     *      </ul>
                     * </div>
                     *
                     */
                    // $(".permission_element:eq(0) a").addClass("topnavBg"); //topnavBg

                    // hide all default layout headers
                    dhxLayout.cells("a").hideHeader();
                    dhxLayout.cells("b").hideHeader();
                    dhxLayout.cells("c").hideHeader();
                    // dhxLayout.cells("d").hideHeader();

                    // attach URL/ Object on each cell
                    dhxLayout.cells("a").attachObject("topNav");
                    $("div[ida='dhxMainCont']").css({
                        background: "#F0F5F8"
                    });
                    dhxLayout.cells("b").attachURL('${$smarty.const.WEB_HOST}php/Action/admin/menu/menuAction.php?ac=doLayout');
                    dhxLayout.cells("c").attachURL('${$smarty.const.WEB_HOST}php/Action/admin/welcome/welcomeAction.php?ac=doLayout');
                    //dhxLayout.cells("d").attachObject("bottomStatus");

                    // setAutoSize
                    dhxLayout.setAutoSize("a;c", "b;c");
                    dhxLayout.cells("a").fixSize(true, true);
                    //dhxLayout.cells("d").fixSize(true, true);

                    if ($(document).width() < 900) {
                        $(".menu").css({
                            paddingTop: "2px",
                            width: "auto"
                        });
                    }

                });
                function doLogout() {
                    if (confirm("您确定要退出系统？")) {
                        top.location.href = "${$smarty.const.WEB_HOST}php/Action/admin/login/loginAction.php?ac=doLogout";
                    }
                }

                function share(_id) {
                    var type = "dialog";
                    if (_id) {
                        var object = icinfo.data.get(_id);
                    }
                        //打开缓存中的地址
                        $.dialog.open(object.url, $.extend(true, {
                            id: _id,
                            resize: true,
                            opacity: object.opacity ? object.opacity : 0.5,
                            background: object.background ? object.background : '#000',
                            height: object.height ? object.height : "600px",
                            width: object.width ? object.width : "500px",
                            lock: true}, object));
                }

                /**
                 * 显示面板 默认为b
                 * @param cell
                 */
                function showMenu(cell) {
                    var cell = cell || "b";
                    dhxLayout.cells(cell).expand();
                    dhxLayout.cells(cell).progressOff();
                }
                /**
                 * 隐藏面板 默认为b
                 * @param cell
                 */
                function hideMenu(cell) {
                    var cell = cell || "b";
                    dhxLayout.cells(cell).collapse();
                    dhxLayout.cells(cell).progressOff();
                }
        </script>
    </body>
</html>

