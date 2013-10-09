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
                                            <li><a href="${$smarty.const.WEB_HOST}php/Action/client/hr/hrAction.php?ac=index" target="_self">人才战略</a></li>
                                            <li><a href="${$smarty.const.WEB_HOST}php/Action/client/hr/hrAction.php?ac=offer" target="_self" class="hover">职位空缺</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                            <td class="modal-left-right">
                                <!-- 人才战略 -->
                                <div class="modal-hr">
                                    <div class="modal-hr-career-content">
                                        <p><strong>${$hrList[0].title}</strong></p>
                                        <p>学历要求：${$hrList[0].education}</p>
                                        <p><strong>职位描述:</strong></p>
                                        ${$hrList[0].description}
                                        <p><strong>主要福利：</strong></p>
                                        ${$hrList[0].welfare}
                                        <p><b><img src="${$smarty.const.WEB_HOST}images/hr/hr_career_content_1.png" />投递需知：</b></p>
                                        <p>1、请在email的”主题”中注明您要申请的职位名称及您的姓名，并发至hrd@foxhis.com 。</p>
                                        <p>2、由于收到的简历较多，故不一一回复，请谅解。</p>
                                        <p>3、如您的简历符合我们的职位要求，我们会尽快与您联系，反之我们将保留您的简历至公司人才库。</p>
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