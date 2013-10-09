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
<html lang="zh-CN">
    <head>
        ${include file="${$smarty.const.Q_ROOT}/include/meta.tpl"}
        <title>人才战略</title>
        <link rel="stylesheet" href="${$smarty.const.WEB_HOST}css/base.css?v=${$smarty.const.Q_VERSION}"/>
        <link rel="stylesheet" href="${$smarty.const.WEB_HOST}css/common.css?v=${$smarty.const.Q_VERSION}"/>
        <link rel="stylesheet" href="${$smarty.const.WEB_HOST}css/biz/hr/hr.css?v=${$smarty.const.Q_VERSION}"/>
        <script type='text/javascript' src="${$smarty.const.WEB_HOST}js/jquery/jquery-1.8.3.min.js?v=${$smarty.const.Q_VERSION}"></script>
        <script type='text/javascript' src="${$smarty.const.WEB_HOST}js/icinfo/icinfo-1.0.0.min.source.js?v=${$smarty.const.Q_VERSION}"></script>
    </head>

    <body>
        <div class="wrapper">
            ${include file="${$smarty.const.Q_ROOT}/include/header.tpl"}
            <!-- 主体开始 -->
            <div class="modal-main clearfix">
                <div class="container">
                    <div class="modal-service-project-banner">
                        <img src="${$smarty.const.WEB_HOST}images/hr/hr_banner.png" />
                    </div>
                    <!-- 左右结构 -->
                    <table class="modal-l-r">
                        <colgroup>
                            <col style="width: 140px" />
                            <col />
                        </colgroup>
                        <tr>
                            <td class="modal-left" valign="top">
                                <div class="modal-left-menu">
                                    <div class="modal-left-menu-title">
                                        <h3><a class="modal-left-menu-title-link">人力资源</a></h3>
                                        <ul class="modal-left-menu-content">
                                            <li><a href="${$smarty.const.WEB_HOST}php/Action/client/hr/hrAction.php?ac=index" target="_self">人才战略</a></li>
                                            <li><a href="${$smarty.const.WEB_HOST}php/Action/client/hr/hrAction.php?ac=offer" target="_self" class="hover">职位空缺</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                            <td class="modal-left-right">
                                <!-- 人才战略 -->
                                <div class="modal-hr">
                                    <div class="modal-hr-offer-title"></div>
                                    <div class="modal-hr-offer-content">
                                        <div class="modal-hr-offer-title-bar">
                                            <ul>
                                                <li><a>职位名称</a><span>更新时间</span></li>
                                            </ul>
                                        </div>
                                        <div class="modal-hr-offer-list">
                                            <ul>
                                                ${foreach from=$hrList item=hr}
                                                <li><a target="_blank" title="点击查看详细" href="${$smarty.const.WEB_HOST}php/Action/client/hr/hrAction.php?ac=career&id=${$hr.id}">${$hr.title}</a><span>${$hr.time|date_format:'%Y-%m-%d'}</span></li>
                                                ${/foreach}
                                            </ul>
                                        </div>
                                        <div id="pager"></div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- 主体结束 -->

            ${include file="${$smarty.const.Q_ROOT}/include/footer.tpl"}
        </div>
        <script type="text/javascript">
            $(function() {
                icinfo.loader.css("${$smarty.const.WEB_HOST}css/jquery.pager.css?v=${$smarty.const.Q_VERSION}");
                icinfo.loader.js("${$smarty.const.WEB_HOST}js/jquery.pager/jquery.pager.js?v=${$smarty.const.Q_VERSION}", function() {
                    $("#pager").pager({
                        pagenumber: ${$page.page},
                        pagecount: ${$page.pageCount},
                        totalCount: ${$page.totalCount},
                        buttonClickCallback: function(num) {
                            window.location.href = "${$page.url}" + num;
                        }
                    });
                });

            });
        </script>
    </body>
</html>