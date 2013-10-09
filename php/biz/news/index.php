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
        <title>新闻动态</title>
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
                                            <li><a href="<?php echo WEB_HOST; ?>php/biz/news/index.php" target="_self" class="hover">新闻动态</a></li>
                                            <li><a href="<?php echo WEB_HOST; ?>php/biz/news/industry.php" target="_self">行业资讯</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                            <td class="modal-left-right">
                                <!-- 新闻动态 -->
                                <div class="modal-company-news">
                                    <div class="modal-company-news-title clearfix"></div>
                                    <div class="modal-top-company-news clearfix">
                                        <div class="modal-top-company-news-left"><img src="<?php echo WEB_HOST; ?>images/news/company_news_content_pic_05.jpg" width="155" height="138" /></div>
                                        <div class="modal-top-company-news-right">
                                            <div class="modal-top-company-news-title"><a href="<?php echo WEB_HOST; ?>php/biz/news/company_news_5.php">金陵连锁酒店集团CRS及金陵饭店PMS成功升级（04-24）</a></div>
                                            <div class="modal-top-company-news-content">
                                                <div class="modal-top-company-news-content-opacity"></div>
                                                <div class="modal-top-company-news-content-text">
                                                    <p>金陵连锁酒店集团和金陵饭店股份有限公司和杭州西软科技有限公司于2003年结缘，十年来双方互相支持、携手合作、共同发展。双方的长期战略合作堪称业内的典范之一。</p>
                                                    <p></p>
                                                    <p>为了更好地满足金陵连锁酒店集团和金陵饭店的业务发展，及集团对西软公司的高度信任和品质认可，最终决定由我司负责对其CRS系统和PMS系统进行整体升级。</p>
                                                    <p></p>
                                                    <p>这次升级所面临的难度是西软历史上史无前例的，金陵饭店是中国质量管理的最高奖的多次蝉联者，同时又以“细意浓情”服务标准著称，对产品质量产品细节的要求非同一般，再加上高星级酒店众多、系统使用年限较长、各酒店管理各具特色等现状，使项目管理和技术难度面临着巨大的挑战和压力！</p>
                                                    <p></p>
                                                    <p>金陵升级项目组融合了金陵管理公司业务部门、IT部门、西软公司CRS/PMS开发实施团队的精兵强将，在金陵管理公司领导们的全力支持和部署下，经过几十个日夜的艰辛付出和多次模拟，金陵连锁酒店集团CRS及金陵饭店的PMS已于2013年4月22日5：30AM成功升级切换上线，新系统确保了CRS直联49家成员酒店，5家非直接酒店，合计54家酒店，此举是至今为止中国星级酒店业界最大规模的系统切换， 又创造了一个酒店行业的奇迹！</p>
                                                    <p></p>
                                                    <p>在此，感谢金陵各级领导的周密部署和亲临指导！</p>
                                                    <p></p>
                                                    <p>感谢管理公司和金陵饭店所有员工与我们一起克服了一个个困难，渡过一个个通宵，一起共享痛苦和欢乐；特别感谢金陵集团信息部团队无私奉献，克服困难坚守岗位！</p>
                                                    <p></p>
                                                    <p>感谢金陵连锁所有成员酒店的全力支持与配合！ </p>
                                                    <p></p>
                                                    <p>同时当然也感谢我们西软项目团队的每一位成员为系统的成功上线所付出的心血和汗水！</p>
                                                    <p></p>
                                                    <p>感谢你们的无私付出，西软因为你们而骄傲，相信任何困难我们都能战胜克服。</p>
                                                    <p></p>
                                                    <p>系统按时上线了，但是上线也只是万里长征的第一步，就象刚出生的婴儿，需要大家一起呵护，一起努力解决，才能让系统效率更大化，与时俱进地满足集团的业务发展需要，为金陵集团的核心竞争力提升助一臂之力！</p>
                                                    <p></p>
                                                    <p>欲穷千里目，更上一层楼，祝愿金陵和西软在新的平台上达到新的高峰！</p>
                                                    <p></p>
                                                    <p style="text-align: right;">致</p>
                                                    <p style="text-align: right;">礼！</p>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-company-news-content clearfix">
                                        <ul>
                                            <li><a href="<?php echo WEB_HOST; ?>php/biz/news/company_news_5.php">风雨同舟十载，携手再创辉煌 -- 金陵连锁酒店集团CRS及金陵饭店PMS成功升级（04-24）</a></li>
                                            <li><a href="<?php echo WEB_HOST; ?>php/biz/news/company_news_4.php">“三月女人天，山水丽人行”----2013年西软团队活动之一 （03-19）</a></li>
                                            <li><a href="<?php echo WEB_HOST; ?>php/biz/news/company_news_3.php">2013 新 年 致 辞</a></li>
                                            <li><a href="<?php echo WEB_HOST; ?>php/biz/news/company_news_2.php">春节放假通告及售后服务安排  （02-04）</a></li>
                                            <li><a href="<?php echo WEB_HOST; ?>php/biz/news/company_news_1.php">博进取精神，展飒爽英姿----2012西软团队活动之四  （11-29）</a></li>
                                            <li><a href="">“勇于攀登无止尽”----2012西软团队活动之三  （10-31）</a></li>
                                            <li><a href="">国庆放假通告及售后服务安排  （09-29）</a></li>
                                            <li><a href="">“携手同行 共铸辉煌”  （09-10）</a></li>
                                            <li><a href="">“余姚采杨梅&四窗岩漂流”游记—2012西软团队活动之二  （06-21）</a></li>
                                            <li><a href="">仙境逍遥游--2012西软团队活动之一  （05-21）</a></li>
                                            <li><a href="">2012年西软EDP培训会(总第13期)成功举行  （05-04）</a></li>
                                            <li><a href="">关于正式成立华北售后服务中心的通告  （04-01）</a></li>
                                            <li><a href="">2012年西软用户管理员技术培训会邀请函  （03-22）</a></li>
                                            <li><a href="">赛出水平 赛出友谊  （02-03）</a></li>
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
            });
        </script>
    </body>
</html>