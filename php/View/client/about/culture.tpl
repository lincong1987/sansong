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
        <title>企业文化</title>
        <link rel="stylesheet" href="${$smarty.const.WEB_HOST}css/base.css?v=${$smarty.const.Q_VERSION}"/>
        <link rel="stylesheet" href="${$smarty.const.WEB_HOST}css/common.css?v=${$smarty.const.Q_VERSION}"/>
        <link rel="stylesheet" href="${$smarty.const.WEB_HOST}css/biz/about/about.css?v=${$smarty.const.Q_VERSION}"/>
        <script type='text/javascript' src="${$smarty.const.WEB_HOST}js/jquery/jquery-1.8.3.min.js?v=${$smarty.const.Q_VERSION}"></script>
        <script type='text/javascript' src="${$smarty.const.WEB_HOST}js/icinfo/icinfo-1.0.0.min.js?v=${$smarty.const.Q_VERSION}"></script>
    </head>

    <body>
        <div class="wrapper">
            ${include file="${$smarty.const.Q_ROOT}/include/header.tpl"}
            <!-- 主体开始 -->
            <div class="modal-main clearfix">
                <div class="container">
                    <div class="modal-about-expansion-banner">
                        <img src="${$smarty.const.WEB_HOST}images/about/expansion_banner.png" />
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
                                            <li><a href="${$smarty.const.WEB_HOST}php/Action/client/about/aboutAction.php?ac=introduction" target="_self">西软简介</a></li>
                                            <li><a href="${$smarty.const.WEB_HOST}php/Action/client/about/aboutAction.php?ac=expansion" target="_self">发展概述</a></li>
                                            <li><a href="${$smarty.const.WEB_HOST}php/Action/client/about/aboutAction.php?ac=honor" target="_self">企业荣誉</a></li>
                                            <li><a href="${$smarty.const.WEB_HOST}php/Action/client/about/aboutAction.php?ac=culture" target="_self" class="hover">西软文化</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                            <td class="modal-left-right">
                                <!-- 企业文化 -->
                                <div class="modal-about-culture">
                                    <div class="modal-about-culture-title"></div>
                                    <div class="modal-about-culture-content">
                                        <img style="float: right;" src="${$smarty.const.WEB_HOST}images/about/culture_content_1.png" />
                                        <p><strong>西软精神</strong><p>
                                        <p><span></span>共识——西软绝大多数成员对企业目标和为实现这个目标所制定的各项方针、政策取得共同一致的认识<p>
                                        <p><span></span>共和——在共识基础上，各员工之间、各部门系统之间、管理层与员工之间、管理层面上，经常保持良好沟通，在行为上和谐一致、情感融洽<p>
                                        <p><span></span>共创——在团结和谐的基础上，人人具有创新意识，齐心协力创造新产品、新的经营模式和新的发展方向<p>
                                        <p><span></span>共享——西软的业绩成为增进我们社会生活的一部分<p>
                                        <p><strong>员工信条</strong><p>
                                        <p><span></span>人生在岗位上升华——西软员工把实现企业目标和实现自身价值看成合二为一的事，在工作岗位上展示人生的意义，体现生命的价值<p>
                                        <p><strong>经营方针</strong><p>
                                        <p><span></span>创世界名牌、树百年西软——这是西软对自身的发展方向和目标的定位，构成了西软理念最基本的出发点，西软不满足于现已取得的成绩，立志成为世界一流的旅游业信息供应商，使西软成为世界知名品牌，要成为"百年西软"，而不是昙花一现<p>
                                        <p><strong>董事长训词</strong><p>
                                        <p><span></span>你我肩头都担着整个西软——西软的事业要求每一个西软人克尽职守、兢兢业业、同心协力，为企业目标而努力奋斗<p>
                                        <p><strong>管理理念</strong><p>
                                        <p><span></span>以员工为西软之本——这是人本管理的一个基本点，员工是西软的主人，也是最可宝贵的财富，西软的发展，要视员工的幸福为西软的根本<p>
                                        <p><span></span>以品牌为西软之魂——良好的品牌可以建立公众对企业的信任感，从而成为企业及其产品的通行证，大大提高其在市场中的竞争力<p>
                                        <p><span></span>以市场为西软之命——西软既要用公关宣传活动来提高自己的知名度、美誉度，更要注重以产品的质量、服务来确立其品牌在公众心目中的地位  <p>
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
    </body>
</html>