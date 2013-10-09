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
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <style>
            #welcome {
                font-size: 12px;
            }
        </style>
    </head>
    <body>
        <div id="welcome">
            欢迎你, ${$smarty.session.SESSION_USER.nickname}, 现在你可以用左边的菜单来管理系统了。
        </div>
    </body>
</html>
