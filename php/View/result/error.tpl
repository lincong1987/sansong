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
        <script type="text/javascript" src="${$smarty.const.WEB_HOST}js/jquery/jquery-1.8.0.min.js"></script>
        <script type="text/javascript" src="${$smarty.const.WEB_HOST}js/icinfo/icinfo-1.0.0.min.source.js"></script>
        <script type="text/javascript" src="${$smarty.const.WEB_HOST}js/artDialog4.1.6/jquery.artDialog.js?skin=chrome"></script>
        <script>
            var url = icinfo.url.parse();
            /*此处获取 url中的id命名  */
            var _id = url._id || "";
            /*此处获取 已缓存的顶级框架 回调  */
            var _callback = icinfo.data.get(_id);

            $(function() {
                if (_callback && _callback.complete) {
                    _callback.complete(window);
                }
                if (_callback && _callback.error) {
                    try {
                        _callback.error(window);
                    } catch (e) {
                    }
                    try {
                        $.dialog.close();
                    } catch (e) {
                    }
                }
            });
        </script>
        <style type="text/css">
            body, html{ font-size:12px; font-family:"微软雅黑", "宋体", Verdana; overflow:hidden}
            .grid-error-layout { height:130px; width:400px; overflow:hidden;  }
            .grid-error-content { width:250px; }
            .grid-error-title { font-size:16px; font-weight:bold; color:#da251d; padding:5px 0}
        </style>
    </head>

    <body>
        <div class="grid-error-layout">
            <div class="grid-error-content">
                <div class="grid-error-title">提示</div>
                操作失败!
                ${$actionError|default:''|var_dump}
            </div>
        </div>
    </body>
</html>
