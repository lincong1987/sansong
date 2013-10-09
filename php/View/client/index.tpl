<!DOCTYPE html>
<!--
 Copyright (c) 2012 Lincong All rights reserved.
 Mail lincong1987@gmail.com
 QQ 159257119
 This software is the confidential and proprietary information of Lincong.
 You shall not disclose such Confidential
 Information and shall use it only in accordance with the terms of the license
 agreement you entered into with Lincong.
$Id$
-->
<html lang="zh-CN">
    <head>
        <title>${$smarty.const.Q_WEB_TITLE|default:""}</title>
        ${include file="${$smarty.const.Q_View}/common/meta.tpl"}
        <link rel="stylesheet" href="${$smarty.const.WEB_HOST}css/common/base.css?v=${$smarty.const.Q_VERSION}"/>
        <link rel="stylesheet" href="${$smarty.const.WEB_HOST}css/common/common.css?v=${$smarty.const.Q_VERSION}"/>
        <link rel="stylesheet" href="${$smarty.const.WEB_HOST}css/biz/index/index.css?v=${$smarty.const.Q_VERSION}"/>
        <script type='text/javascript' src="${$smarty.const.WEB_HOST}js/jquery/jquery-1.8.3.min.js?v=${$smarty.const.Q_VERSION}"></script>
        <script type='text/javascript' src="${$smarty.const.WEB_HOST}js/firebird/firebird-1.0.2.min.js?v=${$smarty.const.Q_VERSION}"></script>
    </head>

    <body>
        <div class="wrapper">
            ${include file="${$smarty.const.Q_View}/common/header.tpl"}
            <!-- 主体开始 -->
            <div class="modal-main clearfix">
                <div class="container">



                </div>
            </div>
            <!-- 主体结束 -->
            ${include file="${$smarty.const.Q_View}/common/footer.tpl"}
        </div>
        <script type='text/javascript' src="${$smarty.const.WEB_HOST}js/slides/slides.jquery.js?v=${$smarty.const.Q_VERSION}" ></script>
        <script type='text/javascript' src="${$smarty.const.WEB_HOST}js/biz/index/index.js?v=${$smarty.const.Q_VERSION}" ></script>
    </body>
</html>
