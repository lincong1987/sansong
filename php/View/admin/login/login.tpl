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
        <title>首页</title>
        ${include file="${$smarty.const.Q_ROOT}/include/meta.tpl"}
        <link rel="stylesheet" href="${$smarty.const.WEB_HOST}css/base.css?v=${$smarty.const.Q_VERSION}"/>
        <link rel="stylesheet" href="${$smarty.const.WEB_HOST}css/common.css?v=${$smarty.const.Q_VERSION}"/>
        <link rel="stylesheet" href="${$smarty.const.WEB_HOST}css/login.css?v=${$smarty.const.Q_VERSION}"/>
    </head>

    <body>
        <form id="form1" name="form1" action="" method="post">
            <div class="main">
                <div style="line-height:95px; padding-left:100px; font-size:24px; font-family:'Microsoft YaHei', 'SimHei', 'SimSun'; color:#cc0000;">西软网站后台</div>
                <div class="mainLeft"></div>
                <div class="mainRight">
                    <div class="tit">用户名/密码登录</div>
                    <div class="tit"></div>
                    <div class="input"><input id="username" name="username" type="text" value="" placeholder="请输入用户名" maxlength="16" required="required" /></div>
                    <div class="input"><input id="password" name="password" type="password" value="" placeholder="请输入密码" maxlength="16" required="required" /></div>
                    <div class="submitBar"><input name="button1" class="submit2" type="button"	onclick="checkForm();" /></div>
                </div>
            </div>
        </form>
        <script type='text/javascript' src="${$smarty.const.WEB_HOST}js/jquery/jquery-1.8.3.min.js?v=${$smarty.const.Q_VERSION}"></script>
        <script type='text/javascript' src="${$smarty.const.WEB_HOST}js/icinfo/icinfo-1.0.0.min.js?v=${$smarty.const.Q_VERSION}"></script>
        <script type="text/javascript">
                    $(function() {
                        $("#username").focus(function() {
                            if ($(this).val() == '请输入用户名') {
                                this.style.color = '#333';
                                $(this).val("");
                            }
                        }).blur(function() {
                            if ($(this).val() == '') {
                                this.style.color = '#999';
                                $(this).val("请输入用户名");
                            }
                        });
                        $("#password").focus(function() {
                            if ($(this).val() == '请输入密码') {
                                this.style.color = '#333';
                                $(this).val("");
                            }
                        }).blur(function() {
                            if ($(this).val() == '') {
                                this.style.color = '#999';
                                $(this).val("请输入密码");
                            }
                        });

                        $("#username").keyup(function(e) {
                            e = e || e.event;
                            if (e.keyCode == 13) {
                                $("#password").focus();
                            }
                        });
                        $("#password").keyup(function(e) {
                            e = e || e.event;
                            if (e.keyCode == 13) {
                                checkForm();
                            }
                        });
                        var username = icinfo.cookie.get("server.login.username");
                        if (username != null || username != "" || username != "null") {
                            $("#username").val(username);
                        }

                        $("#username").focus();
                    });

                    /**
                     *
                     * @returns {Boolean}
                     */
                    function checkForm() {
                        var username = $("#username"),
                                password = $("#password");
                        if ($.trim(username.val()) == "" || $.trim(username.val()) == "请输入用户名") {
                            alert("请输入用户名！");
                            $("#username").focus();
                            return;
                        }
                        if ($.trim(password.val()) == "" || $.trim(password.val()) == "请输入密码") {
                            alert("请输入密码！");
                            $("#password").focus();
                            return;
                        }

                        $.ajax({
                            url: "${$smarty.const.WEB_HOST}php/Action/admin/login/loginAction.php",
                            type: "post",
                            data: {
                                username: username.val(),
                                password: password.val(),
                                ac: "doLogin"
                            },
                            error: function() {

                            },
                            success: function(data) {

                                if (data.state == "fail") {
                                    alert("密码错误");
                                    return false;
                                }
                                if (data.state == "succ") {
                                    // 604800s a week
                                    icinfo.cookie.set("server.login.username", $.trim(username.val()), 604800);
                                    location.href = "${$smarty.const.WEB_HOST}php/admin";
                                }
                            }
                        });
                    }
        </script>
    </body>
</html>
