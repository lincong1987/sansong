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
        <link href="${$smarty.const.WEB_HOST}css/base.css" rel="stylesheet" type="text/css" />
        <link href="${$smarty.const.WEB_HOST}js/dhtmlx/grid/dhtmlxgrid.css" rel="stylesheet" type="text/css" />
        <link href="${$smarty.const.WEB_HOST}js/dhtmlx/grid/skins/dhtmlxgrid_dhx_skyblue.css" rel="stylesheet" type="text/css" />

        <link href="${$smarty.const.WEB_HOST}css/master.css" rel="stylesheet" type="text/css" />
        <link href="${$smarty.const.WEB_HOST}css/form1.css" rel="stylesheet" type="text/css" />
        <link href="${$smarty.const.WEB_HOST}css/form2.css" rel="stylesheet" type="text/css" />

        <script type='text/javascript' src="${$smarty.const.WEB_HOST}js/jquery/jquery-1.8.3.min.js?v=${$smarty.const.Q_VERSION}"></script>
        <script type='text/javascript' src="${$smarty.const.WEB_HOST}js/icinfo/icinfo-1.0.0.min.js?v=${$smarty.const.Q_VERSION}"></script>
        <script type="text/javascript" src="${$smarty.const.WEB_HOST}js/dhtmlx/grid/dhtmlxcommon.js"></script>
        <script type="text/javascript" src="${$smarty.const.WEB_HOST}js/dhtmlx/grid/dhtmlxgrid.source.js"></script>
        <script type="text/javascript" src="${$smarty.const.WEB_HOST}js/dhtmlx/grid/dhtmlxgridcell.js"></script>
        <script type="text/javascript" src="${$smarty.const.WEB_HOST}js/artDialog4.1.6/jquery.artDialog.js?skin=chrome"></script>
        <script type="text/javascript">
            $(function() {
                /*
                 clickcount: "544"
                 display: "1"
                 id: "12"
                 name: "2012年西软用户管理员技术培训会邀请函"
                 path: "test.doc"
                 size: "63488"
                 time: "2012-03-22 00:00:00"
                 *
                 */
                $("#viewGrid").grid({
                    setImagePath: "${$smarty.const.WEB_HOST}js/dhtmlx/grid/imgs/",
                    url: '${$smarty.const.WEB_HOST}php/Action/admin/contact/contactAction.php',
                    root: "rows",
                    setInitWidths: "20,40,100,100,200,80,120",
                    setColAlign: "left, center, left, center, left, center, center",
                    setHeader: "<ul style='text-align:left; padding-left:3px'><input type='checkbox' onclick='doSwitchAllChecked();' id='delAll'><ul>,序号,名称,坐标,内容,是否显示,更新时间",
                    columns: ["id", "_rownum", "title", "coords", "content", "display", "time"],
                    render: {
                        id: function(val, row) {
                            return "<input value='" + val + "' class='chb gridChk' type='checkbox' />";
                        },
                        title: function(val, row) {
                            return "<a href='${$smarty.const.WEB_HOST}php/Action/client/contact/contactAction.php?ac=index#id=" + row.id + "' target='_blank'>" + val + "<a>";
                        },
                        content: function(val) {
                            return val.replace(/<\/?[^>]*>/g, '');
                        },
                        display: function(val) {
                            return val === "1" ? "是" : "否";
                        }
                    },
                    onRowSelect: function() {
                    },
                    onBeforeSorting: function(index, e) {
                        if (index == 0){return;}
                        return true;
                    },
                    pager: {
                        dataFilter: function(data) {
                            $.each(data.rows, function(i, n){
                                data.rows[i].content = n.content.replace(/\s+/g, '');
                            });
                            return data;
                        },
                        setParam: function() {
                            this.param["title"] = $.trim($("#title").val());
                            this.param["coords"] = $.trim($("#coords").val());
                            this.param["content"] = $.trim($("#content").val());
                            this.param["display"] = $.trim($("#display").val());
                        },
                        param: {
                            ac: "doGetList",
                            title: "",
                            content: "",
                            display: "",
                            coords: ""
                        }
                    }
                });
                try {
                    parent.dhxLayout.cells("c").progressOff();
                } catch (e) {
                }
            });

            /* 全选/取消全选 @Author Lincong @Date 2011/12/17 */
            function doSwitchAllChecked() {
                setTimeout(function() {
                    var allChecked = $("#delAll").prop("checked");
                    $(".chb:not(:disabled)").prop("checked", allChecked);
                }, 100);
            }

            //查询
            function doSearch() {
                $('#viewGrid').data('grid').doSearch();
            }

            // 全局回调
            var globalCallback = {
                complete: function() {
                    top.icinfo.notify.info({
                        text: "列表数据已重新加载"
                    });
                    $("#viewGrid").data("grid").doReload();
                },
                success: function() {
                    top.icinfo.notify.success();
                },
                error: function() {
                    top.icinfo.notify.error();
                }
            };

            function doAddRow() {
                var _id = "_doAddRow_" + new Date().getTime();
                var url = "${$smarty.const.WEB_HOST}php/Action/admin/contact/contactAction.php?" + $.param({
                    ac: "edit",
                    _id: _id
                });
                icinfo.data.set(_id, $.extend(true, {
                    title: "添加招聘内容",
                    url: url,
                    width: "95%",
                    height: "90%"
                }, globalCallback));
                try {
                    parent.share(_id);
                } catch (e) {
                    alert("发生错误:\n" + e);
                }
            }

            function doModRow() {
                if ($(".chb:checked").length !== 1) {
                    alert("请选择一条数据进行修改！");
                    return;
                }
                var _id = "_doModRow_" + new Date().getTime();
                var url = "${$smarty.const.WEB_HOST}php/Action/admin/contact/contactAction.php?" + $.param({
                    ac: "edit",
                    _id: _id,
                    id: $(".chb:checked").val()
                });
                icinfo.data.set(_id, $.extend(true, {
                    title: "修改招聘内容",
                    url: url,
                    width: "95%",
                    height: "90%"
                }, globalCallback));
                try {
                    parent.share(_id);
                } catch (e) {
                    alert("发生错误:\n" + e);
                }
            }

            //删除
            function doDelRow() {
                if ($(".chb:checked").length != 1) {
                    alert("请选择一条数据进行修改！");
                    return;
                }
                if (!confirm("您确定这么做吗？")) {
                    return false;
                }
                var _id = "_doModRow_" + new Date().getTime();
                var url = "${$smarty.const.WEB_HOST}php/Action/admin/contact/contactAction.php?" + $.param({
                    ac: "del",
                    _id: _id,
                    id: $(".chb:checked").val()
                });
                icinfo.data.set(_id, $.extend(true, {
                    url: url,
                    width: 500,
                    height: 250
                }, globalCallback));
                try {
                    parent.share(_id);
                } catch (e) {
                    alert("发生错误:\n" + e);
                }
            }

        </script>
    </head>

    <body>
        <div class="main">
            <div class="listBox2_new thBg">
                <form id="searchForm" onsubmit="return false;">
                    <div class="searchbg">
                        <table>
                            <tr>
                                <td width="80" class="texR">名称：</td>
                                <td width="180">
                                    <input id="title" type="text" class="ie6Input" style="width:200px;"/>
                                </td>
                                <td width="80" class="texR">内容：</td>
                                <td width="180">
                                    <input id="content" type="text" class="ie6Input" style="width:200px;"/>
                                </td>
                                <td width="80" class="texR">是否显示：</td>
                                <td>
                                    <select id="display">
                                        <option value="">请选择</option>
                                        <option value="1">是</option>
                                        <option value="0">否</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td width="80" class="texR">坐标：</td>
                                <td width="180">
                                    <input id="coords" type="text" class="ie6Input" style="width:200px;"/>
                                </td>
                            </tr>
                        </table>
                        <div class="search_layer" id="search_layer"></div>
                        <div style="text-align:center; padding:5px 0 5px;">
                            <input value="" class="searchBot1" type="button" onclick="doSearch();" />
                            <input value="" class="searchBot2" type="reset" id="doResetSrhForm" />
                        </div>
                    </div>
                </form>
            </div>
            <div style="margin-bottom:5px; text-align:right;">
                <input onclick="doAddRow();" class="btn_add" type="button"/>
                <input onclick="doModRow();"  class="btn_modify" type="button"/>
                <input onclick="doDelRow();" class="btn_delete" type="button"/>
            </div>
            <div id="viewGrid" style="height:280px; _width:98%;"></div>
        </div>
    </body>
</html>
