/*
 *  Copyright (c) 2013 Lincong All rights reserved.
 *  Mail lincong1987@gmail.com
 *  QQ 159257119
 *  This software is the confidential and proprietary information of Lincong,
 *  You shall not disclose such Confidential
 *  Information and shall use it only in accordance with the terms of the license
 *  agreement you entered into with Lincong.
 *  $Id: jquery.pager.js 1355 2013-08-16 09:33:33Z lincong $
 */



//
// jquery pager 修改版
// By lincong
// @icinfo.cn
//
// 调用方式
// $("#pager").pager({ pagenumber: 当前的page, pagecount: 总页数, buttonClickCallback:PageClick回调, totalCount:总记录数（注：可以为空）});
//绑定PageClick，这里使用的是跳转，也可以改成AJAX方式 pageclickednumber 点击的
//PageClick = function(pageclickednumber) {window.location.href="<?php echo $url; ?>"+pageclickednumber;}

(function($) {

    $.fn.pager = function(options) {
        var opts = $.extend({},
                $.fn.pager.defaults, options);
        return this.each(function() {
            $(this).html(renderpager(parseInt(options.pagenumber), parseInt(options.pagecount), options.buttonClickCallback, parseInt(options.totalCount)));
        });

    };
    function renderpager(pagenumber, pagecount, buttonClickCallback, totalCount) {
        var $pager = $('<ul class="pages"></ul>');

        var startPoint = 1;
        var endPoint = 9;
        if (pagenumber > 4) {
            startPoint = pagenumber - 4;
            endPoint = pagenumber + 4;

        }
        if (endPoint > pagecount) {
            startPoint = pagecount - 8;
            endPoint = pagecount;

        }
        if (startPoint < 1) {
            startPoint = 1;

        }
        for (var page = startPoint; page <= endPoint; page++) {
            var currentButton = $('<li class="page-number">' + (page) + '</li>');
            page == pagenumber ? currentButton.addClass('pgCurrent') : currentButton.click(function() {
                buttonClickCallback(this.firstChild.data);

            });
            currentButton.appendTo($pager);
        }
        var totalCount = isNaN(totalCount) ? "" : "共" + totalCount + "条数据 ";
        var pn = pagecount == 0 ? 0 : pagenumber;
        $pager.append("<li class='pgDetail'>" + totalCount + " 共" + pagecount + "页 现在显示第" + pn + "页</li>");
        return $pager;

    }
    function renderButton(buttonLabel, pagenumber, pagecount, buttonClickCallback) {
        var $Button = $('<li class="pgNext">' + buttonLabel + '</li>');
        return $Button;

    }
    $.fn.pager.defaults = {
        pagenumber: 1,
        pagecount: 1,
        totalCount: 0
    };

})(jQuery);


