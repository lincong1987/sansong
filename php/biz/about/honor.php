<?php
include("../../../include/function.php");
?>
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
        <?php include ('../../../include/meta.php'); ?>
        <title>企业荣誉</title>
        <link rel="stylesheet" href="<?php echo WEB_HOST; ?>css/base.css?v=<?php echo Q_VERSION; ?>"/>
        <link rel="stylesheet" href="<?php echo WEB_HOST; ?>css/common.css?v=<?php echo Q_VERSION; ?>"/>
        <link rel="stylesheet" href="<?php echo WEB_HOST; ?>css/biz/about/about.css?v=<?php echo Q_VERSION; ?>"/>
        <script type='text/javascript' src="<?php echo WEB_HOST; ?>js/jquery/jquery-1.8.3.min.js?v=<?php echo Q_VERSION; ?>"></script>
        <script type='text/javascript' src="<?php echo WEB_HOST; ?>js/icinfo/icinfo-1.0.0.min.js?v=<?php echo Q_VERSION; ?>"></script>
    </head>

    <body>
        <div class="wrapper">
            <?php include ('../../../include/header.php'); ?>
            <!-- 主体开始 -->
            <div class="modal-main clearfix">
                <div class="container">
                    <div class="modal-about-expansion-banner">
                        <img src="<?php echo WEB_HOST; ?>images/about/expansion_banner.png" />
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
                                        <h3><a class="modal-left-menu-title-link">关于我们</a></h3>
                                        <ul class="modal-left-menu-content">
                                            <li><a href="<?php echo WEB_HOST; ?>php/biz/about/introduction.php" target="_self">西软简介</a></li>
                                            <li><a href="<?php echo WEB_HOST; ?>php/biz/about/expansion.php" target="_self">发展概述</a></li>
                                            <li><a href="<?php echo WEB_HOST; ?>php/biz/about/honor.php" target="_self" class="hover">企业荣誉</a></li>
                                            <li><a href="<?php echo WEB_HOST; ?>php/biz/about/culture.php" target="_self">西软文化</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                            <td class="modal-left-right">
                                <!-- 企业荣誉 -->
                                <div class="modal-about-honor">
                                    <div class="modal-about-honor-title"></div>
                                    <div class="modal-about-honor-content">
                                        <img style="float: right;" src="../../../images/about/honor_content_1.png" />

                                        <p><strong>国内用户数最多的酒店软件系统</strong></p>　　
                                        <p><strong>◇2008年底 2572 家</strong></p>
                                        <p>高星级用户最多的酒店软件系统</p>
                                        <p><strong>◇2008年底 948 家，其中已评定五星级酒店 91 家</strong></p>
                                        <p>国内用户增长最快的酒店软件系统</p>
                                        <p><strong>◇2006年起日均1 家</strong></p>
                                        <p>中国旅游饭店业协会品牌产品推荐单位</p>
                                        <p>连续三届中国软件行业协会——中国优秀软件产品</p>
                                        <p>国内唯一连续七年被中国软件行业协会评为推荐优秀软件</p>
                                        <p>同行中首家也是唯一一家通过CMM认证</p>
                                        <p>中国国家信息安全评测认证中心认证产品</p>
                                        <p>国家旅游局人教司选为全国旅游院校培训统编教材</p>
                                        <p>高教出版社选为全国中等职业学校饭店管理专业教学软件</p>
                                        <p>中国软件行业协会会员</p>
                                        <p>中国旅游饭店业协会会员</p>
                                        <p>中国饭店协会会员</p>
                                        <p>中国饭店管理信息研究会副理事长单位</p>
                                        <p>国家级火炬计划项目</p>
                                        <p>浙江省计算机软件行业协会优秀软件开发企业</p>
                                        <p>杭州市计算机学会/软件行业协会理事单位</p>
                                    </div>
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