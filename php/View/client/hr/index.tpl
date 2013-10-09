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
        <script type='text/javascript' src="${$smarty.const.WEB_HOST}js/icinfo/icinfo-1.0.0.min.js?v=${$smarty.const.Q_VERSION}"></script>
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
                                            <li><a href="${$smarty.const.WEB_HOST}php/Action/client/hr/hrAction.php?ac=index" target="_self" class="hover">人才战略</a></li>
                                            <li><a href="${$smarty.const.WEB_HOST}php/Action/client/hr/hrAction.php?ac=offer" target="_self">职位空缺</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                            <td class="modal-left-right">
                                <!-- 人才战略 -->
                                <div class="modal-hr">
                                    <div class="modal-hr-title"></div>
                                    <div class="modal-hr-content">
                                        <img style="float: right;" src="${$smarty.const.WEB_HOST}images/hr/hr_content_1.png" />
                                        <p><strong>授人以鱼，不如授人以渔</strong></p>
                                        <p>西软在人才使用上不会简单地告诉你该做什么，而是传授做事的方法，由你自己在岗位上充分的发挥你的才智。</p>
                                        <p><strong>德第一，才第二，德才兼备</strong></p>
                                        <p>这是西软的择人标准，也是西软人的道德准则。</p>
                                        <p><strong>同心携手，共创百年西软</strong></p>
                                        <p>西软给员工一个展示自我的舞台。员工在工作中学习，在岗位上升华，员工的卓越贡献是西软成功的关键，通过我们的共同努力，达到公司和个人的“双赢”。</p>
                                        <p>西软依托浙江大学计算机学院，与浙江大学旅游学院、南京金陵旅馆管理干部学院等多家全国旅游高校建立紧密的技术合作关系，构筑建设一道坚强的技术后盾，使FOXHIS ® 始终站在酒店信息化的最前沿。</p>
                                        <p>西软的人才是公司最大的财富。公司坚持“以人为本”的原则，引进和培养了一支高素质、高水平、结构合理、稳定的、充满活力的人才梯队。公司多数员工均毕业于名牌大学，具有强劲的技术研发和工程实施水平，以及丰富的旅游业信息化工作经验。</p>
                                        <p>西软举办各种员工活动，加强员工培训、改善办公环境，营造相互尊重、人格平等的环境氛围；尽力做到员工实际上的长期聘用或终身聘用，但不承诺终身聘用。西软尽力让每一名员工明白“个人的发展能伴随公司的发展而同步发展”；西软一直在思考，如何创造更好的利益共同体平台，如何创造更佳的激励体制，如何实现更人性化的管理，去营造一个更温馨的“西软之家”。</p>
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