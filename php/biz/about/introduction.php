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
        <title>西软简介</title>
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
                                            <li><a href="<?php echo WEB_HOST; ?>php/biz/about/introduction.php" target="_self" class="hover">西软简介</a></li>
                                            <li><a href="<?php echo WEB_HOST; ?>php/biz/about/expansion.php" target="_self">发展概述</a></li>
                                            <li><a href="<?php echo WEB_HOST; ?>php/biz/about/honor.php" target="_self">企业荣誉</a></li>
                                            <li><a href="<?php echo WEB_HOST; ?>php/biz/about/culture.php" target="_self">西软文化</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                            <td class="modal-left-right" valign="top">
                                <!-- 西软简介 -->
                                <div class="modal-about-introduction">
                                    <div class="modal-about-introduction-title"></div>
                                    <div class="modal-about-introduction-content">
                                        <img style="float: right;" src="<?php echo WEB_HOST; ?>images/about/introduction_content_pic_01.png" />
                                        <p>杭州西软科技有限公司（杭州西软信息技术有限公司）简称“西软”公司始创于1993年，是国内专业致力于旅游饭店业信息化建设、开发和服务的高科技企业。自1998年以来，“西软”以稳健的发展一直居于中国饭店管理信息系统供应商之首。正是“西软”优异业绩表现，北京中长石基股份有限公司于2006年12月与“西软”公司进行了战略合并，并于2007年在深圳中小企业版上市（股票代码 002153，石基信息）。石基信息是世界上极少数的专业从事酒店系统的开发、销售、系统集成、技术支持与服务的上市公司，市值近百亿，在中国五星级酒店业信息管理系统市场占有90%以上的份额，独占业内鳌头，是目前国内最主要的酒店信息管理系统全面解决方案提供商之一。</p>
                                        <p>“西软”作为石基的全资子公司，依托石基信息使“西软”的软件开发得到明确的市场定位和雄厚的财务保障，给“西软”创造了更为广阔的发展空间。近年来公司投入大规模人力和财力于新一代“酒店信息管理系统”的研发，旨在打造更加出类拔萃的新一代信息系统；这些产品在很大程度上满足了酒店信息管理的所有需求，在帮助客户提升核心竞争力、获得成功的同时，也让“西软”自身获得了协同成长！多年来的心力凝聚、锐意进取，“西软”拥有满足从本地高星级到经济连锁酒店需求的以“西软”为品牌的全套酒店信息管理系统，“西软”为推进酒店管理流程标准化与提升中国酒店的管理与服务水准做出了最大的努力和贡献！</p>
                                        <p>“西软”作为酒店管理软件专家，依然将执着探索国内外酒店管理的奥秘。时刻把握国内外旅游业的发展动态，锻炼精准的行业敏感度，运用先进前沿的软件开发技术，遵循国际规范的软件开发标准，全方位为单体酒店及饭店集团提供更加完美的信息化解决方案，为旅游业呈献更多的先进技术和优质产品，与旅游业管理者、投资者携手共创璀璨明天！</p>
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