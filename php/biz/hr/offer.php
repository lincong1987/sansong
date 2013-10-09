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
        <title>人才战略</title>
        <link rel="stylesheet" href="<?php echo WEB_HOST; ?>css/base.css?v=<?php echo Q_VERSION; ?>"/>
        <link rel="stylesheet" href="<?php echo WEB_HOST; ?>css/common.css?v=<?php echo Q_VERSION; ?>"/>
        <link rel="stylesheet" href="<?php echo WEB_HOST; ?>css/biz/hr/hr.css?v=<?php echo Q_VERSION; ?>"/>
        <script type='text/javascript' src="<?php echo WEB_HOST; ?>js/jquery/jquery-1.8.3.min.js?v=<?php echo Q_VERSION; ?>"></script>
        <script type='text/javascript' src="<?php echo WEB_HOST; ?>js/icinfo/icinfo-1.0.0.min.js?v=<?php echo Q_VERSION; ?>"></script>
    </head>

    <body>
        <div class="wrapper">
            <?php include ('../../../include/header.php'); ?>
            <!-- 主体开始 -->
            <div class="modal-main clearfix">
                <div class="container">
                    <div class="modal-service-project-banner">
                        <img src="<?php echo WEB_HOST; ?>images/hr/hr_banner.png" />
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
                                            <li><a href="<?php echo WEB_HOST; ?>php/biz/hr/index.php" target="_self">人才战略</a></li>
                                            <li><a href="<?php echo WEB_HOST; ?>php/biz/hr/offer.php" target="_self" class="hover">职位空缺</a></li>
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
                                                <li><a href="career.php?id=1">软件实施工程师</a><span>2012-03-22</span></li>
                                                <li><a href="career.php?id=2">JAVA移动产品开发工程师</a><span>2011-10-26</span></li>
                                                <li><a href="career.php?id=3">.NET软件开发工程师</a><span>2011-10-26</span></li>
                                                <li><a href="career.php?id=4">JAVA软件开发工程师</a><span>2011-05-09</span></li>
                                                <li><a href="career.php?id=5">PB开发工程师</a><span>2010-10-13</span></li>
                                                <li><a href="career.php?id=6">接口开发工程师</a><span>2010-09-07</span></li>
                                                <li><a href="career.php?id=7">网络硬件工程师</a><span>2009-10-10</span></li>
                                                <li><a href="career.php?id=8">维护中心文员</a><span>2009-06-15</span></li>
                                                <li><a href="career.php?id=9">培训师</a><span>2008-10-24</span></li>
                                                <li><a href="career.php?id=10">北京分公司文秘</a><span>2008-09-16</span></li>
                                            </ul>
                                        </div>
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