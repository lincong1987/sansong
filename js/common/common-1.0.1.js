/*
 *  Copyright (c) 2013 Lincong All rights reserved.
 *  This software is the confidential and proprietary information of Lincong.
 *  You shall not disclose such Confidential
 *  Information and shall use it only in accordance with the terms of the license
 *  agreement you entered into with Lincong.
 *   Mail: Lincong <lincong1987@gmail.com>
 *     QQ: 159257119
 *  Phone: 15925711961
 *  This File Created On 2013-7-22 16:29:19.
 *  Document   : common.js
 *  Encoding   : UTF-8
 *  $Id: common-1.0.1.js 1087 2013-08-02 04:48:26Z lincong $
 */


/**
 * T
 * @class T
 * @type type
 */
var T, tuxun = T = tuxun || {
    version: "1.0.1"
};

window.console = window.console || {
    log: function() {

    }
};

/**
 * @namespace plugins
 * @type type
 */
T.plugins = T.plugins || {};

/**
 * 全选插件
 * @namespace T.plugins.checkall
 * @type type
 * @example <pre class="brush:html;toolbar:false">&lt;table&gt;
 &lt;tr&gt;
 &lt;th&gt;
 &lt;input type=&quot;checkbox&quot; class=&quot;plugin-checkall&quot; data-plugin-checkall=&quot;xxList&quot;/&gt;
 &lt;/th&gt;
 &lt;th&gt;年份&lt;/th&gt;
 &lt;/tr&gt;
 &lt;s:iterator value=&quot;xxList&quot;&gt;
 &lt;tr&gt;
 &lt;td&gt;
 &lt;input type=&quot;checkbox&quot; id=&quot;checkflag&quot; class=&quot;xxList&quot; value=&quot;&quot;/&gt;
 &lt;/td&gt;
 &lt;td&gt;
 2013
 &lt;/td&gt;
 &lt;/tr&gt;
 &lt;/s:iterator&gt;
 &lt;/table&gt;</pre>
 *
 */
T.plugins.checkall = {
    init: function() {
        this.bind();
        return this;
    },
    bind: function() {
        $(".plugin-checkall").each(function() {
            var checkallBtn = $(this);
            var checkItems = $("." + checkallBtn.data("plugin-checkall"));
            //
            checkallBtn.click(function() {
                checkItems.prop({
                    checked: $(this).prop("checked")
                });
            });

            checkItems.click(function() {
                checkallBtn.prop({
                    checked: checkItems.length === checkItems.filter(":checked").length
                });
            });
        });
    }
};

/**
 * 表格偶数行变色
 * @namespace T.plugins.tablehover
 * @type type
 * @example <pre class="brush:html;toolbar:false">&lt;table class=&quot;plugin-tablehover&quot;
 data-plugin-tablehover-odd=&quot;tr-odd&quot;
 data-plugin-tablehover-even=&quot;tr-even&quot;
 data-plugin-tablehover-oddHover=&quot;tr-even-hover&quot;
 data-plugin-tablehover-evenHover=&quot;tr-even-hover&quot;&gt;
 ...
 &lt;/table&gt;</pre>
 */
T.plugins.tablehover = {
    defaults: {
        odd: "tr-odd",
        even: "tr-even",
        oddHover: "",
        evenHover: ""
    },
    init: function() {
        this.bind();
        return this;
    },
    bind: function() {
        var thisPlugin = this;
        $(".plugin-tablehover").each(function() {
            var table = $(this);
            var settings = $.extend(true, thisPlugin.defaults, {
                odd: table.data("plugin-tablehover-odd"),
                even: table.data("plugin-tablehover-even"),
                oddHover: table.data("plugin-tablehover-odd-hover"),
                evenHover: table.data("plugin-tablehover-even-hover")
            });

            table.find("tbody>tr:odd").addClass(settings.even).hover(function() {
                $(this).addClass(settings.evenHover);
            }, function() {
                $(this).removeClass(settings.evenHover);
            });
            table.find("tbody>tr:even").addClass(settings.odd).hover(function() {
                $(this).addClass(settings.oddHover);
            }, function() {
                $(this).removeClass(settings.oddHover);
            });
        });
    }
};


$(function() {

    $.each(T.plugins, function(pluginName, plugin) {
        plugin.init && plugin.init();
        console.log(pluginName + " inited.");
    });

    try {
        top.dhxLayout.cells("c").progressOff();
    } catch (e) {
        console.log("cells 'c' progressOff");
    }
});


