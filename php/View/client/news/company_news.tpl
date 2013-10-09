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
        <title>${$newsList[0].title}（${$newsList[0].time|date_format:'%m-%d'}）</title>
        <link rel="stylesheet" href="${$smarty.const.WEB_HOST}css/base.css?v=${$smarty.const.Q_VERSION}"/>
        <link rel="stylesheet" href="${$smarty.const.WEB_HOST}css/common.css?v=${$smarty.const.Q_VERSION}"/>
        <link rel="stylesheet" href="${$smarty.const.WEB_HOST}css/biz/news/company.css?v=${$smarty.const.Q_VERSION}"/>
        <script type='text/javascript' src="${$smarty.const.WEB_HOST}js/jquery/jquery-1.8.3.min.js?v=${$smarty.const.Q_VERSION}"></script>
        <script type='text/javascript' src="${$smarty.const.WEB_HOST}js/icinfo/icinfo-1.0.0.min.js?v=${$smarty.const.Q_VERSION}"></script>
    </head>

    <body>
        <div class="wrapper">
            ${include file="${$smarty.const.Q_ROOT}/include/header.tpl"}
            <!-- 主体开始 -->
            <div class="modal-main clearfix">
                <div class="container">
                    <div class="modal-company-news-view">
                        <div><img src="${$smarty.const.WEB_HOST}images/news/company_news_banner.png" /></div>
                        <div class="modal-company-news-view-title">
                            <a>${$newsList[0].title}（${$newsList[0].time|date_format:'%m-%d'}）</a>
                        </div>
                        <div class="modal-company-news-view-content">
                            <div style="width: 198px">
                                ${if $newsList[0].pic_1 != ""}
                                <img src="${$smarty.const.WEB_HOST}${$smarty.const.Q_UPLOAD_PATH}${$newsList[0].pic_1}" width="198" onerror="this.src='${$smarty.const.WEB_HOST}images/common/logo_image.png'" />
                                ${/if}
                                ${if $newsList[0].pic_2 != ""}
                                <img src="${$smarty.const.WEB_HOST}${$smarty.const.Q_UPLOAD_PATH}${$newsList[0].pic_2}" width="198" onerror="this.src='${$smarty.const.WEB_HOST}images/common/logo_image.png'" />
                                ${/if}
                            </div>
                            ${$newsList[0].content}
                        </div>
                    </div>
                </div>
            </div>
            <!-- 主体结束 -->

            ${include file="${$smarty.const.Q_ROOT}/include/footer.tpl"}
        </div>
    </body>
</html>