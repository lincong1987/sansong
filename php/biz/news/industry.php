
<?php
include("../../../include/function.php");
?>
<!--
 Copyright (c) 2012 Lincong All rights reserved.
 Mail lincong1987@gmail.com
 QQ 159257119
 This software is the confidential and proprietary information of Lincong,
 Inc. ("Confidential Information"). You shall not disclose such Confidential
 Information and shall use it only in accordance with the terms of the license
 agreement you entered into with Lincong.
 page: honor.php
-->
<html lang="zh-CN">
    <head>
        <?php include ('../../../include/meta.php'); ?>
        <title>行业资讯</title>
        <link rel="stylesheet" href="<?php echo WEB_HOST; ?>css/base.css?v=<?php echo Q_VERSION; ?>"/>
        <link rel="stylesheet" href="<?php echo WEB_HOST; ?>css/common.css?v=<?php echo Q_VERSION; ?>"/>
        <link rel="stylesheet" href="<?php echo WEB_HOST; ?>css/biz/news/company.css?v=<?php echo Q_VERSION; ?>"/>
        <script type='text/javascript' src="<?php echo WEB_HOST; ?>js/jquery/jquery-1.8.3.min.js?v=<?php echo Q_VERSION; ?>"></script>
        <script type='text/javascript' src="<?php echo WEB_HOST; ?>js/icinfo/icinfo-1.0.0.min.js?v=<?php echo Q_VERSION; ?>"></script>
    </head>

    <body>
        <div class="wrapper">
            <?php include ('../../../include/header.php'); ?>
            <!-- 主体开始 -->
            <div class="modal-main clearfix">
                <div class="container">
                    <div><img src="<?php echo WEB_HOST; ?>images/news/company_news_banner.png" /></div>
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
                                            <li><a href="<?php echo WEB_HOST; ?>php/biz/news/index.php" target="_self">新闻动态</a></li>
                                            <li><a href="<?php echo WEB_HOST; ?>php/biz/news/industry.php" target="_self" class="hover">行业资讯</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                            <td class="modal-left-right">
                                <!-- 行业资讯 -->
                                <div class="modal-industry-news-title-news">
                                    <div class="modal-industry-news-title clearfix"></div>
                                    <div class="modal-industry-news-content clearfix">
                                        <ul>
                                            <li><a href="<?php echo WEB_HOST; ?>php/biz/news/industry_news_1.php">2013年中国在线旅游业十大趋势  （01-08）</a></li>
                                            <li><a href="<?php echo WEB_HOST; ?>php/biz/news/industry_news_2.php">2012年中国在线旅游业八大趋势  （02-13）</a></li>
                                            <li><a href="<?php echo WEB_HOST; ?>php/biz/news/industry_news_3.php">酒店社会媒体营销的十大技巧  （07-12）</a></li>
                                            <li><a href="">酒店半透明营销模式适合中国吗？  （05-24）</a></li>
                                            <li><a href="">2011年中国旅游业发展趋势展望  （01-12）</a></li>
                                            <li><a href="">2010年影响中国酒店业的五件大事  （01-12）</a></li>
                                            <li><a href="">上半年五星级酒店开业数量呈“倒V型反转”  （07-22）</a></li>
                                            <li><a href="">独立酒店如何建立收益最大化策略？  （04-06）</a></li>
                                            <li><a href="">亚太地区酒店业11月三项重要指标回升  （01-05）</a></li>
                                            <li><a href="">经济型酒店将迎来整合期 推动品质化进程  （11-16）</a></li>
                                            <li><a href="">几家欢喜几家愁 评点黄金周京沪酒店表现得失  （10-13）</a></li>
                                            <li><a href="">国旅上市将奠定国字号旅游企业“3+3”格局  （09-21）</a></li>
                                            <li><a href="">全国入境游人数15个月来首次正增长  （09-19）</a></li>
                                            <li><a href="">洲际酒店通过重塑品牌应对金融危机  （09-18）</a></li>
                                        </ul>
                                    </div>
                                    <div></div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <!-- 主体结束 -->

            <?php include ('../../../include/footer.php'); ?>
        </div>
    </body>
</html>