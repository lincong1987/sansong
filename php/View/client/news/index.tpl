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
        <title>新闻动态</title>
        <link rel="stylesheet" href="${$smarty.const.WEB_HOST}css/base.css?v=${$smarty.const.Q_VERSION}"/>
        <link rel="stylesheet" href="${$smarty.const.WEB_HOST}css/common.css?v=${$smarty.const.Q_VERSION}"/>
        <link rel="stylesheet" href="${$smarty.const.WEB_HOST}css/biz/news/company.css?v=${$smarty.const.Q_VERSION}"/>
        <link rel="stylesheet" href="${$smarty.const.WEB_HOST}css/jquery.pager.css?v=${$smarty.const.Q_VERSION}"/>
        <script type='text/javascript' src="${$smarty.const.WEB_HOST}js/jquery/jquery-1.8.3.min.js?v=${$smarty.const.Q_VERSION}"></script>
        <script type='text/javascript' src="${$smarty.const.WEB_HOST}js/icinfo/icinfo-1.0.0.min.js?v=${$smarty.const.Q_VERSION}"></script>
    </head>

    <body>
        <div class="wrapper">
            ${include file="${$smarty.const.Q_ROOT}/include/header.tpl"}
            <!-- 主体开始 -->
            <div class="modal-main clearfix">
                <div class="container">
                    <div><img src="${$smarty.const.WEB_HOST}images/news/company_news_banner.png" /></div>
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
                                        <h3><a class="modal-left-menu-title-link">新闻资讯</a></h3>
                                        <ul class="modal-left-menu-content">
                                            <li><a href="${$smarty.const.WEB_HOST}php/Action/client/news/newsAction.php?ac=index" target="_self" class="hover">新闻动态</a></li>
                                            <li><a href="${$smarty.const.WEB_HOST}php/Action/client/news/newsAction.php?ac=industry" target="_self">行业资讯</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                            <td class="modal-left-right">
                                <!-- 新闻动态 -->
                                <div class="modal-company-news">
                                    <div class="modal-company-news-title clearfix"></div>
                                    <div class="modal-top-company-news clearfix">
                                        <div class="modal-top-company-news-left"><img onerror="this.src='${$smarty.const.WEB_HOST}images/common/logo_image.png'" src="${$smarty.const.WEB_HOST}${$smarty.const.Q_UPLOAD_PATH}${$newsList[0].pic_1}" width="155" height="138" /></div>
                                        <div class="modal-top-company-news-right">
                                            <div class="modal-top-company-news-title"><a href="${$smarty.const.WEB_HOST}php/Action/client/news/newsAction.php?ac=company_news&id=${$newsList[0].id}">${$newsList[0].title|truncate:30:'...':true}（${$newsList[0].time|date_format:'%m-%d'}）</a></div>
                                            <div class="modal-top-company-news-content">
                                                <div class="modal-top-company-news-content-opacity"></div>
                                                <div class="modal-top-company-news-content-text">
                                                    ${$newsList[0].content}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-company-news-content clearfix">
                                        <ul>

                                            ${foreach from=$newsList item=news key=i}
                                            <li><a target="_blank" title="点击查看详细" href="${$smarty.const.WEB_HOST}php/Action/client/news/newsAction.php?ac=company_news&id=${$news.id}">${$news.title} （${$news.time|date_format:'%Y-%m-%d'}）</a></li>
                                            ${/foreach}

                                            ${*<li><a href="${$smarty.const.WEB_HOST}php/biz/news/company_news_5.php">风雨同舟十载，携手再创辉煌 -- 金陵连锁酒店集团CRS及金陵饭店PMS成功升级（04-24）</a></li>
                                            <li><a href="${$smarty.const.WEB_HOST}php/biz/news/company_news_4.php">“三月女人天，山水丽人行”----2013年西软团队活动之一 （03-19）</a></li>
                                            <li><a href="${$smarty.const.WEB_HOST}php/biz/news/company_news_3.php">2013 新 年 致 辞</a></li>
                                            <li><a href="${$smarty.const.WEB_HOST}php/biz/news/company_news_2.php">春节放假通告及售后服务安排  （02-04）</a></li>
                                            <li><a href="${$smarty.const.WEB_HOST}php/biz/news/company_news_1.php">博进取精神，展飒爽英姿----2012西软团队活动之四  （11-29）</a></li>
                                            <li><a href="">“勇于攀登无止尽”----2012西软团队活动之三  （10-31）</a></li>
                                            <li><a href="">国庆放假通告及售后服务安排  （09-29）</a></li>
                                            <li><a href="">“携手同行 共铸辉煌”  （09-10）</a></li>
                                            <li><a href="">“余姚采杨梅&四窗岩漂流”游记—2012西软团队活动之二  （06-21）</a></li>
                                            <li><a href="">仙境逍遥游--2012西软团队活动之一  （05-21）</a></li>
                                            <li><a href="">2012年西软EDP培训会(总第13期)成功举行  （05-04）</a></li>
                                            <li><a href="">关于正式成立华北售后服务中心的通告  （04-01）</a></li>
                                            <li><a href="">2012年西软用户管理员技术培训会邀请函  （03-22）</a></li>
                                            <li><a href="">赛出水平 赛出友谊  （02-03）</a></li>*}
                                        </ul>
                                    </div>
                                    <div id="pager"></div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- 主体结束 -->

            ${include file="${$smarty.const.Q_ROOT}/include/footer.tpl"}
        </div>
        <script type='text/javascript' src="${$smarty.const.WEB_HOST}js/jquery.pager/jquery.pager.js?v=${$smarty.const.Q_VERSION}"></script>
        <script type="text/javascript">
            icinfo.namespace("newsScroll");
            icinfo.newsScroll.init = function() {
                this.toBottom();
            };
            icinfo.newsScroll.toBottom = function() {
                var _scroll = this;
                $(".modal-top-company-news-content").animate({
                    scrollTop: $(".modal-top-company-news-content-text").height() - $(".modal-top-company-news-content").height()
                }, 20000, function() {
                    _scroll.toTop();
                });
            };
            icinfo.newsScroll.toTop = function() {
                var _scroll = this;
                $(".modal-top-company-news-content").animate({
                    scrollTop: 0
                }, 500, function() {
                    _scroll.toBottom();
                });
            };

            $(function() {

                icinfo.newsScroll.init();

                $("#pager").pager({
                    pagenumber: ${$page.page},
                    pagecount: ${$page.pageCount},
                    totalCount: ${$page.totalCount},
                    buttonClickCallback: function(num) {
                        window.location.href = "${$page.url}" + num;
                    }
                });
            });
        </script>
    </body>
</html>