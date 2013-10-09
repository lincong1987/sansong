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
        <title>联系我们</title>
        <link rel="stylesheet" href="${$smarty.const.WEB_HOST}css/base.css?v=${$smarty.const.Q_VERSION}"/>
        <link rel="stylesheet" href="${$smarty.const.WEB_HOST}css/common.css?v=${$smarty.const.Q_VERSION}"/>
        <link rel="stylesheet" href="${$smarty.const.WEB_HOST}css/biz/contact/contact.css?v=${$smarty.const.Q_VERSION}"/>
        <script type='text/javascript' src="${$smarty.const.WEB_HOST}js/jquery/jquery-1.8.3.min.js?v=${$smarty.const.Q_VERSION}"></script>
        <script type='text/javascript' src="${$smarty.const.WEB_HOST}js/icinfo/icinfo-1.0.0.min.js?v=${$smarty.const.Q_VERSION}"></script>
        <style>
            #content {
                vertical-align: top;
            }
        </style>
    </head>

    <body>
        <div class="wrapper">
            ${include file="${$smarty.const.Q_ROOT}/include/header.tpl"}
            <!-- 主体开始 -->
            <div class="modal-main clearfix">
                <div class="container">
                    <div class="modal-contact-banner"><img src="${$smarty.const.WEB_HOST}images/contact/contact_banner.png"/></div>
                    <div class="modal-contact">
                        <div class="modal-contact-title"></div>
                        <table class="modal-l-r">
                            <colgroup>
                                <col style="width: 515px;" />
                                <col />
                            </colgroup>
                            <tr>
                                <td class="modal">
                                    <img usemap="#contactmap" src="${$smarty.const.WEB_HOST}images/contact/contact_map.png" />
                                    <map name="contactmap">
                                        ${foreach from=$contactList|default:[] item=contact}
                                        <area class='contactmap' data-id="${$contact.id}" shape="circle" coords="${$contact.coords}" href="#id=${$contact.id}" alt="${$contact.title}" title="${$contact.title}" />
                                        ${/foreach}
                                    </map>
                                </td>
                                <td valign="top">
                                    <div class="modal-contact-content">
                                        <table>
                                            <tr>
                                                <td id="content"></td>
                                            </tr>
                                        </table>
                                    </div>

                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <!-- 主体结束 -->
            ${include file="${$smarty.const.Q_ROOT}/include/footer.tpl"}
        </div>
        <script>

            icinfo.namespace("contact");
            icinfo.contact = {
                init: function() {
                    var me = this;
                    this.id = icinfo.url.getParameter("id") || ($(".contactmap:first").data("id") != 1 ? 1 : $(".contactmap:first").data("id"));

                    this.error = "<dl><dt><img src='${$smarty.const.WEB_HOST}images/common/warn.gif' /></dt><dd>系统异常，请联系系统管理员</dd></dl>";
                    this.getContact(this.id);
                    $(".contactmap").click(function() {
                        me.getContact($(this).data("id"));
                    });
                },
                getContact: function(id) {
                    var me = this;
                    $("#content").html("<img src='${$smarty.const.WEB_HOST}images/common/027.gif' />");
                    $.ajax({
                        url: "${$smarty.const.WEB_HOST}php/Action/client/contact/contactAction.php",
                        data: {
                            ac: "getContact",
                            id: id,
                            _t: (new Date - 0)
                        },
                        error: function() {
                            $("#content").html(me.error);
                        },
                        success: function(json) {
                            if (json.state === "fail") {
                                $("#content").html(me.error);
                            }
                            if (json.state === "succ") {
                                $("#content").html(json.msg.length > 0 ? json.msg[0].content : me.error);
                            }
                        }
                    });
                }
            };

            $(function() {
                icinfo.namespace("contact").init();
            });
        </script>
    </body>
</html>