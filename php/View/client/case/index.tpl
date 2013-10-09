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
        <title>成功案例</title>
        <link rel="stylesheet" href="${$smarty.const.WEB_HOST}css/base.css?v=${$smarty.const.Q_VERSION}"/>
        <link rel="stylesheet" href="${$smarty.const.WEB_HOST}css/common.css?v=${$smarty.const.Q_VERSION}"/>
        <link rel="stylesheet" href="${$smarty.const.WEB_HOST}css/biz/case/case.css?v=${$smarty.const.Q_VERSION}"/>
        <script type='text/javascript' src="${$smarty.const.WEB_HOST}js/jquery/jquery-1.8.3.min.js?v=${$smarty.const.Q_VERSION}"></script>
        <script type='text/javascript' src="${$smarty.const.WEB_HOST}js/icinfo/icinfo-1.0.0.min.js?v=${$smarty.const.Q_VERSION}"></script>
    </head>

    <body>
        <div class="wrapper">
            ${include file="${$smarty.const.Q_ROOT}/include/header.tpl"}
            <!-- 主体开始 -->
            <div class="modal-main clearfix">
                <div class="container">
                    <div class="modal-case-banner">
                        <div class="modal-case-banner-inner-text">
                            <div>截止到<span class="modal-case-banner-date">${$caseParamList[0].caseyear}</span>年<span class="modal-case-banner-date">${$caseParamList[0].casemonth}</span>月<span class="modal-case-banner-date">${$caseParamList[0].casedate}</span>日，</div>
                            <div>西软酒店总用户数为 <span class="modal-case-banner-number">${$caseParamList[0].casetotalcount}</span> 家，</div>
                            <div>其中高星级酒店 <span class="modal-case-banner-number">${$caseParamList[0].casehighstardate}</span> 家。</div>
                        </div>
                    </div>
                    <div class="modal-case">
                        <div class="modal-case-content">
                            <div class="modal-case-spacing"></div>
                            <table>
                                <colgroup>
                                    <col style="width: 20%;" />
                                    <col style="width: 20%;" />
                                    <col style="width: 20%;" />
                                    <col style="width: 20%;" />
                                    <col style="width: 20%;" />
                                </colgroup>

                                <tr>
                                    <td>
                                        ${foreach from=$caseList item=case key=i name=caseforeach}
                                        <dl>
                                            <dt title="${$case.description}">${$case.name}</dt>
                                        </dl>
                                        ${if ($i+1)%5==0&&$i>1}
                                    </td>
                                    <td>${/if}
                                        ${/foreach}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 主体结束 -->
            ${include file="${$smarty.const.Q_ROOT}/include/footer.tpl"}
        </div>
    </body>
</html>